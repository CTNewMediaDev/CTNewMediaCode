<?php
/**
 *  share统计
 *
 */
namespace DataCenter;

class ShareCount{

	/**
	 * share内容记录
	 * @param  [type] $db        [description]
	 * @param  [type] $contentid [description]
	 * @param  [type] $openid    [description]
	 * @return [type]            [description]
	 */
	public static function logShare($db,$contentid,$openid){
		$result = $db->fetch_first("select * from shares where contentid=".$contentid." and shareOpenid='".$openid."'");
		$timenow = time();
		if(!empty($result['id'])){
			$db->query("update shares set updatetime=".$timenow." where id=".$result['id']);
		}else{
			$sql = "insert into shares(`contentid`,`shareOpenid`,`addtime`)
					values(
						'".$contentid."',
						'".$openid."',
						'".$timenow."'
					)";
			$db->query($sql);
			$sqlupdate = "update articles set sharenum = sharenum+1 where id=".$contentid;
			$db->query($sqlupdate);
		}
		$errormsg = $db->error();
		if(!empty($errormsg))
			return false;
		else
			return true;
	}
    /**
     * 用户分享统计
     * @param $db
     * @return bool
     */
    public static function getShare($db,$from,$limit){
        $res=$db->fetch_all("select * from shares where shareOpenid='".$_SESSION['openid']."' limit $from,".$limit);
        if(!empty($res)){
            return $res;
        }else{
            return false;
        }
    }
	
}
?>