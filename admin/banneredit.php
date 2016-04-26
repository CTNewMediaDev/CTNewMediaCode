<?php
/**
 * 编辑文章内容
 */
ini_set('display_errors', 1);
require_once 'config.inc.php';

//check isAmdin
isAdmin();


//保存修改
if(isset($_POST['addpost'])){
	$id = intval($_POST['id']);
	$position = addslashes($_POST['position']);
	$title = addslashes($_POST['title']);
	$linkto = addslashes($_POST['linkto']);
	$status = $_POST['status'];
	if(!$id){
		echo '程序错误';
		exit();
	}
	
	$sql = "update banners set title='".$title."',position='".$position."',linkto='".$linkto."',status='".$status."' where id=".$id;
	$db->query($sql);

	if(!empty($_FILES['slpic'])&&!$_FILES['slpic']['error']){
		#/upload/blog/image/{yyyy}{mm}{dd}/{time}{rand:6}
		$daydir = date('Ymd',time());
		$filename = time();
		$filename .= rand(111111,999999);
		$filename .= '.'.substr($_FILES['slpic']['type'],6);
		$returnfilename = '/upload/blog/image/'.$daydir.'/'.$filename;

		$uploaddir = $_SERVER['DOCUMENT_ROOT'].'/upload/blog/image/'.$daydir;
		if(!is_dir($uploaddir)){
			mkdir($uploaddir,0777);
		}

		if(move_uploaded_file($_FILES['slpic']['tmp_name'],$uploaddir.'/'.$filename)){
			$imgurl = $returnfilename;
			$imgurl = 'http://www.zhuangxiuji.com.cn'.$imgurl;
			$sql = "update banners set imgurl='".$imgurl."',status=".$status." where id=".$id;
			$db->query($sql);
			$msg = '数据已保存';
			header("location:banneredit.php?id=".$id."&msg=".$msg);
			exit();
		}else{
			$msg = '上传图片时出错,请联系管理员';
			header("location:banneredit.php?id=".$id."&msg=".$msg);
			exit();
		}
	}

	$msg = '数据已保存';
	header("location:banneredit.php?id=".$id."&msg=".$msg);
	exit();

}else{
	$id = intval($_GET['id']);	
}

if(empty($id)){
	$msg = 'ID can not be empty,Please Choose an banner you want to edit';
}else{
	$sql = "select * from banners where id=".$id;
	$data = $db->fetch_first($sql);
	if(empty($data)){
		$msg = "There is No Banner with this ID";
	}
}

if(isset($_GET['msg'])) $msg = $_GET['msg'];

$allcategory = getCategory($db);

//template
include 'template/banneredit.tpl.php';


//所有分类
function getCategory(&$db){
	$sql = "select * from category";
	$result = $db->fetch_all($sql);
	return $result;
}