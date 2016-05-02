<?php

function lurushake($wecha_id){
	$sql_flg="SELECT * FROM  `weixin_flag` WHERE `openid` = '$wecha_id'";
	$query_num=mysql_query($sql_flg);
	$q=mysql_fetch_row($query_num);
	$nicheng = $q[4];
	$avatar = $q[5];
	
$sql_shake="replace  `weixin_shake_toshake` (`wecha_id`,`phone`,`point`,`avatar`) VALUES ('$wecha_id','$nicheng','0','$avatar')";
mysql_query($sql_shake);

$xuanze = "SELECT * FROM  `weixin_flag` WHERE  `openid` =  '{$wecha_id}'";
$chaxun = mysql_query($xuanze) or die(mysql_error());
$q = mysql_fetch_array($chaxun);
if ($q[nickname] == '') {
	return 1;
	}
}
function doshenhe($cid){
	$sql_num="SELECT * FROM  `weixin_wall_num` ";
	$query_num=mysql_query($sql_num);
	$q=mysql_fetch_row($query_num);
	$num=$q[0];
	$sql_flg="SELECT * FROM  `weixin_wall` WHERE `id` = '$cid'";
	$query_num=mysql_query($sql_flg);
	$q=mysql_fetch_row($query_num);
	$fakeid=$q[2];
	$content=$q[4];
	$datetime=$q[10];
	$sql2="UPDATE  `weixin_flag` SET `status` =  '2',`content` = '$content',`datetime`='$datetime' WHERE `fakeid` = '$fakeid' and `status` !=  '1'";
	$query2=mysql_query($sql2);
	$sql1="UPDATE  `weixin_wall` SET  `ret` =  '1',`num` = '$num' WHERE  `id` = '$cid'";
	$query1=mysql_query($sql1);
		if($query1){
		$sql_num="UPDATE `weixin_wall_num` SET `num` = `num`+1";
		$query_num=mysql_query($sql_num);
		}
	return 1;
}
?>