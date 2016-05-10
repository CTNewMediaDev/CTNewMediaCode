<?php
/**
我的钱包
 */
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'user/wallet.php';
    $redirecturl .= '#'.time();
    \DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}

$money_info=$db->fetch_all("select * from usersmoney where openid='".$_SESSION['openid']."'");

$title='赚钱记录';
$pageidx = 'index';
include 'template/wallet.html';