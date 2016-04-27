<?php
/**
* 首页
* 分类，幻灯片，其它链接
*/

ini_set('display_errors', 1);
require_once './config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
	$redirecturl = SITE_DOMAIN.'index.php';
	$redirecturl .= '#'.time();
	SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}

//首页banner
$sql = "select * from banners where position='首页' and status=1";
$banners = $db->fetch_all($sql);

//分类数据
$categories = SystemTool::getAllCategory($db);

//默认数据
$sql = "select * from articles where status=1 order by id desc limit 10";
$articles = $db->fetch_all($sql);


$pageidx = 'index';

//meta信息
$title = '微官网--同城新媒';

//template
include 'newtemplate/index.html';