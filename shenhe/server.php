<?php
if (isset($_POST['content'])) {
	include 'db.php';
	$cid = $_POST['content'];
	$sql_num="SELECT * FROM  `weixin_wall_num` ";

	$query_num=mysqli_query($link,$sql_num);

	$q=mysqli_fetch_row($query_num);

	$num=$q[0];

	$sql_flg="SELECT * FROM  `weixin_wall` WHERE `id` = '$cid'";

	$query_num=mysqli_query($link,$sql_flg);

	$q=mysqli_fetch_row($query_num);

	$fakeid=$q[2];
	$content=$q[4];
	$datetime=$q[10];

	$sql2="UPDATE  `weixin_flag` SET `status` =  '2',`content` = '$content',`datetime`='$datetime' WHERE `fakeid` = '$fakeid' and `status` !=  '1'";

	$query2=mysqli_query($link,$sql2);

	$sql1="UPDATE  `weixin_wall` SET  `ret` =  '1',`num` = '$num' WHERE  `id` = '$cid'";

	$query1=mysqli_query($link,$sql1);

	if($query1){

	$sql_num="UPDATE `weixin_wall_num` SET `num` = `num`+1";

	$query_num=mysqli_query($link,$sql_num);
	if ($query_num) {
		echo "审核成功!";
	}
	else{
		echo "失败:$sql";
	}
}
else{
	echo  "no post data";
}
}
