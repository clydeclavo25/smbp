$("#btnAddUser").on("click", function () {

	var data = {
		txtMyData : ""
	};

	$.post('forms/frm_add_user.php', data, function (response) { })
		.done(function (data) {
			$("#modalAddUser").modal("show");
			$("#modalAddUser").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to retrieve the data");
		});

})

$('#modalAddUser').on('hidden.bs.modal', function () {
    $("#modalAddUser").html("");
})


function change_status(id){
	var con = confirm("Activate/Deactivate this user?");
	if (con == true) {
		window.location='?change_status='+id;
	}
}


function editUser(id,access,username) {
 var data = {
		txtID : id,
		txtAccess : access,
		txtUsername : username
	};

	$.post('forms/frm_edit_user.php', data, function (response) { })
		.done(function (data) {
			$("#modalEditUser").modal("show");
			$("#modalEditUser").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to retrieve the data");
		});

}

function saveNewAccess() {
	var con = confirm("Save new access level?");
	if (con == true) {
		$("#btnSubmit").click();
	}
}


function deleteUser(id){
	var con = confirm("Are you sure you want to delete this user?");
	if (con == true) {
		window.location ='?delete='+id;
	}
}


