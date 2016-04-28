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
    SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}
$title='我的分享';
$pageidx = 'index';
$user_info=Userinfo::getUserinfobyDb($db,$_SESSION['openid']);
$shares=ShareCount::getShare($db);
if($shares){
    for($i=0;$i<count($shares);$i++){
        $contentInfo=ContentClass::getArticle($db,$shares[$i]['contentid']);
        if($contentInfo) {
            $contentInfo['city']=json_decode($contentInfo['city']);
            $userClickCount=$db->fetch_first("select count(*) as c_count,sum(money) c_money from clickcount where shareOpenid='".$_SESSION['openid']."' and contentid=".$contentInfo['id']);
            $shares[$i] = array_merge($shares[$i], $contentInfo,$userClickCount);
        }else{
            unset($shares[$i]);
        }
    }
}
include '../newtemplate/usershare.html';