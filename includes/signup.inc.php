<?php //insert new user into db:

//check if submit button clicked
if (isset($_POST['form-submit'])){

	require 'dbh.inc.php';

	$nam = $_POST['name'];
	$las = $_POST['lastname'];
	$age = $_POST['age'];
	$pho = $_POST['phone'];
	$ema = $_POST['email'];
	$pas = $_POST['password'];
	$que = 'INSERT INTO users (name, lastname, age, phone, email, password) VALUES (?, ?, ?, ?, ?, ?)';
	$stmt = mysqli_stmt_init($conn);

	//name format validation
	if (!preg_match("/^[a-zA-Zא-ת]*$/", $nam)){

		header("location:../signup.php?error=invalidname");
		exit();

	}
	//lastname format validation
	else if (!preg_match("/^[a-zA-Zא-ת]*$/", $las)){

		header("location:../signup.php?error=invalidlastname");
		exit();

	}
	//age format validation
	else if (!preg_match("/^[0-9]*$/", $age)){

		header("location:../signup.php?error=invalidage");
		exit();

	}
	//age restriction
	else if ($age < 24 || $age > 80){

		header("location:../signup.php?error=restriction");
		exit();

	}
	//phone number validation
	else if (!preg_match("/^[0-9]*$/", $pho)){

		header("location:../signup.php?error=invalidphone");
		exit();

	}
	//email format validation
	else if(!filter_var($ema, FILTER_VALIDATE_EMAIL)){

		header("location:../signup.php?error=invalidemail");
		exit();

	}
	//password format validation
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $pas) || strlen($pas) > 8 || strlen($pas) < 5){

		header("location:../signup.php?error=invalidpass");
		exit();

	}
	else{

		if (!mysqli_stmt_prepare($stmt, $que)){

			header("location:../signup.php?error=sqlerror");
			exit();

		}
		else{

			//add password security
			$pwdHash = password_hash($pas, PASSWORD_DEFAULT);

			//safely bind parameters and execute query
			mysqli_stmt_bind_param($stmt, 'ssiiss', $nam, $las, $age, $pho, $ema, $pwdHash);
			mysqli_stmt_execute($stmt);

			//configure session id and continue
			$query = 'SELECT * FROM users WHERE email="'.$ema.'"';
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_row($result);
			session_start();
			$_SESSION['UID'] = $row[0];

			//continue
			header("location:../questionnaire.php?signup=success");
			exit();

		}
	}
	//clean up
	//mysqli_free_result($result);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{

	//getting lost often?
	header("location:../signup.php");
	exit();

}
