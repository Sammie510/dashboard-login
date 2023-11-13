<?php

	session_start();
	
//	echo "REQUEST <pre>".print_r($_REQUEST, true)."</pre>";
//	echo "GET <pre>".print_r($_GET, true)."</pre>";
//	echo "POST <pre>".print_r($_POST, true)."</pre>";
	
	if(isset($_POST['login_but'])){
		// Get Data
		$email 	= htmlentities($_POST["myemail"]);
		$pass 	= htmlentities($_POST["mypass"]);
		
		// Check Database
		
			// If User Details are valid, set session variable
			
			// If NOT valid, reject login
		
		// If no database, do manual check 
			if( ($email == "fakemail@fake.com") && ($pass == "123456") ){
				// if okay, set session variable
				$_SESSION['user_id'] = $email;
				header("Location: index.php?login=success");
				
			}else{
				// if NOT okay, unset session, reject login
				unset($_SESSION['user_id']);
				session_destroy();
				header("Location: login.html?error=rejected");
			}
			
			
			
		
	}
	
?>