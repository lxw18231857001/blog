<?php
require_once 'config.php';
require_once 'libweibo-master/saetv2.ex.class.php';

$code = $_GET['code'];
//var_dump($code);die;

$keys['code'] = $code;
$keys['redirect_uri'] = CALLBACK;
$obj = new SaeTOAuthV2(WB_KEY, WB_SEC);

$auth=$obj->getAccessToken($keys);

//debug($auth);

setcookie('accesstoken',$auth['access_token'],time()+$auth['expires_in']);
header('location:index.php');

