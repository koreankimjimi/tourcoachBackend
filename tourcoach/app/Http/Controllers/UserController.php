<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User as UserModel;

class UserController extends Controller
{
    // 로그인
    public function login(Request $req){
        if($req->all()){
            $inputId = $req->input('userid');
            $inputPass = $req->input('userpass');

            $user = UserModel::where([ ['userid' , '=' ,$inputId ] ])->first();

            if( !$user ){
                return back()->withErrors(array('Iderr' => '아이디를 다시입력해주세요.'))->withInput();
            }

            if( ! \Hash::check( $inputPass ,  $user->userpass) ){
                return back()->withErrors(array('Pwerr' => '비밀번호를 다시입력해주세요'))->withInput();
            }


            $req->session()->put('loginData',$user);
            return redirect("/")->with('로그인 성공');
        }else {
            return view('user.login');
        }
    }


    // 아이디 찾기
    public function foundId(Request $req){
        if( $req->all() ) {
            $inputName = $req->input('username');
            $inputEmail = $req->input('useremail');

            $user = UserModel::where([['useremail', '=', $inputEmail], ['username', '=', $inputName]])->first();

            if (!$user) {
                return back()->withErrors('회원정보를 다시 확인해주세요.')->withInput();
            } else {
                $to = $inputEmail;
                $subject = '아이디';
                $message = $user->userid;
                $headers = 'From: 투어코치 <no-reply@tourcoach.co.kr>' . "\r\n" .
                    'Reply-To: no-reply@tourcoach.co.kr' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                mail($to, $subject, $message, $headers);

                return redirect('/user/login')->with('success', '해당 이메일로 아이디를 전송하였습니다.');
            }
        }else{
            return view('user.foundId');
        }
    }

    // 비밀번호 찾기
    public function foundPass(Request $req){
        if( $req->all() ){
            $userid = $req->input('userid');
            $useremail = $req->input('useremail');
            $username = $req->input('username');
//            $passquestion = $req->input('passquestion');
//            $passanswer = $req->input('passanswer');


            $user = UserModel::where([['userid', '=', $userid], ['useremail', '=', $useremail] , ['username' ,'=' , $username] ])->first();

            if( !$user ){
                return back()->withErrors('회원정보를 다시 확인해주세요.')->withInput();
            }else{

                $to = $useremail;
                $subject = '임시 비밀번호';

                // 임시 비밀번호 생성
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < 15; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                $result =  $randomString;


                $message = $result;
                $headers = 'From: 투어코치 <no-reply@tourcoach.co.kr>' . "\r\n" .
                    'Reply-To: no-reply@tourcoach.co.kr' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                // 임시 비밀번호 저장
//                $user->userpass = bcrypt($result);
                UserModel::where('id',$user->id)->update(['userpass' => bcrypt($result)]);

                mail($to, $subject, $message, $headers);

                return redirect('/user/login')->with('success', '해당 이메일로 임시비밀번호를 전송하였습니다.')->withInput();
            }
        }else{
            return view('user.foundPass');
        }
    }


