<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/21 0021
 * Time: 10:26
 */
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'user/index.php';
    $redirecturl .= '#'.time();
    \DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}


//userinfo
$user_info=\DataCenter\Userinfo::getUserinfobyDb($db,$_SESSION['openid']);


//pagedata
$page=(empty($_GET['page_now'])||!is_numeric(@$_GET['page_now']))?1:$_GET['page_now'];


$shares=\DataCenter\ShareCount::getShare($db,($page-1)*10,10);
if($shares){
    for($i=0;$i<count($shares);$i++){
        $contentInfo=\DataCenter\ContentClass::getArticle($db,$shares[$i]['contentid']);
        if($contentInfo) {
            $storeaddr=json_decode($contentInfo['storeaddr'],true);
            $contentInfo['storedist'] = $storeaddr['district'];
            $contentInfo['starttime'] = date('Y-m-d',$contentInfo['starttime']);
            $contentInfo['endtime'] = date('Y-m-d',$contentInfo['endtime']);

            $userClickCount=$db->fetch_first("select count(*) as c_count,sum(money) c_money from clickcount where isvalid=1 and shareOpenid='".$_SESSION['openid']."' and contentid=".$contentInfo['id']);
            $shares[$i] = array_merge($shares[$i], $contentInfo,$userClickCount);
        }else{
            unset($shares[$i]);
        }
    }
}

//点击信息
$click_info=\DataCenter\ClickCount::getClickInfoByDbAll($db,$_SESSION['openid'],($page-1)*10,10);

//分享量
$shareCount=$db->fetch_first("select count(1) as count from shares where shareOpenid='".$_SESSION['openid']."'");

//点击量
$clickCount=$db->fetch_first("select count(1) as count from clickcount where isvalid=1 and shareOpenid='".$_SESSION['openid']."'");

if(@$_GET['action']=='more'){
    echo json_encode($shares);
    exit;
}elseif(@$_GET['action']=='click_more'){
    echo json_encode($click_info);
    exit;
}


$title='我的分享';
$pageidx = 'usercenter';
include '../newtemplate/usershare.html';