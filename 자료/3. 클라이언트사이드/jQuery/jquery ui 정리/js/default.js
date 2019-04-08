$().ready (function (){
	//A Link Move Start
	$("a").click(function(){
		var FileName = $(this).html();
		url = "./source/"+FileName+".html";
		$.ajax({
			url : url,
			type : 'post',
			async : false,
			success : function(data){
				$("#right_content").html(data);
			},
			error : function(err){
				$("#right_content").html("Not Found "+url);
			}
		});
		event.preventDefault();
	});
});