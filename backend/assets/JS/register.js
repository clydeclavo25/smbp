var TotalError = 0;
var LastNameError = 0;
var FirstNameError = 0;
var MiddleNameError = 0;
var UsernameError = 0;
var PasswordError = 0;
var AddressError = 0;
var EmailError = 0;
var MobileError = 0;

//CAPTURE INPUT CHANGES
$(":input[type='text'],#ConfirmPassword").on("input", function () {
	computeError();
})


// VALIDATE LAST NAME
$('input[name="txtLastName"]').on("input", function () {
	var alertThis = $("#LastNameAlert");
	validateName($(this) , $("#LastNameContainer"));
	if (validateName($(this) , $("#LastNameContainer"))) {
		LastNameError = 0;
		alertThis.html("");
		alertThis.removeClass("text-danger");
	} else {
		LastNameError = 1;
		alertThis.html("Invalid last name");
		alertThis.addClass("text-danger");
	}
	
})

// VALIDATE FIRST NAME
$('input[name="txtFirstName"]').on("input", function () {
	var alertThis = $("#FirstNameAlert");
	validateName($(this), $("#FirstNameContainer"));
	if (validateName($(this), $("#FirstNameContainer"))) {
		FirstNameError = 0;
		alertThis.html("");
		alertThis.removeClass("text-danger");
	} else {
		FirstNameError = 1;
		alertThis.html("Invalid first name");
		alertThis.addClass("text-danger");
	}
})

// VALIDATE MIDDLE NAME
$('input[name="txtMiddleName"]').on("input", function () {
	var alertThis = $("#MiddleNameAlert");
	validateMiddlename($(this),$("#MiddleNameContainer"));
	if (validateMiddlename($(this), $("#MiddleNameContainer"))) {
		MiddleNameError = 0;
		alertThis.html("");
		alertThis.removeClass("text-danger");
	} else {
		MiddleNameError = 1;
		alertThis.html("Invalid middle name");
		alertThis.addClass("text-danger");
	}
})


//VALIDATE USERNAME
$('input[name="txtUserName"]').on("input", function () {
	var username =$(this).val();
	$("#UserNameAlert").html("Checking...")
	setTimeout(function(){ 
		validateUsername(username, $("#UsernameContainer"),$("#UserNameAlert"));
	}, 2000);
})


//VALIDATE PASSWORD
$('input[name="txtConfirmPassword"]').on("input", function () {
	var password = $("#Password");
	var password2 = $(this).val();
	var alertThis = $("#PasswordAlert");
	validatePassword(password.val(),password2,$(".PasswordContainer"),alertThis);
	if (validatePassword(password.val(),password2,$(".PasswordContainer"),alertThis)) {
		
	} else {

	}
}) 


// VALIDATE ADDRESS
$('input[name="txtAddress"]').on("input", function () {
	var address = $(this).val();
	var alertThis = $("#AddressAlert");
	var container = $("#AddressContainer");
	validateAddress(address,container,alertThis);

})

// VALIDATE EMAIL
$('input[name="txtEmail"]').on("input" ,function () {
	var email =$(this).val();
	setTimeout(function(){ 
	validateEmail(email, $("#EmailContainer"),$("#EmailAlert"));
}, 500);
	
})

// VALIDATE MOBILE
$('input[name="txtMobileNo"]').on("input", function (e) {
	var mobile = $(this).val();
		validateMobile(mobile,$("#MobileContainer"),$("#MobileAlert"));

})


// BUTTON VALIDATE
$('#btnValidate').on("click", function() {
	if (TotalError == 0) {
		is_empty($("input[name='txtLastName']").val() , $("#LastNameContainer") , $("#LastNameAlert"));
		is_empty($("input[name='txtFirstName']").val() , $("#FirstNameContainer") , $("#FirstNameAlert"));
		is_empty($("input[name='txtUserName']").val() , $("#UsernameContainer") , $("#UsernameAlert"));
		is_empty($("input[name='txtPassword']").val() , $(".PasswordContainer") , $("#PasswordAlert"));
		is_empty($("input[name='txtConfirmPassword']").val() , $(".PasswordContainer") , $("#ConfirmPasswordAlert"));
		is_empty($("input[name='txtAddress']").val() , $("#AddressContainer") , $("#AddressAlert"));
		is_empty($("input[name='txtEmail']").val() , $("#EmailContainer") , $("#EmailAlert"));
		is_empty($("input[name='txtMobileNo']").val() , $("#MobileContainer") , $("#MobileAlert"));
	}

	if ( has_value($("input[name='txtLastName']").val()) && has_value($("input[name='txtFirstName']").val()) && has_value($("input[name='txtUserName']").val()) && has_value($("input[name='txtPassword']").val()) && has_value($("input[name='txtConfirmPassword']").val()) && has_value($("input[name='txtAddress']").val()) && has_value($("input[name='txtEmail']").val()) && has_value($("input[name='txtMobileNo']").val())) {
		$("#modalConfirmRegistration").modal("show")
	} else {

	}


	
	
})



////////////////////////////////////////////////////////////////////////////////////////
//FUNCTIONS STARTS HERE

