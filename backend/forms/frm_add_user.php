
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            Add User
        </h4>

      </div>
      <div class="modal-body">
       <form name="frm_upload_form" action="controllers/act_save_user.php" enctype="multipart/form-data" method="post" >
          <div class="row myrow">
        <div class="col-lg-12">
          <div class="col-lg-4">
            <div class="form-group" id="LastNameContainer">
              <label for="LastName">Last Name</label> <small class="pull-right form-alert" id="LastNameAlert"></small>
              <input type="text" class="form-control" id="LastName" name="txtLastName" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="FirstNameContainer">
              <label for="FirstName">First Name</label> <small class="pull-right form-alert" id="FirstNameAlert"></small>
              <input type="text" class="form-control" id="FirstName" name="txtFirstName" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="MiddleNameContainer">
              <label for="MiddleName">Middle Name</label> <small class="pull-right form-alert" id="MiddleNameAlert"></small>
              <input type="text" class="form-control" id="MiddleName" name="txtMiddleName" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="UsernameContainer">
              <label for="UserName">Username </label> <small class="pull-right form-alert" id="UserNameAlert"></small>
              <input type="text" class="form-control" id="UserName" name="txtUserName" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group PasswordContainer">
              <label for="Password">Password</label> <small class="pull-right form-alert" id="PasswordAlert"></small>
              <input type="password" class="form-control" id="Password" name="txtPassword" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group PasswordContainer">
              <label for="ConfirmPassword">Confirm Password</label><small class="pull-right form-alert" id="ConfirmPasswordAlert"></small>
              <input type="password" class="form-control" id="ConfirmPassword" name="txtConfirmPassword" placeholder="">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group" id="AddressContainer">
              <label for="Address">Address</label> <small class="pull-right form-alert" id="AddressAlert"></small>
              <input type="text" class="form-control" id="Address" name="txtAddress" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="EmailContainer">
              <label for="Email">Email</label> <small class="pull-right form-alert" id="EmailAlert"></small>
              <input type="email" class="form-control" id="Email" name="txtEmail" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="MobileContainer">
              <label for="Mobile">Mobile</label> <small class="pull-right form-alert" id="MobileAlert"></small>
                <input type="text" class="form-control" id="Mobile" name="txtMobileNo" placeholder="" value="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="AccessContainer">
              <label>Access</label> <small class="pull-right form-alert" id="AccessAlert"></small>
                <select class="form-control" name="slcAccess">
                  <option value="1">Admin</option>
                  <option value="2">Staff</option>
                </select>
            </div>
          </div>
        </div>
          </div>
          <input type="submit" hidden="" value="SUBMIT" name="btnSubmit" id="btnSubmit">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnValidate" ><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>



  <script>
    // REGISTRATION VALIDATION
////////////////////////
//////////////////
///////////////////

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


// // VALIDATE ACCESS

// $('input[name="slcAccess"]').on("change", function (e) {
//   var mobile = $(this).val();
//     validateAccess(mobile,$("#AccessContainer"),$("#AccessAlert"));

// })


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
    // is_empty($("input[name='slcAccess']").val() , $("#AccessContainer") , $("#AccessAlert"));
  }

  if ( has_value($("input[name='txtLastName']").val()) && has_value($("input[name='txtFirstName']").val()) && has_value($("input[name='txtUserName']").val()) && has_value($("input[name='txtPassword']").val()) && has_value($("input[name='txtConfirmPassword']").val()) && has_value($("input[name='txtAddress']").val()) && has_value($("input[name='txtEmail']").val()) && has_value($("input[name='txtMobileNo']").val())) {
    var con = confirm("Save this user?");
    if (con == true) {
      $("#btnSubmit").click();
    }
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


// function validateAccess(a,b,c) {
//   var len = a.val();

// if(len) {
//       b.removeClass("has-error");
//       b.addClass("has-success");
//       c.html("");
//       AccessError = 0;
//       computeError();
//   }
// }


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

// END OF REGISTRATION VALIDATION
//////////////////////
//////////////////
/////////////////
//////////////////

  </script>