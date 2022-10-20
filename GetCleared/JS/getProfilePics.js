$(document).ready(function () {

	let domain = "https://getcleared.in/profile/";
	//let domain = "http://localhost/GetCleared/profile/";
	$.ajax({
		type:'post',
		url:domain+'getProfile.php',
		success: function(result){
			if(result!="0"){
				console.log(result+"main");
				$('#profile_photo').attr('src',result);
				$('#profile_icon').attr('src',result);
				$('#profile_photo_main').attr('src',result);
			}
			else{
				$('#Profile_photo').attr('src',domain+'photos/profile-dummy.png');
				$('#profile_icon').attr('src',domain+'photos/profile-dummy.png');
				$('#profile_photo_main').attr('src',domain+'photos/profile-dummy.png');
			}
		},
		error: function(error){
			console.log(error.responseText);
		}
	});


});


function loadProfile(){
	let domain = "https://getcleared.in/profile/";
	//let domain = "http://localhost/GetCleared/profile/";
	$.ajax({
		type:'post',
		url:domain+'getProfile.php',
		success: function(result){
			if(result!="0"){
				console.log(result);
				$('#profile_photo').attr('src',result);
				$('#profile_icon').attr('src',result);
				$('#profile_photo_main').attr('src',result);
			}
			else{
				$('#profile_photo').attr('src',domain+'photos/profile-dummy.png');
				$('#profile_icon').attr('src',domain+'photos/profile-dummy.png');
				$('#profile_photo_main').attr('src',domain+'photos/profile-dummy.png');
			}
		},
		error: function(error){
			console.log(error.responseText);
		}
	});
}