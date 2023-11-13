<?php
session_start();

include "db.php";


$error = "";

if (isset($_POST['login_but'])) {
	// Get Data
	$email = htmlentities($_POST["myemail"]);
	$pass = htmlentities($_POST["mypass"]);

	// Check Database
	$user_valid = false;
	$user_id = false;
	$query1 = "SELECT * FROM mynewdrivve WHERE email = '$email'
						AND password = '$pass' ";
	$result1 = mysqli_query($conn2, $query1)
		or die("Check Database Error " . mysqli_error($conn));
	if ($result1 !== false) {
		if (mysqli_num_rows($result1) > 0) {
			// A MATCH WAS FOUND
			$user_valid = true;
			$row = mysqli_fetch_assoc($result1);
			// print_r($row); // COMMENT
			$user_id = $row["id"];
		}
	}

	//	die();

	// If User Details are valid, set session variable
	if ($user_valid) {
		$_SESSION['user_id'] = $user_id;
		// UNCOMMENT
		header("Location: index.php?login=success");
	} else {
		// If NOT valid, reject login
		unset($_SESSION['user_id']);
		session_destroy();
		$error = "<p style='color:red;'>Email/Password incorrect for $email</p>";
	}

}
/*
session_start();

//	echo "REQUEST <pre>".print_r($_REQUEST, true)."</pre>";
//	echo "GET <pre>".print_r($_GET, true)."</pre>";
//	echo "POST <pre>".print_r($_POST, true)."</pre>";

$error = "";



if (isset($_POST['login_but'])) {
	// Get Data
	$email = htmlentities($_POST["myemail"]);
	$pass = htmlentities($_POST["mypass"]);

	// Check Database

	// If User Details are valid, set session variable

	// If NOT valid, reject login

	// If no database, do manual check
	if (($email == "fakemail@fake.com") && ($pass == "123456")) {
		// if okay, set session variable
		$_SESSION['user_id'] = $email;
		header("Location: index.php?login=success");

	} else {
		// if NOT okay, unset session, reject login
		unset($_SESSION['user_id']);
		session_destroy();
		$error = "<p style='color:red;'>Login rejected</p>";
	}

}
*/
?>
<link rel="stylesheet" href="login.css">

<div class="box">
	<div class="shape"></div>
	<div class="shape"></div>
</div>
<form method="post" action="">
	<h2 class="hd">LOGIN HERE</h2>
	<!-- <div class="form-group"> -->
		<?php echo $error; ?>

		<input id="mail" type="text" placeholder="Email or Phone" name="myemail" />
		<input id="pswd" type="password" placeholder="Password" name="mypass" />
		<button name="login_but" value="Sign In">Login Now</button>
	<!-- </div> -->
	<p class="confirm">If you have not Registered,<br/><a href="signup.php">Click here</a> to Sign up</p>
	<p>Login with</p>
	<div class="lnk">
		<div class="go"><a href="google.com">Google</a></div>
		<div class="fb"><a href="facebook.com">Facebook</a></div>
	</div>
</form>

<!-- <form method="post" action="">
	<h3>Login Form</h3>
	<?php echo $error; ?>
	<label>Email Address</label>
	<input type='email' name='myemail' placeholder='Type your email' />
	<br>
	<label>Password</label>
	<input type='password' name='mypass' placeholder='Type your password' />
	<br>
	<button name='login_but' value='Sign In'>Sign In</button>
</form> -->