<?php 
  require_once('../com/config.php');
  require_once('../com/class_profile.php');

  $profile = new Profile;
  $get_profile = $profile->get_profile_by_id($_POST['txtID']);

 ?>

  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
            Edit Profile
        </h4>
     

      </div>
      <div class="modal-body">
        <center>
          <div class="overlay" id="loadingSpinner" style="display: none">
            <i class="fa fa-refresh fa-spin"></i>&emsp;Saving. . .
          </div> 
        </center>
       <form name="frm_edit_profile" id="frm_edit_profile" action="" enctype="multipart/form-data" method="post" >
        <input type="hidden" value="<?php echo $_POST['txtID'] ?>" id="txtID" name="">
        <div class="row myrow">
        <div class="col-lg-12">
          <div class="col-lg-4">
            <div class="form-group" id="LastNameContainer">
              <label for="LastName">Last Name</label> <small class="pull-right form-alert" id="LastNameAlert"></small>
              <input value="<?php echo $get_profile['last_name']; ?>" type="text" class="form-control" id="LastName" name="txtLastName">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="FirstNameContainer">
              <label for="FirstName">First Name</label> <small class="pull-right form-alert" id="FirstNameAlert"></small>
              <input value="<?php echo $get_profile['first_name']; ?>" type="text" class="form-control" id="FirstName" name="txtFirstName" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="MiddleNameContainer">
              <label for="MiddleName">Middle Name</label> <small class="pull-right form-alert" id="MiddleNameAlert"></small>
              <input value="<?php echo $get_profile['middle_name']; ?>" type="text" class="form-control" id="MiddleName" name="txtMiddleName" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="UsernameContainer">
              <label for="UserName">Username </label> <small class="pull-right form-alert"></small>
              <input readonly="" value="<?php echo $get_profile['username']; ?>" type="text" class="form-control" id="UserName" name="txtUserName" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="EmailContainer">
              <label for="Email">Email</label> <small class="pull-right form-alert" id="EmailAlert"></small>
              <input value="<?php echo $get_profile['email'] ?>" type="email" class="form-control" id="Email" name="txtEmail" placeholder="">
            </div>
          </div>
          <div class="col-lg-4">
            <div class="form-group" id="MobileContainer">
              <label for="Mobile">Mobile</label> <small class="pull-right form-alert" id="MobileAlert"></small>
                <input value="<?php echo $get_profile['contact_no'] ?>" type="text" class="form-control" id="Mobile" name="txtMobileNo" placeholder="" value="">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group" id="AddressContainer">
              <label for="Address">Address</label> <small class="pull-right form-alert" id="AddressAlert"></small>
              <input value="<?php echo $get_profile['address'] ?>" type="text" class="form-control" id="Address" name="txtAddress" placeholder="">
            </div>
          </div>

        </div>
          </div>
          <input type="submit" hidden="" value="SUBMIT" name="btnSubmit" id="btnSubmit">
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btnValidate" ><i class="fa fa-floppy-o" aria-hidden="true"></i> SAVE CHANGES</button>
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
    is_empty($("input[name='txtAddress']").val() , $("#AddressContainer") , $("#AddressAlert"));
    is_empty($("input[name='txtEmail']").val() , $("#EmailContainer") , $("#EmailAlert"));
    is_empty($("input[name='txtMobileNo']").val() , $("#MobileContainer") , $("#MobileAlert"));
    // is_empty($("input[name='slcAccess']").val() , $("#AccessContainer") , $("#AccessAlert"));
  }

  if ( has_value($("input[name='txtLastName']").val()) && has_value($("input[name='txtFirstName']").val()) && has_value($("input[name='txtUserName']").val()) && has_value($("input[name='txtAddress']").val()) && has_value($("input[name='txtEmail']").val()) && has_value($("input[name='txtMobileNo']").val())) {
    var con = confirm("Save this user?");
    if (con == true) {

      update_profile();

    }
  } else {

  }
  
})


////////////////////////////////////////////////////////////////////////////////////////
//FUNCTIONS STARTS HERE

function computeError() {
  TotalError = LastNameError + FirstNameError + MiddleNameError + UsernameError + AddressError + EmailError + MobileError;
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

function update_profile() {
  var data = {
    txtFirstName : $("#FirstName").val(),
    txtLastName : $("#LastName").val(),
    txtMiddleName : $("#MiddleName").val(),
    txtEmail : $("#Email").val(),
    txtAddress : $("#Address").val(),
    txtMobileNo : $("#Mobile").val(),
    txtID : $("#txtID").val()
  };
  $("#loadingSpinner").css("display","block");
  $.post('controllers/act_update_profile.php', data, function (response) { })
    .done(function (data) {
      var result = data;
      if (result) {
         $("#loadingSpinner").html("<span class='text-success'><i class='fa fa-check'></i> Changes saved!</span>")
       } else {
         $("#loadingSpinner").html("<span class='text-danger'><i class='fa fa-times'></i> No changes were made.</span>")
       }
     
    })
    .fail(function () {
      alert("There seems to be an error trying to retrieve the data");
    });

}


  </script>