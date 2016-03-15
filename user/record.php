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

if(!empty($_GET['action'])&&$_GET['action']=='more'){
    $page=$_GET['page_now'];
    $res=$db->fetch_all('select A.title,C.addtime,C.money as cmoney,A.money as amoney from clickcount as C left join articles as A on C.contentid=A.id where C.clickOpenid="'.$_SESSION['openid'].'"  limit '.(($page-1)*10).',10');
    echo json_encode($res);
    exit;
}

$title='赚钱记录';
$pageidx = 'index';
$records=ClickCount::getClickInfoByDb($db,$_SESSION['openid']);
include 'template/record.html';