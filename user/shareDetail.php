<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/21 0021
 * Time: 14:04
 */
if(!empty($_GET['contentId'])&&is_numeric($_GET['contentId'])){
    $contentId=$_GET['contentId'];
}else{
    exit;
}
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'user/index.php';
    $redirecturl .= '#'.time();
    \DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}
$title='分享详细';
$pageidx = 'usercenter';

$records=\DataCenter\ClickCount::getClickInfoByDb($db,$contentId,$_SESSION['openid'],0,10);
if(!empty($_GET['action'])&&$_GET['action']=='more'){
    $page=$_GET['page_now'];
//    $res=$db->fetch_all('select A.title,C.addtime,C.money as cmoney,A.money as amoney from clickcount as C left join articles as A on C.contentid=A.id where C.clickOpenid="'.$_SESSION['openid'].'"  limit '.(($page-1)*10).',10');
    $res=\DataCenter\ClickCount::getClickInfoByDb($db,$contentId,$_SESSION['openid'],($page-1)*10,10);
    echo json_encode($res);
    exit;
}
include '../newtemplate/shareDetail.html';
