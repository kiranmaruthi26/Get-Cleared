$(document).ready(function () {
	$('#upload_Profile').click(function(event) {
		event.preventDefault();
		let formData = new FormData();
		let id = $('#id').val();
		let file = $("#uploadImage")[0].files[0];
		console.log(file);
		if(file == undefined){
			$("#uploadImage").css('border','2px solid red');
		}else{
			$("#uploadImage").css('border','2px solid #ced4da');
			
			formData.append('id',id);
			formData.append('file',file);

			$("#progress").removeClass("d-none");
			//$("#progress").addClass("d-block");
			$("#upload_profile").addClass("d-none");
			console.log(id);

			$.ajax({

				type: 'POST',
				url:'../profile/uploadProfile.php',
				xhr: function() {
			     	var xhr = new window.XMLHttpRequest();
			        xhr.upload.addEventListener("progress", function(evt) {
			            	if (evt.lengthComputable) {
				                var percentComplete = ((evt.loaded / evt.total) * 100).toFixed(2);
				                // Place upload progress bar visibility code here
				                $("#progress_bar").css('width',percentComplete+"%");
				                document.getElementById("progress_percentage").innerHTML = "Status completed: "+percentComplete+"%";
				                //console.log(percentComplete);
				                //console.log(evt);
			            }
			        }, false);
			        $("#loader_send").removeClass("d-none");
			        return xhr;
			    },
				
				data:formData,
				contentType: false,
				processData:false,
				success:function(result){
					$("#upload_profile").val('');
					console.log(result);
					//console.log(result);
					//$("#progress").removeClass("d-block");
					//$("#modal_body").html(result);
					$("#loader_send").addClass("d-none");
					$("#success").removeClass("d-none");
					$('#upload_Profile').addClass('d-none');
					loadProfile();
				},
				error: function(result){
					console.log(result);
					$("#modal_body").html(result.responseText);
					$("#progress").addClass("d-none");
					$("#loader_send").addClass("d-none");
					$("#modal_body").removeClass("d-none");
					$("#modal_body").html("<p>Error occured while we are establishing connection...<br/>Please try agian !</p>").css('color','red');
					setTimeout(function(){
							$("#modal_body").addClass("d-none");
							$("#upload_material").removeClass("d-none");
						},3000);
				}
			});
		}
		
	});


});
