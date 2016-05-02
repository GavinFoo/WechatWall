<?php
/**
 * 投票插件回复函数
 * 
 * **/
class vote_plug{
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
          public function vote_replay(){
              
              $from=$this->from;
            	//投票函数
			$reply = array(
					new NewsResponseItem('点击进入投票', '点击本模块进入投票！',Web_ROOT.'/vote/images/voteshow.jpg',Web_ROOT."/vote/index.php?wecha_id=$from"),
      		);
      		Wechat::$noendtail=0;
            return $reply;
          }
}

?>