<?php
/**
* content.php   详细页面
*/

ini_set('display_errors', 1);
require_once './config.inc.php';

$contentid = intval($_GET['id']);

//share openid
if(isset($_GET['shareopenid'])&&!empty($_GET['shareopenid'])){
	$shareopenid = $_GET['shareopenid'];
}

//用户openid
if(empty($_SESSION['openid'])){
	\DataCenter\SystemTool::systemLog($db,'content.php','empty session openid','check openid');
	$redirecturl = SITE_DOMAIN.'content.php?id='.$contentid;
	if(!empty($shareopenid))
		$redirecturl .= '&shareopenid='.$shareopenid;
	$redirecturl .= '#'.time();
	\DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
	exit;
}



$content = \DataCenter\ContentClass::getArticle($db,$contentid);
if(empty($content)){
	echo '内容不存在或者已删除';
	exit;
}

if(!empty($shareopenid)){
	$isclicked = \DataCenter\ClickCount::checkisClicked($db,$contentid,$_SESSION['openid'],$shareopenid);
}

//分钱范围
$tempareadata = json_decode($content['city'],true);
$data['province'] = $tempareadata['province'];
$data['tempcity'] = $tempareadata['city'];
$data['district'] = is_array($tempareadata['district'])?implode(',',$tempareadata['district']):'';
if(!empty($data['district'])){
	$areadata = $data['tempcity'].'('.$data['district'].')';
}else if($data['tempcity']!='all'){
	$areadata = $data['tempcity'];
}else{
	$areadata = $data['province'];
}

//商家地址
$storeaddr = json_decode($content['storeaddr'],true);

//banners
if(preg_match_all('/<img src="([^>]+)"/i', $content['banners'], $matches)){
	$topbanners = $matches[1];
}

//is collected
$iscollected = \DataCenter\Collection::checkIsCollected($db,$_SESSION['openid'],$contentid);


$pageidx = 'content';
$title = '同城新媒';

//jsapi 相关部分
$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$signPackage = \LaneWeChat\Core\JsapiTicket::getSignPackage($url);

//share setting

$shareinfo['title'] = $content['title'];
$url = SITE_DOMAIN."content.php?id=".$content['id'];
if(\LaneWeChat\Core\UserManage::checkisSubscribe($_SESSION['openid'])){
	$url .= '&shareopenid='.$_SESSION['openid'];
}	
$shareinfo['link'] = $url;
$shareinfo['imgUrl'] = $content['listimage'];

//template
include 'newtemplate/content.html';

//visit num + 1
$db->query("update articles set visitcount=visitcount+1 where id=".$contentid);