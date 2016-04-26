<?php
/**
 * 写新文章
 */
ini_set('display_errors', 1);
require_once 'config.inc.php';
//check isAmdin
isAdmin();

$action = empty($_GET['action'])?'':$_GET['action'];

//添加分类
if($action == 'addcategory'){
	if(isset($_POST['addcategory'])){
		$categoryname = $_POST['catname'];
		$ordernum = intval($_POST['ordernum']);
		$iconclass = $_POST['iconclass'];
		$status = $_POST['status'];

		if(checkCatIsExists($db,'name',$categoryname)!==false){
			$msg = '分类名已存在';
			header("location:category.php?action=addcategory&msg=".$msg);
			exit;
		}
		$sql = "insert into category(`name`,`ordernum`,`iconclass`,`status`) values('".$categoryname."','".$ordernum."','".$iconclass."','".$status."')";
		$db->query($sql);
		$catid = $db->insert_id();
		if($catid){
			$msg = '分类已添加成功';
			header("location:category.php?action=editcategory&id=".$catid."&msg=".$msg);
			exit;
		}
	}
	else{
		$msg = isset($_GET['msg'])?$_GET['msg']:'';
		//template
		include 'template/addcategory.tpl.php';
		exit;
	}
}

//修改分类
if($action=='editcategory'){
	if(isset($_POST['savedata'])){
		$catid = intval($_POST['catid']);
		$name = $_POST['catname'];
		$ordernum = intval($_POST['ordernum']);
		$iconclass = $_POST['iconclass'];
		$status = $_POST['status'];
		$sql = "update category set name='".$name."',ordernum='".$ordernum."',iconclass='".$iconclass."',status='".$status."' where id=".$catid;
		$db->query($sql);
		$rowsnum = $db->affected_rows();
		if($rowsnum>0){
			$msg = '修改成功';
			header("location:category.php?action=editcategory&id=".$catid."&msg=".$msg);
			exit;
		}else{
			$msg = '出错了，修改失败';
			header("location:category.php?action=editcategory&id=".$catid."&msg=".$msg);
			exit;
		}
	}else{
		$msg = isset($_GET['msg'])?$_GET['msg']:'';
		$id = intval($_GET['id']);
		//template
		$categoryinfo = checkCatIsExists($db,'id',$id);
		if($categoryinfo!==false){
			include 'template/editcategory.tpl.php';
			exit;
		}else{
			echo '分类不存在。<script>setTimeout(function(){window.location.href=\'category.php\';},1000)</script>';
			exit;
		}
	}
}


//删除分类
if($action=='deletecategory'){
	$id = intval($_GET['id']);
	$sql = "delete from category where id=".$id;
	$db->query($sql);
	$rowsnum = $db->affected_rows();
	if($rowsnum>0){
		echo 'success';
		exit;
	}
}

//默认分类列表
include 'template/category.tpl.php';



//检查分类是否已经存在
function checkCatIsExists(&$db,$type,$value){
	if($type=='name')
		$sql = "select * from category where name='".$value."'";
	else
		$sql = "select * from category where id='".$value."'";
	$category = $db->fetch_first($sql);
	if(!empty($category))
		return $category;
	else
		return false;
}