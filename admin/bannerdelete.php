<?php
/**
 * delete app
 */

ini_set('display_errors', 1);
require_once 'config.inc.php';

//check isAmdin
isAdmin();

$id = intval($_GET['id']);
if(empty($id)){
	echo 'no this banner';
	exit();
}	
$sql = "select id from banners where id=".$id;
$data = $db->fetch_first($sql);
if(empty($data)){
	$msg = "There is No Banner with this ID";
	echo $msg;
	exit();
}

$sql = "delete from banners where id=".$id;
$db->query($sql);

echo 'success';