<?php
//login as existing user

//check if submit button clicked
if (isset($_POST['login-submit'])){

	require 'dbh.inc.php';

	$ema = $_POST['email'];
	$pas = $_POST['password'];
	$que = "SELECT * FROM users WHERE email=?";
	$stmt = mysqli_stmt_init($conn);

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
		//db error handling
		if (!mysqli_stmt_prepare($stmt, $que)){

			header("location:../login.php?error=sqlerror");
			exit();

		}
		else{

			//set hebrew support
			mysqli_set_charset($conn, "utf8");

			//safely bind parameters and execute query
			mysqli_stmt_bind_param($stmt, 's', $ema);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			//check if email is in db
			if ($row = mysqli_fetch_assoc($result)){

				//match entered password with hash from db
				if (password_verify($pas, $row['password'])){

					//start session and continue
					session_start();
					$_SESSION['UID'] = $row['id'];
					$_SESSION['EMA'] = $row['email'];
					$_SESSION['SET'] = $row['settings'];
					$_SESSION['PRF'] = $row['pref'];

					//continue
					header("location:../results.php?login=success");
					exit();

				}
				else{

					header("location:../login.php?error=wrongpass");
					exit();

				}
			}
			else{
				//die("existential crisis");
				header("location:../login.php?error=usernotexists");
				exit();

			}

		}
	}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{

	//getting lost often?
	header("location:../login.php");
	exit();

}
