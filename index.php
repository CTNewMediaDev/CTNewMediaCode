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

//文章数据
if(isset($_GET['catid'])){
	$catid = intval($_GET['catid']);
}
if(isset($_GET['order'])){
	$order = $_GET['order'];
	if(!in_array($order,array('visitcount','sharenum','collectnum','money','leftmoney'))){
		$order = '';
	}
}else{
	$order = '';
}

$sql = "select * from articles where status=1";
if(!empty($catid))
	$sql .= " and categoryid=".$catid;
if(empty($order))
	$sql .= " order by id desc limit 10";
else
	$sql .= " order by ".$order." desc,id desc limit 10";
$articles = $db->fetch_all($sql);

foreach($articles as $key=>$item){
	$storeaddr = json_decode($item['storeaddr'],true);
	$articles[$key]['storedist'] = $storeaddr['district'];
}


//分类数据
$categories = SystemTool::getAllCategory($db);

//banner图
if(!empty($catid)){
	for($i=0;$i<count($categories);$i++){
		if($categories[$i]['id']==$catid){
			$catname = $categories[$i]['name'];
			break;
		}
	}
	$sql = "select * from banners where position='".$catname."' and status=1";
	$banners = $db->fetch_all($sql);
}
if(empty($banners)){
	$sql = "select * from banners where position='首页' and status=1";
	$banners = $db->fetch_all($sql);
}

//排序链接地址
$orderlink = 'index.php?';
if(!empty($catid))
	$orderlink .= 'catid='.$catid."&";

$pageidx = 'index';

//meta信息
$title = '微官网--同城新媒';

//template
include 'newtemplate/index.html';