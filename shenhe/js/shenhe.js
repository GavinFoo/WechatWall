$(document)
.ready(
	function(){
		$("#wall").load("api.php");
		
		$(".message")
		.click(
			function()
			{
				if (confirm("确认上墙？？")) 
					{
						var id = $(this).attr('id');
						$.post(
						"server.php", 
						{content:id}, 
						function(data,status)
						{
						if (status==="success") 
				  			{
							alert("status:"+status+"\result:"+data);
							}
						  	else
					  		{alert("failed");}
						}
							);
					} 
				
			else
			{};
				
			}
			);
	}
	);