
$(document).ready(function(){
	
	$(".addtofav").click(function(e){
		var favObj = $(this);
		var type = $(this).attr("data-type");
		var id = $(this).attr("data-id");
		var oldHtml = favObj.html();
		favObj.html("Saving...");
		$.ajax({
		method: "POST",
		url: tofav,
		dataType:'JSON',
		data: { post_id:id,post_type:type}
		}).done(function( msg ) {
			if(type=="user"){
				if(msg.msg=="added"){
					favObj.html("Following");
				}else if(msg.msg=="removed"){
					favObj.html("Follow");
				}
			}else{
				if(msg.msg=="added"){
					favObj.addClass("pfollow");
				}else if(msg.msg=="removed"){
					favObj.removeClass("pfollow");
				}
				favObj.html(oldHtml);
			}
		});
		    e.preventDefault();

	});


	$('#file').change(function(){

		$(this).simpleUpload(fileupload, {

			start: function(file){
				//upload started
			},
			progress: function(progress){
				//received progress
			},
			success: function(data){
				//upload successful
				var data = JSON.parse(data);
				$("#userpic").attr("src",data.path);
				$("#userimage").val(data.path);

			},
			error: function(error){
				//upload failed
			}

		});
	});

	$(".addmeta").click(function(){
		var metaObj = $(this);
		var metakey = $(this).attr("data-type");
		var metavalue = $(this).attr("data-id");
		var oldHtml = favObj.html();
		favObj.html("Saving...");
		$.ajax({
		method: "POST",
		url: tofav,
		dataType:'JSON',
		data: { post_id:id,post_type:type}
		}).done(function( msg ) {
			if(type=="user"){
				if(msg.msg=="added"){
					favObj.html("Following");
				}else if(msg.msg=="removed"){
					favObj.html("Follow");
				}
			}else{
				if(msg.msg=="added"){
					favObj.addClass("pfollow");
				}else if(msg.msg=="removed"){
					favObj.removeClass("pfollow");
				}
				favObj.html(oldHtml);
			}
		});
		    e.preventDefault();
	})

});