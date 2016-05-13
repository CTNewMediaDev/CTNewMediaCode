<?php
/**
用户收藏
 */
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'user/index.php';
    $redirecturl .= '#'.time();
    \DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}


$pagesize=3;
$startindex = 0;

$user_info=\DataCenter\Userinfo::getUserinfobyDb($db,$_SESSION['openid']);

$page_now=isset($_GET['page_now'])?intval($_GET['page_now']):0;

$collections=\DataCenter\Collection::getCollection($db,$_SESSION['openid'],$page_now,$pagesize);

if($collections){
    for($i=0;$i<count($collections);$i++){
        $contentInfo=\DataCenter\ContentClass::getArticle($db,$collections[$i]['contentid']);
        if($contentInfo) {
            $collections[$i] = array_merge($collections[$i], $contentInfo);
            $storeaddr=json_decode($collections[$i]['storeaddr'],true);
            $collections[$i]['district']=$storeaddr['district'];
            $collections[$i]['starttime']=date('Y-m-d',$collections[$i]['starttime']);
            $collections[$i]['endtime']=date('Y-m-d',$collections[$i]['endtime']);
        }else{
            unset($collections[$i]);
        }
    }
}
if(!empty($_GET['action'])&&$_GET['action']=='more'){
    echo json_encode($collections);
    exit;
}


$title='我的收藏';
$pageidx = 'usercenter';
include '../newtemplate/usercollection.html';