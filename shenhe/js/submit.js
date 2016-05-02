$(document)
.ready(function()
	{
	//alert('到这里为止运行成功!');
	$('#a-btn1')
	.click(
			function()//a标签按钮的函数
			{
			//alert($("#nickname").val());
			var nickname = $("#nickname1").val();
			var toname = $("#toname1").val();
			var content = $("#content1").val();
			submibAform(nickname,toname,content);
			}
		  );
	$('#a-btn2')
	.click(
			function()//a标签按钮的函数
			{
			//alert($("#nickname").val());
			var nickname = $("#nickname2").val();
			var toname = $("#toname2").val();
			var content = $("#content2").val();
			submibAform(nickname,toname,content);
			}
		  );

	}
	  );
function submibAform(nickname,toname,content)
{	$.post
	("server.php",
	  {
	    nickname:nickname,
	    toname:toname,
	    content:content
	  },
	  function(data,status)
	  {
	  	if (status==="success") 
  		{
		alert("与服务器通信:"+status+"\n提交结果:"+data);
	   	document.getElementById("forRoomMate").reset();
	   	document.getElementById("forOneSelf").reset();
		}
	  	else
  		{alert("夭寿啦!提交失败");}
	  }
	);
}