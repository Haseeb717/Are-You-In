$(document).ready(function(){
	// disable auto discover
	Dropzone.autoDiscover = false;

	// grap our upload form by its id
	$("#team-avatar").dropzone({
		// maximum number of files to upload
		// still get attached problem
		maxFiles: 1,
		// restrict image size to a maximum 1MB
		maxFilesize: 1,
		// changed the passed param to one accepted by
		// our rails app
		paramName: "team_avatar[avatar]",
		// show remove links on each image upload
		addRemoveLinks: true,
		// if the upload was successful
		success: function(file, response){
			// find the remove button link of the uploaded file and give it an id
			// based of the fileID response from the server
			$(file.previewTemplate).find('.dz-remove').attr('id', response.fileID);
			// add the dz-success class (the green tick sign)
			$(file.previewElement).addClass("dz-success");
		},
		//when the remove button is clicked
		removedfile: function(file){
			// grap the id of the uploaded file we set earlier
			var id = $(file.previewTemplate).find('.dz-remove').attr('id'); 
			$(".dz-preview").hide();

			// make a DELETE ajax request to delete the file
			$.ajax({
				type: "DELETE",
				url: "/team_avatars/" + id,
				success: function(data){

					$(".dz-preview").remove();
					console.log(data.message);
				}
			});
		}
	});	
});