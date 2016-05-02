<?php
/**
 * 摇一摇插件回复函数
 * 
 * **/
class shake_plug{
         protected $xuanzezu;
        protected $check;
        protected $from;
        protected $touser;
          public function __construct($xuanzezu,$check,$request) {

              $this->xuanzezu=$xuanzezu;
              $this->check=$check;
              $this->from=$request['fromusername'];
              $this->touser=$request['tousername'];
          }
          public function shake_replay(){
              $from=$this->from;
              		include('function.php');
			$isluru =lurushake($this->from);
			if($isluru != 1){
			$reply = array(
					new NewsResponseItem('点击进入摇一摇', '进入摇一摇后等待游戏开始，主持人点击开始游戏，倒计时后用您吃奶的劲尽情狂欢吧！', Web_ROOT."/shake/images/shakeshow.jpg",Web_ROOT."/shake/mobile/index.php?wecha_id={$from}"),
			);
	            Wechat::$noendtail=0;
	            return $reply;
			}

          }
}

?>