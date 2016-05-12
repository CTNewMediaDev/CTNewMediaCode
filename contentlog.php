<?php
/**
 * content的统计信息
 */
ini_set('display_errors', 1);
require_once './config.inc.php';

if(!isset($_SESSION['openid'])||empty($_SESSION['openid'])){
	echo json_encode(array('result'=>'failed','msg'=>'机器人操作'));
	\DataCenter\SystemTool::systemLog($db,'统计错误','疑似机器人提交数据,SESSION openid为空',$_SERVER['REMOTE_ADDR'].print_r($_POST,true));
	exit;
}

//收藏,ajax请求处理
if(isset($_POST['action'])&&$_POST['action']==='collection'){
	$articleid = intval($_POST['articleid']);
	if(!\DataCenter\Collection::checkIsCollected($db,$_SESSION['openid'],$articleid)){
		if(\DataCenter\Collection::logCollection($db,$_SESSION['openid'],$articleid)){
			$sql = "update articles set collectnum=collectnum+1 where id=".$articleid;
			$db->query($sql);
			echo '1';
		}else{
			echo 'action failed';
		}
	}else{
		echo '1';
	}
	exit;
}

//取消收藏,ajax请求处理
if(isset($_POST['action'])&&$_POST['action']==='cancelcollection'){
	$articleid = intval($_POST['articleid']);
	if(\DataCenter\Collection::logCollection($db,$_SESSION['openid'],$articleid,0)){
		$sql = "update articles set collectnum=collectnum-1 where id=".$articleid;
			$db->query($sql);
		echo '1';
	}else{
		echo 'action failed';
	}
	exit;
}

//位置信息,ajax请求处理
if(isset($_POST['action'])&&$_POST['action']==='location'){
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$_SESSION['location'] = $latitude.','.$longitude;
	exit;
}

//处理分享统计
if(isset($_POST['action'])&&$_POST['action']=='share'){
	$contentid = intval($_POST['id']);
	$openid = trim($_POST['openid']);
	if(!empty($contentid)&&!empty($openid)){
		if($_SESSION['openid']!=$openid){
			\DataCenter\SystemTool::systemLog($db,'分享统计错误','openid与session openid不符',$_SERVER['REMOTE_ADDR'].print_r($_POST,true));
			echo json_encode(array('result'=>'failed','msg'=>'openid与session openid不符'));
			exit;
		}
		if(\DataCenter\ShareCount::logShare($db,$contentid,$openid)){
			echo json_encode(array('result'=>'success','msg'=>'分享成功'));
			exit;
		}else{
			echo json_encode(array('result'=>'failed','msg'=>'数据库错误'));
			exit;
		}	
	}
	\DataCenter\SystemTool::systemLog($db,'分享统计错误','参数错误,缺少参数',$_SERVER['REMOTE_ADDR'].print_r($_POST,true));
	echo json_encode(array('result'=>'failed','msg'=>'参数错误'));
	exit;
}


