<?php
/**
 用户首页
 */
ini_set('display_errors', 1);
require_once '../config.inc.php';

//用户openid
if(empty($_SESSION['openid'])){
    $redirecturl = SITE_DOMAIN.'user/rank.php';
    $redirecturl .= '#'.time();
    \DataCenter\SystemTool::checkOpenid($db,'snsapi_userinfo',$redirecturl);
}

$pagesize = 2;

//ajax加载更多
if(isset($_GET['action'])&&$_GET['action']=='ajaxpage'){
	$startindex = $_GET['startindex'];
	
	$pagedata = getPageList($db,$startindex,$pagesize);
	if(empty($pagedata)){
		echo json_encode(array('status'=>false,'msg'=>'没有更多数据'));
		exit;
	}else{
		echo json_encode(array('status'=>true,'data'=>$pagedata));
		exit;
	}
}


$startindex = 0;
$pagedata = getPageList($db,$startindex,$pagesize);


//page list
function getPageList($db,$startindex=0,$pagesize=6){
	$sql = "select * from users where 1 order by ranknum asc limit ".$startindex.",".$pagesize;
	$users = $db->fetch_all($sql);
	foreach($users as $key=>$item){
		$totalmoney = getuserTotalmoney($db,$item['openid']);
		$users[$key]['moneytotal'] = $totalmoney;
	}
	return $users;
}

function getuserTotalmoney($db,$openid){
	$sql = "select moneytotal from usersmoney where openid='".$openid."'";
	$tempresult = $db->fetch_first($sql);
	return $tempresult['moneytotal'];
}


$title='排行榜';
$pageidx = 'rank';
$user_info=\DataCenter\Userinfo::getUserinfobyDb($db,$_SESSION['openid']);

include '../newtemplate/userrank.html';