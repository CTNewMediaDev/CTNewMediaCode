<?php
/**
 * timer
 * 定时更新数据
 * 上月收益，并计算moneyleft
 */
ini_set('display_errors', 1);
require_once './config.inc.php';

$countmonth = date('Y').'.'.date('m')-1;
$sql = "select openid from users";
$tempresult = $db->fetch_all($sql);

for($i=0;$i<count($tempresult);$i++){
	$openid = $tempresult[$i]['openid'];
	echo date('Y-m-d H:i:s',time()).'--'.$openid.'--start';
	\DataCenter\MoneyAction::countlastMonth($db,$openid);
	\DataCenter\MoneyAction::countLeftMoney($db,$openid);
	echo date('Y-m-d H:i:s',time()).'--'.$openid.'--end'."\r\n";
}