//处理分享点击统计
if(isset($_POST['action'])&&$_POST['action']=='clickshare'){
	$contentid = intval($_POST['id']);
	$clickOpenid = $_SESSION['openid'];
	$shareOpenid = trim($_POST['shareopenid']);
	
	$contentinfo = \DataCenter\ContentClass::getArticle($db,$contentid);

	if(!empty($contentid)&&!empty($clickOpenid)&&!empty($shareOpenid)&&$clickOpenid!=$shareOpenid){
		
		if($contentinfo===false){
			\DataCenter\SystemTool::systemLog($db,'点击统计错误','内容不存在',$_SERVER['REMOTE_ADDR'].print_r($_POST,true));
			echo '0';
			exit;
		}
		
		//点击价格
		$clickprice = rand($contentinfo['minprice']*100,$contentinfo['maxprice']*100);
		if($clickprice/100>$contentinfo['leftmoney']){
			$clickprice = $contentinfo['leftmoney'];
		}else{
			$clickprice = floatval($clickprice/100);
		}

		//位置信息
		$addressinfo = array();
		if(!empty($_SESSION['location'])){
			$xytude = explode(',', $_SESSION['location']);
			$tempxyinfo = Addressinfo::getLocationByxy($xytude[0],$xytude[1]);
			$tempaddress = $tempxyinfo['result']['address_component'];

			$addressinfo['country'] = $tempaddress['nation'];
			$addressinfo['province'] = $tempaddress['province'];
			$addressinfo['city'] = $tempaddress['city'];
			$addressinfo['district'] = $tempaddress['district'];
		}else{
			$tempaddress = Addressinfo::getAddressByIp($_SERVER['REMOTE_ADDR']);

			$addressinfo['country'] = $tempaddress['country'];
			$addressinfo['province'] = $tempaddress['province'];
			$addressinfo['city'] = $tempaddress['city'];
			$addressinfo['district'] = $tempaddress['district'];

			\DataCenter\SystemTool::systemLog($db,'位置数据跟踪','没取到位置坐标，用ip取位置信息',$_SERVER['REMOTE_ADDR'].print_r($_POST,true));
		}
		//SystemTool::systemLog($db,'位置数据跟踪','位置信息',print_r($addressinfo,true));

		$clickresult = \DataCenter\ClickCount::logClick($db,$contentinfo,$clickOpenid,$shareOpenid,$clickprice,$addressinfo);
		switch($clickresult){
			case -1:
				$db->query("insert into clicklog(`contentid`,`openid`,`shareopenid`,`ip`,`msg`,`isvalid`,`location`,`moeny`) values(".$contentinfo['id'].",'".$clickOpenid."','".$shareOpenid."','".$_SERVER['REMOTE_ADDR']."','重复点击','0','".$_SESSION['location']."','".$clickprice."')");
				$msg = array('result'=>false,'msg'=>'重复点击');
				echo json_encode($msg);
				exit;
				break;
			case 0:
				$db->query("insert into clicklog(`contentid`,`openid`,`shareopenid`,`ip`,`msg`,`isvalid`,`location`,`moeny`) values(".$contentinfo['id'].",'".$clickOpenid."','".$shareOpenid."','".$_SERVER['REMOTE_ADDR']."','位置不在分钱范围内','0','".$_SESSION['location']."','".$clickprice."')");
				$msg = array('result'=>false,'msg'=>'位置不在分钱范围内');
				echo json_encode($msg);
				exit;
				break;
			case -2:
				$db->query("insert into clicklog(`contentid`,`openid`,`shareopenid`,`ip`,`msg`,`isvalid`,`location`,`moeny`) values(".$contentinfo['id'].",'".$clickOpenid."','".$shareOpenid."','".$_SERVER['REMOTE_ADDR']."','数据插入错误','0','".$_SESSION['location']."','".$clickprice."')");
				$msg = array('result'=>false,'msg'=>'数据插入错误');
				echo json_encode($msg);
				exit;
				break;
			default:
				$db->query("insert into clicklog(`contentid`,`openid`,`shareopenid`,`ip`,`msg`,`isvalid`,`location`,`moeny`) values(".$contentinfo['id'].",'".$clickOpenid."','".$shareOpenid."','".$_SERVER['REMOTE_ADDR']."','click count ID:".$clickresult."','1','".$_SESSION['location']."','".$clickprice."')");
				\DataCenter\MoneyAction::updateMoneyatClick($db,$shareOpenid,$clickprice);
				$msg = array('result'=>true,'msg'=>'本次阅读为你的好友增加￥'.$clickprice);
				echo json_encode($msg);
				exit;
		}	
	}else{
		\DataCenter\SystemTool::systemLog($db,'点击统计错误','参数错误或缺少参数',$_SERVER['REMOTE_ADDR'].print_r($_POST,true));

		$db->query("insert into clicklog(`contentid`,`openid`,`shareopenid`,`ip`,`msg`,`isvalid`) values(".$contentinfo['id'].",'".$clickOpenid."','".$shareOpenid."','".$_SERVER['REMOTE_ADDR']."','数据异常','0')");

	}
	echo '0';
	exit;
}