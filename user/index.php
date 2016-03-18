<?php
/**
 用户首页
 */
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'user/index.php';
    $redirecturl .= '#'.time();
    SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}
$title='个人资料';
$pageidx = 'index';
$user_info=Userinfo::getUserinfobyDb($db,$_SESSION['openid']);

include 'template/index.html';
