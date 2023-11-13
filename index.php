<?php
	session_start();

	// Check if user is logged in
	if(isset($_SESSION['user_id']) ){
		// if yes, go to dashboard
		header("Location: dashboard.php?login=success");
	}else{
		// if no, go to login page
	//	header("Location: login.html");
		header("Location: sign-in.php");
	}

	echo "SESSION <pre>".print_r($_SESSION, true)."</pre>";

?>
<h1>Index Page of MyDrive</h1>
