<?php
/**
 * money操作
 */
class MoneyAction{


	/**
	 * [countMoney 统计金额]
	 * @param  [type] $db        [description]
	 * @param  [type] $openid    [description]
	 * @param  [type] $counttype [thismonth(本月),thisday（今天）,lastmonth,lastday,all（所有）]
	 * @return [type]            [description]
	 */
	public static function countMoney($db,$openid,$counttype){


	}

	/**
	 * [预支付,审核完成时，写入数据库]
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

	}

}

?>