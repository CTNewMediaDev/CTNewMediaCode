<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/20 0020
 * Time: 15:44
 */
namespace DataCenter;

class Collection{
	/**
	 * [getCollection description]
	 * @param  [type] $db    [description]
	 * @param  [type] $from  [description]
	 * @param  [type] $limit [description]
	 * @return [type]        [description]
	 */
    public static function getCollection($db,$openid,$from,$limit){
        $sql="select * from collection where collectionOpenid='".$openid."' limit $from,$limit";
        $res=$db->fetch_all($sql);
        if(!empty($res)){
            return $res;
        }else{
            return false;
        }
    }

    /**
     * [logCollection description]
     * @param  [type]  $db        [description]
     * @param  [type]  $openid    [description]
     * @param  [type]  $articleid [description]
     * @param  integer $inorout   [收藏还是取消]
     * @return [type]             [description]
     */
    public static function logCollection($db,$openid,$contentid,$inorout=1){
    	if($inorout==0){
    		$sql = "delete from collection where contentid=".$contentid." and collectionOpenid='".$openid."'";
    	}else{
    		if(!self::checkIsCollected($db,$openid,$contentid)){
    			$sql = "insert into collection(`contentid`,`collectionOpenid`,`addtime`)
						values(
							".$contentid.",
							'".$openid."',
							".time()."	
						)";
    		}
    	}
    	$db->query($sql);
    	$error = $db->error();
    	return empty($error)?true:false;
    }

    /**
     * [checkIsCollected description]
     * @param  [type] $db        [description]
     * @param  [type] $openid    [description]
     * @param  [type] $contentid [description]
     * @return [type]            [description]
     */
    public static function checkIsCollected($db,$openid,$contentid){
    	$sql = "select * from collection where contentid=".$contentid." and collectionOpenid='".$openid."'";
    	$res = $db->fetch_first($sql);
    	if(!empty($res['id']))
    		return true;
    	else
    		return false;
    }
}