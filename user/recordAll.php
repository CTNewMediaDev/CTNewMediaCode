<?php
/**
所有记录
 */
date_default_timezone_set('PRC');
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'user/record.php';
    $redirecturl .= '#'.time();
    \DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}
$user_info=\DataCenter\Userinfo::getUserinfobyDb($db,$_SESSION['openid']);
$recordAll=\DataCenter\ClickCount::getClickAllByDay($db,$_SESSION['openid'],0,10);