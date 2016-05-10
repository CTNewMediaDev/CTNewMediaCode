<?php
/**
 * money操作
 */
namespace DataCenter;

class MoneyAction{


	/**
	 * [countMoney 统计金额]
	 * @param  [type] $db        [description]
	 * @param  [type] $openid    [description]
	 * @param  [type] $counttype [thismonth(本月),thisday（今天）,lastday,all（所有）]
	 * @return [type]            [description]
	 */
	public static function countMoney($db,$openid,$counttype){
		switch($counttype){
			case 'thismonth': 
				$thismonthstart = strtotime(date('Y-m-01',time()));
				$sql = "select sum(money) as thismonthmoney from clickcount where isvalid=1 and shareOpenid='".$openid."' and addtime>".$thismonthstart;
				$tempresult = $db->fetch_first($sql);
				$thismonthmoney = $tempresult['thismonthmoney'];
				$sqlupdate = "update usersmoney set moneythismonth=".$thismonthmoney." where openid='".$openid."'";
				$db->query($sqlupdate);
				self::actionLog($db,$openid,$thismonthmoney,'计算并更新当月收入');
				break;
			case 'lastday':
				$todaystart = strtotime(date('Y-m-d',time()));
				$lastdaystart = $todaystart - 24*3600;
				$sql = "select sum(money) as moneylastday from clickcount where isvalid=1 and shareOpenid='".$openid." and addtime between ".$lastdaystart." and ".$todaystart;
				$tempresult = $db->fetch_first($sql);
				$moneylastday = $tempresult['moneylastday'];
				$sqlupdate = "update usersmoney set moneylastday=".$moneylastday." where openid='".$openid."'";
				$db->query($sqlupdate);
				self::actionLog($db,$openid,$moneylastday,'计算并更新昨日收入');
				break;
			case 'all':
				$sql = "select sum(money) as allmoney from clickcount where isvalid=1 and shareOpenid='".$openid;
				$tempresult = $db->fetch_first($sql);
				$allmoney = $tempresult['allmoney'];
				$sqlupdate = "update usersmoney set moneytotal=".$allmoney." where openid='".$openid."'";
				$db->query($sqlupdate);
				self::actionLog($db,$openid,$moneylastday,'计算并更新所有收入');
				break;
			default:	//this day
				$todaystart = strtotime(date('Y-m-d',time()));
				$sql = "select sum(money) as moneytoday from clickcount where isvalid=1 and shareOpenid='".$openid."' and addtime>".$todaystart;
				$tempresult = $db->fetch_first($sql);
				$moneytoday = $tempresult['moneytoday'];
				$sqlupdate = "update usersmoney set moneytoday=".$moneytoday." where openid='".$openid."'";
				$db->query($sqlupdate);
				self::actionLog($db,$openid,$moneylastday,'计算并更新今日收入');
		}

	}


	/**
	 * [检查点击结果是否有出现未分享的情况]
	 * @param  [type] $db       [description]
	 * @param  [type] $openid   [description]
	 * @param  string $timerang []
	 * @return [type]           [description]
	 */
	public static function checkHaveNoshare($db,$openid,$timestart,$timeend){
		$sql = "select id,contentid from clickcount where shareOpenid ='".$openid."' and addtime between ".$timestart." and ".$timeend." and contentid not in (select contentid from shares where shareOpenid='".$openid."')";
		$tempresult = $db->fetch_all($sql);
		if(!empty($tempresult))
			return true;
		else
			return false;
	}


	/**
	 * [检查count表的数据和log表的数据对得上不]
	 * @param  [type] $db        [description]
	 * @param  [type] $openid    [description]
	 * @param  [type] $timestart [description]
	 * @param  [type] $timeend   [description]
	 * @return [type]            [description]
	 */
	public static function checkLogandCount($db,$openid,$timestart,$timeend){
		$sqllog = "select sum(money) as logmoney from clicklog where isvalid=1 and shareopenid='".$openid."' and addtime between ".$timestart." and ".$timeend;
		$logresult = $db->fetch_first($sqllog);
		$logmoney = $logresult['logmoney'];

		$sqlcount = "select sum(money) as countmoney from clickcount where isvalid=1 and shareopenid='".$openid."' and addtime between ".$timestart." and ".$timeend;
		$countresult = $db->fetch_first($sqlcount);
		$countmoney = $countresult['countmoney'];
		if($logmoney == $countmoney)
			return true;
		else
			return false;
	}


	/**
	 * [检查点击用户是否真实存在]
	 * @param  [type] $db        [description]
	 * @param  [type] $openid    [description]
	 * @param  [type] $timestart [description]
	 * @param  [type] $timeend   [description]
	 * @return [type]            [description]
	 */
	public static function checkHasWrongClickUser($db,$openid='',$timestart='',$timeend=''){
		$sql = "select clickOpenid from clickcount where 1";
		if(!empty($openid)){
			$sql .= " and shareopenid='".$openid."'";
		}

		if(!empty($timestart)&&!empty($timeend)){
			$sql .= " and addtime between ".$timestart." and ".$timeend;
		}

		$sql .= " and clickOpenid not in(select openid from users)";
		$tempresult = $db->fetch_first($sql);
		if(!empty($tempresult))
			return true;
		else
			return false;
	}


	/**
	 * [预支付,审核完成时，写入数据库]
	 * 1: 计算clickcount上月和是否等于usersmoney
	 * @param  [type] $db     [description]
	 * @param  [type] $openid [description]
	 * @return [type]         [description]
	 */
	public static function prePay($db,$openid){

	}


	/**
	 * [payMoney 支付操作]
	 * @param  [type] $db     [description]
	 * @param  [type] $openid [description]
	 * @return [type]         [description]
	 */
	public static function payMoney($db,$openid){

	}


	/**
	 * [操作记录]
	 * @param  [type] $db          [description]
	 * @param  [type] $openid      [description]
	 * @param  [type] $moneyamount [description]
	 * @param  [type] $actiondesc  [description]
	 * @return [type]              [description]
	 */
	public static function actionLog($db,$openid,$moneyamount,$actiondesc){
		$sql = "insert into moneylog(`openid`,`moneyamount`,`actiondesc`,`addtime`)
				values(
					'".$openid."',
					'".$moneyamount."',
					'".$actiondesc."',
					'".time()."'
				)";
		$db->query($sql);
	}

}

?>