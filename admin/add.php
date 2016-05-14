<?php
/**
 * 写新文章
 */
ini_set('display_errors', 1);
require_once 'config.inc.php';
//check isAmdin
isAdmin();



if(isset($_POST['addpost'])){
	if(isset($_GET['formid'])&&$_GET['formid']=='articleform'){
		$title = addslashes(trim($_POST['title']));
		$content = addslashes($_POST['content']);
		$categoryid = $_POST['categoryid'];

		$sql = "insert into articles(`title`,`categoryid`) values('".$title."',".$categoryid.")";
		$db->query($sql);
		$articleId = $db->insert_id();
		if($articleId){
			//content表
			$sql = "insert into cmscontent(`articleid`,`content`) values(".$articleId.",'".$content."')";
			$db->query($sql);
			$msg = '文章已添加请设置其他参数';
			if(preg_match_all('/<img src="([^>]+)"/isU', $_POST['content'], $matches)){
				$topbanners = $matches[1];
				//var_dump($topbanners);die();
				for($i=0;$i<count($topbanners);$i++){
					$imginfo = explode("/",$topbanners[$i]);
					$im=imagecreatefromjpeg($_SERVER['DOCUMENT_ROOT'].$topbanners[$i]);//参数是图片的存方路径
					$maxwidth="600";//设置图片的最大宽度
					$maxheight="900";//设置图片的最大高度
					$name=$_SERVER['DOCUMENT_ROOT'].$topbanners[$i];
					$filetype=substr($imginfo[count($imginfo)-1],strrpos($imginfo[count($imginfo)-1],'.'));
					resizeImage($im,$maxwidth,$maxheight,$name,$filetype);
				}
			}
			header("location:edit.php?id=".$articleId."&msg=".$msg);
			exit;
		}else{
			echo $db->error();
			exit;
		}
	}
}else{
	$allcategory = getCategory($db);
	//template
	include 'template/add.tpl.php';
}



//alias算法
function prepareUrlText($str){
	$notAcceptableCharactersRegex = '#[^-a-zA-Z0-9_ ]#';
	$str = preg_replace($notAcceptableCharactersRegex, '', $str);
	$str = trim($str);
	$str = preg_replace('#[-_ ]+#', '-', $str);
	$str = trim($str,'-');
	return strtolower($str);
}

//所有分类
function getCategory(&$db){
	$sql = "select * from category";
	$result = $db->fetch_all($sql);
	return $result;
}