$(document).ready(function(){
	// disable auto discover
	Dropzone.autoDiscover = false;
	applyDropZoneToTeamAvatars();

	$(document.body).on("click", ".remove-team-avatar", function () {
		id = $(this).attr("id");
		// make a DELETE ajax request to delete the file
		$.ajax({
			type: "DELETE",
			url: "/team_avatars/" + id,
			success: function(data) {
				// console.log(data.message);

				// refresh dropdown space
				$(".display-team-avatar").siblings("h4").remove();
				$(".display-team-avatar").replaceWith(data.design);
				applyDropZoneToTeamAvatars();
			}
		});
	});

	function applyDropZoneToTeamAvatars() {
		$(".team-avatar").each(function() {
			// no need to attach if already exists
			if ($(this).hasClass("dz-clickable"))
				return;

			// grap our upload form by its id
			$(this).dropzone({
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
						success: function(data) {

							$(".dz-preview").remove();
							console.log(data.message);
						}
					});
				},
				addedfile: function(file) {
					$(".team-update",$(this.element).parent().siblings()).attr("disabled", "disabled");
					var _this = this;
			        file.previewElement = Dropzone.createElement(this.options.previewTemplate);
			        file.previewTemplate = file.previewElement;
			        this.previewsContainer.appendChild(file.previewElement);
			        file.previewElement.querySelector("[data-dz-name]").textContent = file.name;
			        file.previewElement.querySelector("[data-dz-size]").innerHTML = this.filesize(file.size);
			        if (this.options.addRemoveLinks) {
				        file._removeLink = Dropzone.createElement("<a class=\"dz-remove\" href=\"javascript:undefined;\">" + this.options.dictRemoveFile + "</a>");
				        file._removeLink.addEventListener("click", function(e) {
				            e.preventDefault();
				            e.stopPropagation();
				            if (file.status === Dropzone.UPLOADING) {
				              return Dropzone.confirm(_this.options.dictCancelUploadConfirmation, function() {
				                return _this.removeFile(file);
				              });
				            } 
				            else {
				              if (_this.options.dictRemoveFileConfirmation) {
				                return Dropzone.confirm(_this.options.dictRemoveFileConfirmation, function() {
				                  return _this.removeFile(file);
				                });
				              } else {
				                return _this.removeFile(file);
				              }
				            }
				        });
				        file.previewElement.appendChild(file._removeLink);
			        }
			        return this._updateMaxFilesReachedClass();
		      	},
		      	uploadprogress: function(file, progress, bytesSent) {
		      		return file.previewElement.querySelector("[data-dz-uploadprogress]").style.width = "" + progress + "%";
      			},
      			complete: function(file) {
      				$(".team-update",$(this.element).parent().siblings()).removeAttr("disabled");
      				if (file._removeLink) {
          				return file._removeLink.textContent = this.options.dictRemoveFile;
        			}
      			}
			});
		});
	}

	window.applyDropZoneToTeamAvatars = applyDropZoneToTeamAvatars;
});