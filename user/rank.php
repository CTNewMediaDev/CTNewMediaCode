<?php
/**
 用户首页
 */
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'user/rank.php';
    $redirecturl .= '#'.time();
    SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}
$title='排行榜';
$pageidx = 'rank';
$user_info=Userinfo::getUserinfobyDb($db,$_SESSION['openid']);

include '../newtemplate/userrank.html';
