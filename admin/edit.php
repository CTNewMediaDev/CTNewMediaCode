<?php
/**
 * 编辑文章内容
 */
ini_set('display_errors', 1);
require_once 'config.inc.php';

//check isAmdin
isAdmin();


//保存修改
if(isset($_POST['savepost'])){

	//文章内容
	if(isset($_GET['formid'])&&$_GET['formid']=='articleform'){
		$id = intval(trim($_POST['articleid']));
		$content = addslashes($_POST['content']);
		$title = addslashes($_POST['title']);
		$categoryid = intval($_POST['categoryid']);
		$sql = "update articles set title='".$title."',categoryid=".$categoryid." where id=".$id;
		$db->query($sql);
		$sql = "update cmscontent set content='".$content."' where articleid=".$id;
		$db->query($sql);
		$msg = '文章内容已保存';
		header("location:edit.php?id=".$id."&msg=".$msg);
		exit;
	}

	//发布文章，修改状态
	if(isset($_GET['formid'])&&$_GET['formid']=='statusform'){
		$id = intval(trim($_POST['articleid']));
		$status = intval($_POST['status']);
		$sql = "update articles set status=".$status." where id=".$id;
		$db->query($sql);
		$msg = '文章状态已经修改';
		header("location:edit.php?id=".$id."&msg=".$msg);
		exit;
	}


	//推广设置
	if(isset($_GET['formid'])&&$_GET['formid']=='tuiguang'){
		$id = intval(trim($_POST['articleid']));
		$starttime = strtotime($_POST['starttime']);
		$endtime = strtotime($_POST['endtime']);
		$money = floatval($_POST['money']);
		$minprice = floatval($_POST['minprice']);
		$maxprice = floatval($_POST['maxprice']);

		$sql = "update articles set starttime=".$starttime.",endtime=".$endtime.",money=".$money.",minprice=".$minprice.",maxprice=".$maxprice." where id=".$id;
		$db->query($sql);
		$msg = '推广设置已保存';
		header("location:edit.php?id=".$id."&msg=".$msg);
		exit;
	}

	//地址设置
	if(isset($_GET['formid'])&&$_GET['formid']=='addrform'){
		$id = intval(trim($_POST['articleid']));
		//商家地址
		$storeaddress['province'] = urlencode($_POST['storeprovince']);
		$storeaddress['city'] = urlencode($_POST['storecity']);
		$storeaddress['district'] = urlencode(_POST['storedist']);
		$storeaddress['address'] = urlencode($_POST['storeaddr']);
		$storeaddr = json_encode($storeaddress);

		//分钱范围
		$areadata = array();
		$areadata['country'] = urlencode('中国');

		$province = trim($_POST['province']);
		$areadata['province'] = urlencode($province);

		$city = trim($_POST['city']);
		$district = trim($_POST['district']);
		if($city=='全省'){
			$city = 'all';
			$district = '';
		}else{
			if(!empty($district)){
				$districttemp = explode('|', $district);
				foreach($districttemp as $key=>$item){
					$districttemp[$key] = urlencode($item);
				}
			}
		}
		$areadata['city'] = urlencode($city);
		$areadata['district'] = isset($districttemp)?$districttemp:urlencode($district);
		$moneyarea = json_encode($areadata);

		$sql = "update articles set storeaddr='".urldecode($storeaddr)."',city='".urldecode($moneyarea)."' where id=".$id;
		$db->query($sql);
		$msg = '位置设置已保存';
		header("location:edit.php?id=".$id."&msg=".$msg);
		exit;
	}

	//图片设置
	if(isset($_GET['formid'])&&$_GET['formid']=='picform'){
		$id = intval(trim($_POST['articleid']));

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
				$listimage = $returnfilename;
				$listimage = 'http://www.zhuangxiuji.com.cn'.$listimage;
			}
			$sql = "update articles set listimage='".$listimage."' where id=".$id;
			$db->query($sql);
		}

		if(isset($_POST['bannercontent'])){
			$sql = "update articles set banners='".$_POST['bannercontent']."' where id=".$id;
			$db->query($sql);
		}
		$msg = '图片设置已保存';
		header("location:edit.php?id=".$id."&msg=".$msg);
		exit;
	}
	


	$money = floatval($_POST['money']);
	$leftmoney = floatval($_POST['leftmoney']);
	$minprice = floatval($_POST['minprice']);
	$maxprice = floatval($_POST['maxprice']);
	$priceperclick = floatval($_POST['priceperclick']);
	$clicknum = intval($_POST['clicknum']);
	$sharenum = intval($_POST['sharenum']);
	$visitcount = intval($_POST['visitcount']);
	

	if(empty($listimage)){
		if(preg_match('/<img(.*?)src="(.*?)(?=")/',$_POST['content'],$temp)){
			$listimage = $temp[2];
		}
	}

	if(!empty($listimage)&&strpos($listimage,'//')===false){
		$listimage = 'http://www.zhuangxiuji.com.cn'.$listimage;
	}

}else{
	$id = intval($_GET['id']);	
}

if(empty($id)){
	$msg = 'ID can not be empty,Please Choose an article you want to edit';
}else{
	$sql = "select * from articles a,cmscontent b where a.id=b.articleid and a.id=".$id;
	$data = $db->fetch_first($sql);
	if(empty($data)){
		$msg = "There is No article with this ID";
	}else{
		if(!empty($data['city'])){
			$tempareadata = json_decode($data['city'],true);
			$data['province'] = $tempareadata['province'];
			$data['tempcity'] = $tempareadata['city']=='all'?'全省':$tempareadata['city'];
			$data['district'] = is_array($tempareadata['district'])?implode('|',$tempareadata['district']):'';
		}else{
			$data['province'] = '';
			$data['tempcity'] = '';
			$data['district'] = '';
		}

		if(!empty($data['storeaddr'])){
			$storetempdata = json_decode($data['storeaddr'],true);
			$data['storeprovince'] = $storetempdata['province'];
			$data['storecity'] = $storetempdata['city'];
			$data['storedist'] = $storetempdata['district'];
			$data['addr'] = $storetempdata['address'];
		}else{
			$data['storeprovince'] = '';
			$data['storecity'] = '';
			$data['storedist'] = '';
			$data['addr'] = '';
		}

	}
}

if(isset($_GET['msg'])) $msg = $_GET['msg'];

$allcategory = getCategory($db);

//template
include 'template/edit.tpl.php';


//所有分类
function getCategory(&$db){
	$sql = "select * from category";
	$result = $db->fetch_all($sql);
	return $result;
}