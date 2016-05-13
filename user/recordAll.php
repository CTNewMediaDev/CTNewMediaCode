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
$pagesize=10;
$startindex = 0;
$page_now=isset($_GET['page_now'])?intval($_GET['page_now']):0;

$user_info=\DataCenter\Userinfo::getUserinfobyDb($db,$_SESSION['openid']);
$recordAll=\DataCenter\ClickCount::getClickAllByDay($db,$_SESSION['openid'],$page_now,$pagesize);
if(!empty($_GET['action'])&&$_GET['action']=='more'){
    echo json_encode($recordAll);
    exit;
}
$title='赚钱记录';
$pageidx = 'usercenter';
include '../newtemplate/recordAll.html';
