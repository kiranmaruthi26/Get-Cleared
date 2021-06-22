 $(document).ready(function(){
			//var form = $('#discussion_form');
	$('#dis_sub').click(function(event){
		event.preventDefault();
		var discussion = $("#discussion").val().trim();
		var topic_id = $("#topic_id").val();
		var dicussion_tabName = $("#dicussion_tabName").val();
		if(discussion == ""){
			discussion_area = document.getElementById("discussion");
			discussion_area.focus();
			discussion_area.style.border = "1px solid red";
			document.getElementById("error1").classList.remove("d-none");

		}else{
			document.getElementById("error1").classList.add("d-none");
			document.getElementById("loader_send").classList.remove("d-none");
			document.getElementById("discussion_form").classList.add("d-none");
			$.ajax({

				type: 'POST',
				url:'../knowledgecenter/discussion_store.php',
				//data: { topic_id:topic_id, dicussion_tabName:dicussion_tabName, discussion:discussion },
				data: $("#discussion_form").serialize(),
				dataType:'json',

				success: function(result) {
					console.log(result);
						document.getElementById("discussion").value='';
						document.getElementById("discussion").style.border = "1px solid black";
						document.getElementById("loader_send").classList.add("d-none");
						document.getElementById("success").classList.remove("d-none");
						setTimeout(function(){
							document.getElementById("success").classList.add("d-none");
							document.getElementById("discussion_form").classList.remove("d-none");
						},5000);
						console.log("data sent succfully");
				},
				error: function(error){
					responseText = error.responseText;
					console.log(responseText);
				}
			});
		}
	});
});