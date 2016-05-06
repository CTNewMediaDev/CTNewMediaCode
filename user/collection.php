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
    SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}
$title='我的收藏';
$pageidx = 'index';

$pagesize=2;
$startindex = 0;

$collections=Collection::getCollection($db,0,10);
if($collections){
    for($i=0;$i<count($collections);$i++){
        $contentInfo=ContentClass::getArticle($db,$collections[$i]['contentid']);
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
//var_dump($collections);exit;
//$article=ContentClass::getArticle($db,)
include '../newtemplate/usercollection.html';