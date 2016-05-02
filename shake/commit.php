<?php 

    
$point=$_GET['point'];

$wecha_id=$_GET['wecha_id'];

//实例化一个memcache对象
if(!empty($_SERVER['HTTP_APPNAME'])){
    @$mem=memcache_init();
} 
else if(class_exists("Memcache")){
		@$mem=new Memcache;
		@$mem->connect('localhost','11211');
}
if(!empty($mem)){
      hasmemcache($mem);
}else{
    hasmysql();
}

function hasmemcache($mem){
        global $wecha_id,$point;
    //从memcache服务器获取数据
    $data = $mem->get(realpath("..").$wecha_id);

        //判断memcache是否有数据
    if( !$data ){
       require ('db.php');
         include('../wall/biaoqing.php');
		 $sql="SELECT * FROM  `weixin_shake_toshake` WHERE wecha_id='$wecha_id'";
        $query1=mysql_query($sql,$link) or die(mysql_error());
		$q=mysql_fetch_assoc($query1);
		if($q){
            $q['phone']=pack('H*',$q['phone']);
            $q['phone']=emoji_unified_to_html(emoji_softbank_to_unified($q['phone']));
			$mem->set(realpath("..").$q['wecha_id'],$q, MEMCACHE_COMPRESSED, 3600);
		}
        
    }
        $data = $mem->get(realpath("..").$wecha_id);
   $start=realpath("..")."UPDATE  `weixin_wall_config` SET  `isopen` = ";
$key2 = substr(md5($start), 10, 8);
$ispen = $mem->get($key2);

if($data) {

        $data['point'] = $point;
        $mem->set(realpath("..").$wecha_id, $data, MEMCACHE_COMPRESSED, 3600);
}else{
    $ispen = 3;
    
}
if(empty($ispen)){
    $ispen = 1;
    
}
echo $ispen;
     $mem->close(); //关闭memcache连接
    
}
function hasmysql(){
    
    global $wecha_id,$point;
 require ('db.php');

 

$ispen=$xuanzezu[6];

if(mysql_num_rows(mysql_query("select `wecha_id` from `weixin_shake_toshake` where `wecha_id`='$wecha_id'"))>0) {

$sql_shake="UPDATE  `weixin_shake_toshake` SET  `point` =  '$point' WHERE `wecha_id` = '$wecha_id'";

} else {

	$ispen = 3;

}

mysql_query($sql_shake);

mysql_close($link);

echo "$ispen";
}

?>

