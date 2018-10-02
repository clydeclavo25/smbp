
$('#modalUploadForm').on('hidden.bs.modal', function () {
    $("#modalUploadForm").html("");
})

$("#btnNewUpload").on("click", function () {

	var data = {
		txtMyData : ""
	};


	$.post('forms/frm_upload_form.php', data, function (response) { })
		.done(function (data) {
			$("#modalUploadForm").modal("show");
			$("#modalUploadForm").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to retrieve the data");
		});


	

})


function uploadForm(){
	var con = confirm("Upload file now?");
	if (con == true) {
		$("#btnSubmit").click();
	}
}

function deletefile(id){
	var con = confirm("Are you sure you want to delete the file completely? This cannot be undone");
	if (con == true) {
		alert("File deleted succesfully");
		window.location="?delete="+id;
	}
}
