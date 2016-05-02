<html>
<head>
<meta charset='UTF-8'>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>信息录入</title>
<style>
p{
font-size:50
}
</style>
</head>
<body>
<?php
@header("Content-type: text/html; charset=utf-8");
if (isset($_GET['code']))
{
    $code = $_GET['code'];
}
else{
    echo "NO CODE";
	}
if (isset($_GET['userid']))
{
    $fromUserId = $_GET['userid'];
    //echo $fromUserId;
}
else{
	echo "NO ID";
}
//使用量院微工作的接口，获取token和openid
$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wxc2686f865fcf8f02&secret=b3844c1d941d6c0c6761bae08ee40020&code=".$code."&grant_type=authorization_code";
$AccessToken = file_get_contents($url);
$AccessTokenJosn = json_decode($AccessToken);
$access_token = $AccessTokenJosn->access_token;
$openid = $AccessTokenJosn->openid;
//var_dump($AccessTokenJosn);

$url = "https://api.weixin.qq.com/sns/userinfo?access_token=".$access_token."&openid=".$openid;
$UserInfo = file_get_contents($url);
$UserInfoJosn = json_decode($UserInfo);
//for sql UPDATE
$id = $fromUserId;
$nickname = bin2hex($UserInfoJosn->nickname);
$sex = $UserInfoJosn->sex;
$headurl = $UserInfoJosn->headimgurl;
$headurl = substr($headurl,0,strlen($headurl)-1); 
$headurl = $headurl.'132';
$img=file_get_contents($headurl);
file_put_contents("./headimg/{$openid}.png", $img);
$avatar = "http://kirisamenana.com/wall100/headimg/{$openid}.png";
echo "<img src=\"http://kirisamenana.com/wall100/headimg/{$openid}.png\">";
echo '<p>';
echo "您好！{$UserInfoJosn->nickname}，欢迎使用信息小助手微信墙，向我们的公众号发送消息即可上墙。";
echo '</p>';
include 'config.php';
$link = mysqli_connect($host,$user,$pwd, $dbname);
if ($link) 
{
	$sql = "UPDATE weixin_flag
        SET avatar = '{$avatar}',nickname='{$nickname}', fakeid='999', sex='{$sex}', flag=2,status = 2 WHERE openid='{$id}'";
	$relust=mysqli_query($link,$sql);
}
?>
</body>
</html>
