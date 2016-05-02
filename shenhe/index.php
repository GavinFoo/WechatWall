<html>
<head>
  <meta charset="UTF-8">
  <title>审核</title>
  <meta name="viewport" content="width=device-width,initial-scale = 1.0,minimum-scale = 1.0,maximum-scale = 1.0,user-scalable = no">
  <link rel="stylesheet" type="text/css" href="css/waterfall.css">
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/shenhe.js"></script>
  <style type="text/css">
  img{width:220px;}
  body{background-color:#BFEFFF;}
  </style>
</head>
<body>
<?php

include 'db.php';
mysqli_query($link,'SET names UTF8');
$sql = "SELECT * FROM `weixin_wall` WHERE `num`= -1 ORDER BY `id` DESC";
$result = mysqli_query($link,$sql);
//var_dump($result);

echo "
<div class=\"container\">
";

while($row = mysqli_fetch_array($result))
  {
    $id = $row['id'];
    $row['nickname']=pack('H*',$row['nickname']);
    if ($row['content'] == "此消息为图片！") {
         //图片消息不转16进
        $imgurl = $row['image'];
        $row['content'] = "<p>Image</p><img src=\"$imgurl\">";
       }
    else {
        $row['content']=pack('H*',$row['content']);
       }   

  echo "<div class=\"box\">";
  echo "<div class=\"content\">";
  echo "<span>From:</span><span class=\"nickname\">" . $row['nickname'] . "</span>";
  echo "<br><span>Message:</span><span id=\"$id\"class=\"message\">" . $row['content'] . "</span>";
  echo "</div>";
  echo "</div>";
  }
echo "</div>";

mysql_close();
?>
</body>
</html>
