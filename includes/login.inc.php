<?php
//login as existing user

//check if submit button clicked
if (isset($_POST['login-submit'])){

	require 'dbh.inc.php';

	//store user input
	$ema = $_POST['email'];
	$pas = $_POST['password'];

	//email format validation
	if (!filter_var($ema, FILTER_VALIDATE_EMAIL)){

		header("location:../login.php?error=invalidemail");
		exit();

	}
	//password format validation
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $pas) || strlen($pas) > 8 || strlen($pas) < 5){

		header("location:../login.php?error=invalidpass");
		exit();

	}
	else{

		//set and execute SELECT query for users table
		$query = 'SELECT * FROM users WHERE email="'.$ema.'"';
		$result = mysqli_query($conn, $query);

		//check if email is in db
		if ($row = mysqli_fetch_row($result)){

			//match entered password with hash from db
			if (password_verify($pas, $row[6])){

				//start and set session id
				session_start();
				$_SESSION['UID'] = $row[0];

				//continue
				header("location:../results.php?login=success");
				exit();

			}
			else{

				//wrong password
				header("location:../login.php?error=wrongpass");
				exit();

			}

		}
		else{

			//email not in db
			header("location:../login.php?error=emailnotexists");
			exit();

		}

	}

}
else{

	//if user did not click submit button, do nothing
	header("location:../login.php");
	exit();

}
