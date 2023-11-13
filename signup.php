<?php

session_start();

include "db.php";
include "helpers/functions.php";

$error = '';
$fname = '';
$sname = '';
$oname = '';
$email = '';

if (isset($_POST['register_but'])) {
  //Collect submitted data
  $fname = htmlentities($_POST["firstname"]);
  $sname = htmlentities($_POST["surname"]);
  $oname = htmlentities($_POST["othername"]);
  $email = mb_strtolower(trim(htmlentities($_POST["myemail"])));
  $pass = htmlentities($_POST["mypass"]);
  $pass2 = htmlentities($_POST["mypass2"]);
}

//Input Validation

//If failed return error

//If okay continue

//Check Duplicate Email in Database
$chk_email = checkIfEmailExists($conn2, $email);

// if failed(true), return error
if ($chk_email === true) {
  $error = "<p style='color:red;font-weight:bold;'>Email ($email)
							already registered</p>";
} else {
  // if okay (false), continue

  $reg_res = registerNewUser($conn2, $fname, $sname, $oname, $email, $pass);

  if ($reg_res === true) {
    $error = "<p style='color:green;font-weight:bold;'>Registration
								Successful!</p>";
    $fname = "";
    $sname = "";
    $oname = "";
    $email = "";
  } else {
    $error = "<p style='color:red;font-weight:bold;'>Registration
							Failed!</p>";
  }
}


?>

<link rel="stylesheet" href="login.css">

<!-- <div class="box">
  <div class="shape"></div>
  <div class="shape"></div>
</div> -->
<form id="form" method="post" action="">
  <h2 class="hs">SIGN UP HERE</h2>
  <!-- <div class="form-group"> -->
  <input id="mail" type="text" name="firstname" placeholder="Enter your first name" required>
  <input id="mail" type="text" name="surname" placeholder="Enter your surname" required>
  <input id="mail" type="text" name="othername" placeholder="Enter your other name">
  <input id="mail" type="text" placeholder="Email or Phone" name="myemail" required />
  <input id="pswd" type="password" placeholder="Password" name="mypass" required />
  <input id="pswd" type="password" placeholder="Confirm Password" name="mypass2" required />
  <button name="register_but" value="Sign In">Sign Up</button>
  <!-- </div> -->
  <p class="confirm">Already Registered?<br /><a href="signin.php">Login here</a></p>
  <div class="lnk">
  </div>
</form>