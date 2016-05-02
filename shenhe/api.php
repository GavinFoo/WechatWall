<?php
header("Content-type: text/html; charset=utf-8");
include 'db.php';

$result = mysql_query("SELECT * FROM weixin_wall ORDER BY `id` DESC LIMIT 100");


echo "
<div class=\"container\">
";

while($row = mysql_fetch_array($result))
  {
  	$row['nickname']=pack('H*',$row['nickname']);
  	$row['content']=pack('H*',$row['content']);
  	
  echo "<div class=\"box\">";
  echo "<div class=\"content\">";
  echo "<p class=\"nickname\">From:" . $row['nickname'] . "</p>";
  echo "<p class=\"message\">Message:" . $row['content'] . "</p>";
  echo "</div>";
  echo "</div>";
  }
echo "</div>";

mysql_close($link);
?>