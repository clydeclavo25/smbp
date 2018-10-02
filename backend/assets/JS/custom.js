$(document).ready(function(){
	$("#nav-maintenance").addClass("menu-open");
	$("#nav-maintenance>ul").css("display","block");
	$(".DataTable").DataTable({
		 "pageLength": 50,
		 "aaSorting": []
	});
	$(".modal").on("hidden.bs.modal", function () { 
   tinymce.EditorManager.execCommand('mceRemoveEditor' , true, 'txtContent');
   $(".modal").html("");
		}) 

	toastr.options = {
"closeButton": true,
"timeOut": "5000",
"positionClass": "toast-top-right"
}
})
// READY FUNCTIONS


function edit_profile(id) {
   
   var data = {
		txtID : id
	};


	$.post('forms/frm_edit_profile.php', data, function (response) { })
		.done(function (data) {
			$("#modalEditProfile").modal("show");
			$("#modalEditProfile").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to retrieve the data");
		});


	
}


function change_password (id) {
	var data = {
		txtID : id
	} 

	$.post('forms/frm_change_pass.php', data, function (response) { })
		.done(function (data) {
			$("#modalChangePass").modal("show");
			$("#modalChangePass").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to retrieve the data");
		});


}