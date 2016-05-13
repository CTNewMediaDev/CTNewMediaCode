<?php
/**
 * user rank
 */
ini_set('display_errors', 1);
require_once './config.inc.php';

$sql = "select openid from usersmoney order by moneytotal desc";
$users = $db->fetch_all($sql);
for($i=0;$i<count($users);$i++){
	$sql = "update users set ranknum=".($i+1)." where openid='".$users[$i]['openid']."'";
	$db->query($sql);
	echo $users[$i]['openid'].' : '.($i+1)."\r\n";
}

