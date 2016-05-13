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
    \DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}

$user_info=\DataCenter\Userinfo::getUserinfobyDb($db,$_SESSION['openid']);
$money_info=$db->fetch_first("select * from usersmoney where openid='".$_SESSION['openid']."'");


$title='个人中心';
$pageidx = 'usercenter';
include '../newtemplate/userindex.html';
