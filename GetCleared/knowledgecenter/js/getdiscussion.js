(function(){
	var dicussion_tabName = document.getElementById("dicussion_tabName").value;
	//console.log(dicussion_tabName);
	$.ajax({
		type:'POST',
		url:'../knowledgecenter/getdiscussion.php?dicussion_tabName='+dicussion_tabName,
		success: function(result){
			//console.log(result);
			$("#discussion_panel").html(result);
		},
		error: function(error){
			console.log(error.responseText);
		}
	});


})();

function loadMore(){
	document.getElementById("loader_data").classList.remove("d-none");
	document.getElementById("discussion_panel").classList.add("d-none");
	var dicussion_tabName = document.getElementById("dicussion_tabName").value;
	//console.log(dicussion_tabName);

	$.ajax({
		type:'POST',
		url:'../knowledgecenter/getdiscussion.php?dicussion_tabName='+dicussion_tabName,
		success: function(result){
			//console.log(result);
			$("#discussion_panel").html(result);
			document.getElementById("loader_data").classList.add("d-none");
			document.getElementById("discussion_panel").classList.remove("d-none");

		},
		error: function(error){
			console.log(error.responseText);
		}
	});
}