<?php
/**
 * 写新文章
 */
ini_set('display_errors', 1);
require_once 'config.inc.php';
//check isAmdin
isAdmin();



if(isset($_POST['addpost'])){
		$title = addslashes(trim($_POST['title']));
		$position = addslashes($_POST['position']);
		$linkto = addslashes($_POST['linkto']);
		$status = $_POST['status'];

		$sql = "insert into banners(`title`,`position`,`linkto`) values('".$title."','".$position."','".$linkto."')";
		$db->query($sql);
		$id = $db->insert_id();

		if(!$id){
			$msg = $db->error();
			header("location:banneradd.php?msg=".$msg);
			exit();
		}else{
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

			}else{
				$msg = '请选择图片上传';
				header("location:banneredit.php?id=".$id."&msg=".$msg);
				exit();
			}
		}
	
}else{
	$msg = isset($_GET['msg'])?$_GET['msg']:'';
	$allcategory = getCategory($db);
	//template
	include 'template/banneradd.tpl.php';
}


//所有分类
function getCategory(&$db){
	$sql = "select * from category";
	$result = $db->fetch_all($sql);
	return $result;
}