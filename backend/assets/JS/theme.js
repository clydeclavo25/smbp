$("#btnNewTheme").on("click", function(){

	$.post('forms/frm_new_theme.php', function (response) { })
		.done(function (data) {
			$("#modalNewTheme").modal("show");
			$("#modalNewTheme").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to process your request");
		});

})


function editTheme(id) {

	$.get('forms/frm_new_theme.php?id='+id, function (response) { })
		.done(function (data) {
			$("#modalNewTheme").modal("show");
			$("#modalNewTheme").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to process your request");
		});
}


function saveTheme(){
	var title = $("#txtTitle").val();
	var desc = $("#txtDescription").val();
	var len1 = title.trim();
	var len2 = desc.trim();

	if (len1 == 0 || len2 == 0) {
		$("#error-msg").html("Please complete all fields");
	} else {
		var con = confirm("Are you sure you want to save this theme?");
	if (con == true) {
		$("#btnSubmit").click();
	}
	}

}


function post_unpost(id) {
	var data = {
		txtID : id
	};
	if (confirm("Post this theme?")==true) {

	$.post('controllers/act_post_unpost_theme.php' , data , function(response){})
	.done(function(){
		location.reload();
	})
	.fail(function(){
		alert("There seems to be an error trying to process your request");
	})
	}

}


function deleteTheme(id) {
	var con = confirm("Are you sure you want to delete this theme?");
	if (con == true) {
		window.location="?delete="+id;
	}
}