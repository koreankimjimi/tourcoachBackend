<?php 
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Sunra\PhpSimple\HtmlDomParser;

$db = new \PDO("mysql:host=gondr.iptime.org;dbname=stu3;charset=utf8","stu3","1234");