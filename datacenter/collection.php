<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/20 0020
 * Time: 15:44
 */
class Collection{
    public static function getCollection($db,$from,$limit){
        $sql="select * from collection where collectionOpenid='".$_SESSION['openid']."' limit $from,$limit";
        $res=$db->fetch_all($sql);
        if(!empty($res)){
            return $res;
        }else{
            return false;
        }
    }
}