    // 회원가입
    public function join(Request $req){



        // 회원가입 처리 요청 확인
        if( $req->all() ){

            // 이메일 인증
//            if( $req->session()->get('emailToken') === null || $req->input('emailToken') != $req->session()->get('emailToken')){
//                return back()->withErrors('이메일 인증을 해주시기 바랍니다.')->withInput();
//            }else{
//                $req->session()->forget('emailToken');
//            }


            // 밸류데이션
            $rules = [
                'userid' => ['required'],
                'useremail' => ['required','email'],
                'username' => ['required'],
                'userpass' => ['required','confirmed'],
                'userpass_confirmation' => ['required'],
                'usergender' => ['required'],
                'userbirth' => ['required'],
            ];
            // 규칙을 어길시 가는 메시지
            $messages = [
                'userid.required' => '아이디는 필수 입력사항입니다',
                'useremail.required' => '이메일 필수 입력사항입니다',
                'useremail.email' => '이메일 형식을 맞춰주세요',
                'username.required' => '이름은 반드시 입력되어야 합니다.',
                'userpass.required' => '비밀번호 입력란은 필수 입력사항입니다',
                'userpass.confirmed' => '비밀번호가 서로 다릅니다',
                'userpass_confirmation.required' => '비밀번호 입력란은 필수 입력사항입니다',
                'usergender.required' => '성별은 필수 입력사항입니다',
                'userbirth.required' => '생일은 필수 입력사항입니다',
                'userbirth.date_format' => '날짜 형식을 맞춰주세요',

            ];

            $validator = \Validator::make($req->all(), $rules, $messages);

            // 규칙을 어겻을때
            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }

            $user = UserModel::select('userid')->where('userid', '=', $req->input('userid') )->first();
            if($user){
                //해당 사용자가 존재한다면.
                // back: 이전페이지로 돌아가면서 flash_message에 내용을 저장, withInput을 통해 입력값도 함께 돌려보내줌.
                return back()->with('err', '해당 아이디의 사용자가 이미 존재합니다.')->withInput();
            }

            $user = UserModel::select('useremail')->where('useremail', '=', $req->input('useremail') )->first();
            if($user){
                //해당 사용자가 존재한다면.
                // back: 이전페이지로 돌아가면서 flash_message에 내용을 저장, withInput을 통해 입력값도 함께 돌려보내줌.
                return back()->with('err', '해당 이메일의 사용자가 이미 존재합니다.')->withInput();
            }

            // 요청값을 바꾸기위해 다른 변수로 저장한다
            $inputArray = $req->all();

            // 비밀번호 암호화
            $inputArray['userpass'] = bcrypt($inputArray['userpass']);

            // 비밀번호 확인 배열 삭제
            unset($inputArray['userpass_confirmation']);

            // insert
            $user = UserModel::create($inputArray);

            // DB에 넣는것이 실패하면 에러
            if( !$user ){

                //사용자 가입이 실패한 경우.
                return back()->with('err', '오류로 가입되지 못했습니다.')->withInput();
            }

            // 성공시
            return redirect('/user/login')->with('success', '성공적으로 가입되었습니다.');

        } else{
            // 회원가입 페이지 뷰
            return view('user.join');
        }

    }

    // 이메일 인증
    public function emailCheck(Request $req){
        if(Request::ajax()) {
            // 이메일 파라미터
            $to = $req->input('email');

            $subject = '이메일 인증';

            // 난수 생성
            $char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $char .= 'abcdefghijklmnopqrstuvwxyz';
            $char .= '0123456789';
            $char .= '!@#%^&*-_+=';
            $result = '';
            for($i = 0; $i <= 25; $i++) {
                $result .= $char[mt_rand(0, strlen($char))];
            }

            // 메세지
            $message = $result;

            // mail header
            $headers = 'From: 투어코치 <no-reply@tourcoach.co.kr>' . "\r\n" .
                'Reply-To: no-reply@tourcoach.co.kr' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);

            return response()->json(array('success' => 'true', 'msg' => $result));
            session()->put('emailToken',$result);
        }else{
            return response()->json(array('success' => 'false', 'msg' => 'not ajax'));
        }
    }

    // 마이페이지
    public function mypage(){
        return view('user.mypage');
    }

    // 로그아웃
    public function logout(Request $req){
        $req->session()->forget('loginData');
        return redirect('/');
    }

    // 회원정보 수정
    public function impormation(Request $req){
        return view('user.impormation');
    }

    // 회원정보 수정 처리
    public function modifyProcess(Request $req , $kinds){

        $userData = $req->session()->get('loginData');
        try {
            UserModel::where('id', '=', $userData->id)->update(array($kinds => $req->input($kinds)));
        }catch (\Exception $exception){
            return back()->withErrors(array('error' => '다시 시도해주시 바랍니다.'))->withInput();
        }

        return back();
    }

    public function modify(Request $req , $kinds){
        return view('user.modify');
    }
}