function computeError() {
	TotalError = LastNameError + FirstNameError + MiddleNameError + UsernameError + PasswordError + AddressError + EmailError + MobileError;
	$("#errordisplay").html(TotalError);
	console.log("Fire!")
}

function validateName(a ,b){
	var value = a.val();
	var len = value.trim();
	var len = len.length;
	var check = value.match(/\d+/g);
	var format = /[!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/?]/;
	var withsymbol = format.test(value);

	if (check != null || withsymbol || !value || value == '' || len == 0 || value.length < 2) {
		b.addClass("has-error");
		return false;
	} else {
		b.removeClass("has-error");
		b.addClass("has-success");
		return true;
	}
}
// END VALIDATE NAME

function validateMiddlename(a,b){
	var value = a.val();
	var len = value.trim();
	var len = len.length;
	var check = value.match(/\d+/g);
	var format = /[!@#$%^&*()_+\=\[\]{};':"\\|,.<>\/?]/;
	var withsymbol = format.test(value);

	if (check != null || withsymbol) {
		b.addClass("has-error");
		return false;
	} else {
		b.removeClass("has-error");
		b.addClass("has-success");
		return true;
	}
}
// END VALIDATE MIDDLE NAME



function validateUsername(a,b,c){
	console.log(a)
	var value = a;
	var len = value.trim();
	var len = len.length;
	var data = {
		txtUserName : a
	}
	if (!value || value == '' || len == 0 || value.length < 2) {
		b.addClass("has-error");
		c.addClass("text-danger");
		c.html("<i class='fa fa-times'></i> Invalid username")
		UsernameError = 1;
		computeError();
	} else {
	$.post ('controllers/act_check_duplicate_username.php' , data , function (response) { } )	

		.done(function (data) {
			withError = Number(data);
			if (withError > 0) {
				b.addClass("has-error");
				c.addClass("text-danger");
				c.html("<i class='fa fa-times'></i> Username already exists")
				UsernameError = 1;
				computeError();
				} else {
					b.removeClass("has-error");
					b.addClass("has-success");
					c.addClass("text-success");
					c.removeClass("text-danger")
					c.html("<i class='fa fa-check'></i> Username available")
				UsernameError = 0;
				computeError();
				}
		})
	}
}
// END VALIDATE USERNAME

function validatePassword (a,b,c,d) {
	console.log(a);
	console.log(b);
	if (a != b) {
			d.html("<i class='fa fa-times'></i> Passwords do not match");
			d.addClass("text-danger");
			c.addClass("has-error");
			PasswordError = 1;
			computeError();
	} else {
		d.html("<i class='fa fa-check'></i> Passwords match");
		d.removeClass("text-danger");
		d.addClass("text-success");
		c.addClass("has-success");
		c.removeClass("has-error");
		$("#ConfirmPasswordAlert").html("");
		PasswordError = 0;
		computeError();
	}

}
// END VALIDATE PASSWORD


function validateAddress(a,b,c) {
	var len = a.length;

	if (len < 5) {
			b.addClass("has-error");
			c.addClass("text-danger");
			c.html("<i class='fa fa-times'></i> Invalid Address")
			AddressError = 1;
			computeError();
	} else {
			b.removeClass("has-error");
			b.addClass("has-success");
			c.html("");
			AddressError = 0;
			computeError();
	}
}
// END VALIDATE ADDRESS


function validateEmail(a,b,c){
	
	console.log(a)
	var value = a;
	var len = value.trim();
	var len = len.length;
	var isvalid = "";
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
	if (value.match(mailformat)) {
		isvalid = true
	} else {
		isvalid = false
	}

	var data = {
		txtEmail : a
	}

	if (!value || value == '' || len == 0 || value.length < 2 || !isvalid) {
		b.addClass("has-error");
		c.addClass("text-danger");
		c.html("<i class='fa fa-times'></i> Invalid Email")
		EmailError = 1;
		computeError();
	} else {
	$.post ('controllers/act_check_duplicate_email.php' , data , function (response) { } )	

		.done(function (data) {
			withError = Number(data);
			if (withError > 0) {
				b.addClass("has-error");
				c.addClass("text-danger");
				c.html("<i class='fa fa-times'></i> Email already exists")
				EmailError = 1;
				computeError();
				} else {
					b.removeClass("has-error");
					b.addClass("has-success");
					c.addClass("text-success");
					c.removeClass("text-danger")
					c.html("<i class='fa fa-check'></i> Email available")
				EmailError = 0;
				computeError();
				}
		})
	}
}
// END VALIDATE EMAIL

function validateMobile(a,b,c) {
	var len = a.length;
	var numbers = /^[0-9]+$/;  


	if (len < 11 || !a.match(numbers)) {
			b.addClass("has-error");
			c.addClass("text-danger");
			c.html("<i class='fa fa-times'></i> Invalid Mobile number")
			AddressError = 1;
			computeError();
	} else {
			b.removeClass("has-error");
			b.addClass("has-success");
			c.html("");
			AddressError = 0;
			computeError();
	}
}
// END VALIDATE MOBILE


function is_empty(a,b,c){
	if (!a || a === "") {
		b.addClass("has-error");
		c.html("This field is required!");
		c.addClass("text-danger");
	} else {
		return false
	}
}

function has_value(a) {
	if (a === ""){
		return false
	} else {
		return true
	}
}