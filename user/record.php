<?php
/**
 赚钱记录
 */
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'category.php';
    $redirecturl .= '#'.time();
    SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}
$title='赚钱记录';
$pageidx = 'index';
$records=ClickCount::getClickInfoByDb($db,$_SESSION['openid']);
include 'template/record.html';