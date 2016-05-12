<?php
/**
 * timer
 * 定时更新数据
 * 昨日收益
 */
ini_set('display_errors', 1);
require_once './config.inc.php';

$countmonth = date(Y).'.'.date('m')-1;
$sql = "select openid from users";
$tempresult = $db->fetch_all($sql);

for($i=0;$i<count($tempresult);$i++){
	$openid = $tempresult[$i]['openid'];
	echo date('Y-m-d H:i:s',time()).'--'.$openid.'--start';
	\DataCenter\MoneyAction::updateMoneyDay($db,$openid);
	echo date('Y-m-d H:i:s',time()).'--'.$openid.'--end'."\r\n";
}

