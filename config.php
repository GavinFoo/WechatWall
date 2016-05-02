<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);

@header("Content-type: text/html; charset=utf-8");

/*链接数据库*/
$dbname = "wall100";//数据库的名称

/*设置数据库信息*/
$host = "127.0.0.1";//数据库的服务器地址，一般无需更改
$port = "3306";//数据库的端口号
$user = "root";//数据库的用户名
$pwd = "65466007";//数据库的密码



/**
提示：
1.如果你有【已认证】的微信服务号，并且需要借用该服务号的授权信息，请填写该服务号的AppID
和AppSecret

2.以下信息可以不填写，默认借用我们微信号授权，对活动没有影响

**/


$AppID = "";
$AppSecret = "";




/**
微博授权提示：
1.如果你需要授权提示使用自己的应用名，请进入http://open.weibo.com/development/fenfu创建新的应用，

2.进入【应用信息】，编辑基本信息，在安全域名那里添加weibiaozhi.com

3.拷贝App Key和App Secret填入下方，为了避免密钥信息外泄，造成不必要的误会，建议活动后重置密钥

4.以下信息可以不填写，默认借用我们微信号授权，对活动没有影响
**/

$appkey = "";

$appsecret = "";
