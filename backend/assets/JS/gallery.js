$(document).ready(function() {
    $("#input-44").fileinput({
        uploadUrl: 'controllers/upload_images.php',
        maxFilePreviewSize: 10240,
        allowedFileExtensions: ["jpg", "jpeg", "gif", "png"],
        elErrorContainer: "#errorBlock",
        uploadExtraData: {
        	album_id: localStorage.getItem("album_id")
        },
        maxFileSize: 2048
 });

    $('#input-44').on('fileuploaderror', function(event, data, msg) {
		    var form = data.form, files = data.files, extra = data.extra,
			        response = data.response, reader = data.reader;
			   console.log('File upload error');
			   // get message
			   console.log(msg);
			});

	$('#input-44').on('filebatchuploadcomplete', function(event, files, extra) {
		    console.log('File batch upload complete'); 
		    console.log($("#txtAlbumName").val());
		    console.log($("#txtDescription").val());
		    alert("Upload successful"),
		    $.ajax({
		    	url: 'controllers/act_save_album.php',
		    	method: 'POST',
		    	data: {
		    		album_id: localStorage.getItem("album_id"),
		    		album_name: $("#txtAlbumName").val(),
		    		description: $("#txtDescription").val()
		    	},
		     success: function() {
		    			// window.location = 'gallery.php';
		    		} 	
		    })
		 
    });

});



function view_album(id){
	$.ajax({
		    	url: 'forms/frm_view_album.php?id='+id,
		    	method: 'GET',
		     success: function(data) {
		    			$("#modalViewAlbum").modal("show");
							$("#modalViewAlbum").html(data);
		    		} 	
		    })
}


function delete_image(id,album_id) {
	var con = confirm("Delete this image?");
	if (con == true) {
		$.ajax({
			url: 'controllers/act_delete_image.php?id='+id,
			success: function(){
				view_album(album_id);
			}
		})
	}
}


function save_album_changes(id) {
	var con = confirm("Save changes to this album?");
	if (con == true) {
		$.ajax({
			url: 'controllers/act_save_changes_album.php?id='+id,
			method: 'post',
			data: {
				txtName: $("#txtAlbumName").val(),
				txtDesc: $("#txtDescription").val()
			},
			success: function(){
				alert("Changes saved!")
				location.reload();
			}
		})
	}
}

function delete_album(id) {
	var con = confirm("Are you sure you want to delete this album?");
	if (con == true) {
		$.ajax({
			url: 'controllers/act_delete_album.php?id='+id,
			success: function(){
				alert("Album deleted!")
				location.reload();
			}
		})
	}
}