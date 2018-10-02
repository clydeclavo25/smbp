$("#btnNewAnnouncement").on("click", function(){

	$.post('forms/frm_new_announcement.php', function (response) { })
		.done(function (data) {
			$("#modalNewAnnouncement").modal("show");
			$("#modalNewAnnouncement").html(data);
			tinymce.init({
			  selector: "textarea.textarea",
			  menubar:false,
			  statusbar: false,
			  debug : false,
			  entity_encoding : "raw",
			  skin:'lightgray',
			  height : 200,
			  force_br_newlines : true,
			  force_p_newlines : false,
			  forced_root_block : '',
			  plugins : "paste",
			  theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
			  paste_auto_cleanup_on_paste : true,
			  paste_postprocess : function(pl, o) {
			  // Content DOM node containing the DOM structure of the clipboard
			  o.node.innerHTML = o.node.innerHTML;
			  },
			  setup : function(ed)
			    {
			      ed.on('init', function(){
			        this.getDoc().body.style.fontSize = '12px';
			      });
			    }
			});
		})
		.fail(function () {
			alert("There seems to be an error trying to process your request");
		});

})


function save_announcement(){
	var title = $("#txtTitle").val();
	var content = tinymce.get('txtContent').getContent();
	content = content.replace("<br />", ' ');
	var len1 = title.trim();
	var len2 = content.trim();

 console.log(len2);


  if (len1 == 0 || len2 == 0) {
		$("#error-msg").html("Please complete all fields");
	} else {
		var con = confirm("Are you sure you want to save this announcement?");
		if (con == true) {
			$("#btnSubmit").click();
		}
	}

}


function editAnnouncement(id) {

		$.get('forms/frm_new_announcement.php?id='+id, function (response) { })
		.done(function (data) {
			$("#modalNewAnnouncement").modal("show");
			$("#modalNewAnnouncement").html(data);
					tinymce.init({
					  selector: "textarea.textarea",
					  menubar:false,
					  statusbar: false,
					  debug : false,
					  entity_encoding : "raw",
					  skin:'lightgray',
					  height : 200,
					  force_br_newlines : true,
					  force_p_newlines : false,
					  forced_root_block : '',
					  plugins : "paste",
					  theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
					  paste_auto_cleanup_on_paste : true,
					  paste_postprocess : function(pl, o) {
					  // Content DOM node containing the DOM structure of the clipboard
					  o.node.innerHTML = o.node.innerHTML;
					  },
					  setup : function(ed)
					    {
					      ed.on('init', function(){
					        this.getDoc().body.style.fontSize = '12px';
					      });
					    }
					});
		})
		.fail(function () {
			alert("There seems to be an error trying to process your request");
		});
}




function deleteAnnouncement(id) {
	var con = confirm("Are you sure you want to delete this announcement?");
	if (con == true) {
		window.location="?delete="+id;
	}
}


function change_posting(id) {
	var data = {
		txtID : id
	};
	if (confirm("Post/Unpost this announcement?")==true) {

	$.post('controllers/act_post_unpost_announcement.php' , data , function(response){})
	.done(function(){
		location.reload();
	})
	.fail(function(){
		alert("There seems to be an error trying to process your request");
	})
	}

}