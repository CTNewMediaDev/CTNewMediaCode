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
	\DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}


$pagesize = 2;

//ajax加载更多
if(isset($_GET['action'])&&$_GET['action']=='ajaxpage'){
	$startindex = $_GET['startindex'];
	$order = empty($_GET['order'])?'':$_GET['order'];
	$catid = isset($_GET['catid'])?intval($_GET['catid']):0;
	if(!in_array($order,array('visitcount','sharenum','collectnum','money','leftmoney'))){
		$order = '';
	}

	$pagedata = getPageList($db,$catid,$order,$startindex,$pagesize);
	if(empty($pagedata)){
		echo json_encode(array('status'=>false,'msg'=>'没有更多数据'));
		exit;
	}else{
		echo json_encode(array('status'=>true,'data'=>$pagedata));
		exit;
	}
}


//文章数据
$catid = isset($_GET['catid'])?intval($_GET['catid']):0;
if(isset($_GET['order'])){
	$order = $_GET['order'];
	if(!in_array($order,array('visitcount','sharenum','collectnum','money','leftmoney'))){
		$order = '';
	}
}else{
	$order = '';
}
$startindex = 0;
$articles = getPageList($db,$catid,$order,$startindex,$pagesize);

//page list
function getPageList($db,$catid=0,$order='',$startindex=0,$pagesize=6){
	$sql = "select * from articles where status=1";
	if(!empty($catid))
		$sql .= " and categoryid=".$catid;
	if(empty($order))
		$sql .= " order by id desc limit ".$startindex.",".$pagesize;
	else
		$sql .= " order by ".$order." desc,id desc limit ".$startindex.",".$pagesize;
	$articles = $db->fetch_all($sql);

	foreach($articles as $key=>$item){
		$storeaddr = json_decode($item['storeaddr'],true);
		$articles[$key]['storedist'] = $storeaddr['district'];
		$articles[$key]['starttime'] = date('Y-m-d',$item['starttime']);
		$articles[$key]['endtime'] = date('Y-m-d',$item['endtime']);
	}
	return $articles;
}

//分类数据
$categories = \DataCenter\SystemTool::getAllCategory($db);

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