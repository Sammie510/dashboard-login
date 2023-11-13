<?php

function checkIfEmailExists($conn2, $email)
{
  $query = "SELECT email FROM mynewdrivve WHERE email = '$email'";
  $result = mysqli_query($conn2, $query) or die("checkIfEmailExists" . mysqli_error($conn2));

  if ($result !== false) {
    if (mysqli_num_rows($result) > 0) {
      return true;
    }
  }
  return false;
}

function registerNewUser($conn2, $fname, $sname, $oname, $email, $pass, $status = 1)
{
  $pass = sha1($pass);

  $query = "INSERT INTO mynewdrivve(email, password, firstname, surname, othername,
					status) VALUES('$email', '$pass', '$fname', '$sname', '$oname', '$status')";
  $result = mysqli_query($conn2, $query) or die("registerNewUser " . mysqli_error($conn2));
  return true;
}


?>