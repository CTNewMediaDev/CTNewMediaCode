<?php
/**
 赚钱记录
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

$clickCountAll=$db->result_first("select count(*) from clickcount where isvalid=1 and shareOpenid='".$_SESSION['openid']."'");
$clickCountYes=$db->result_first("select count(*) from clickcount where isvalid=1 and shareOpenid='".$_SESSION['openid']."' and addtime>=".strtotime(date('Y/m/d',strtotime('-1 day')))." and addtime<".strtotime(date('Y/m/d')));

$money_info=$db->fetch_first("select * from usersmoney where openid='".$_SESSION['openid']."'");

$count_arr=\DataCenter\ClickCount::getCountByDay($db,7);


$pagesize = 10;

if(!empty($_GET['action'])&&$_GET['action']=='more'){
    $page=$_GET['page_now'];
//    $res=$db->fetch_all('select A.title,C.addtime,C.money as cmoney,A.money as amoney from clickcount as C left join articles as A on C.contentid=A.id where C.clickOpenid="'.$_SESSION['openid'].'"  limit '.(($page-1)*10).',10');
    $res=\DataCenter\ClickCount::getClickInfoByDb($db,$contentId,$_SESSION['openid'],($page-1)*$pagesize,$pagesize);
    echo json_encode($res);
    exit;
}

$title='收入明细';
$pageidx = 'usercenter';
//var_dump($records);exit;
include '../newtemplate/record.html';