<?php
$file = fopen('./headimg/test.png','w');
var_dump($file);
$headurl = 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEKFak1p1AYxt5PwoW23EtuAq7ZgH3EhKKG3YkDDxPg42tJ4wpvcdjcHZlts8Szq1INvBQnf5ibH1jw/132';
$img=file_get_contents($headurl);
file_put_contents('./headimg/test.png', $img);
