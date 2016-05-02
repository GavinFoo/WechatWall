<?/* 连主库 */
@header("Content-type: text/html; charset=utf-8");

/*链接数据库*/
$dbname = "wall100";//数据库的名称

/*设置数据库信息*/
$host = "127.0.0.1";//数据库的服务器地址，一般无需更改
$port = "3306";//数据库的端口号
$user = "root";//数据库的用户名
$pwd = "65466007";//数据库的密码

$link = mysqli_connect($host,$user,$pwd, $dbname);

if ($link) {
    # code...
}