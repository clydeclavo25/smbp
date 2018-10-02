function delete_registration(id) {
	var con = confirm("Are you sure you want to delete this record?");
	if (con == true) {
		window.location = '?delete='+id;
	}
}


function confirm_registration(id) {
	var con = confirm("Are you sure about the confirmation of this registration?");
	if (con == true) {
		window.location = '?confirm='+id;
	}
}