<?php
date_default_timezone_set('PRC');
session_start();
define('SITE_DOMAIN','http://www.zhuangxiuji.com.cn/');
//数据库
$DB['config']['dbhost'] = 'localhost';
$DB['config']['dbname'] = 'ctnewmedia';
$DB['config']['dbuser'] = 'root';
$DB['config']['dbpassword'] = 'CT#NewMedia';



require_once '../include/mysql.class.php';
$db = new mysql;
$db->connect($DB['config']['dbhost'], $DB['config']['dbuser'], $DB['config']['dbpassword'], $DB['config']['dbname']);

//登录
function isAdmin(){
        if(empty($_SESSION['admin'])){
                header("location:login.php");
        }
}


