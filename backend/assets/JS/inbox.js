function read_message(id) {

	$.get('forms/frm_read_message.php?id='+id, function (response) { })
		.done(function (data) {
			$("#modalReadMessage").modal("show");
			$("#modalReadMessage").html(data);
		})
		.fail(function () {
			alert("There seems to be an error trying to process your request");
		});
}


$('#modalReadMessage').on('hidden.bs.modal', function () {
   location.reload();
})