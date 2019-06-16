<?php //insert new user into db:

//check if user clicked submit
if (isset($_POST['form-submit'])){

	//db connection settings
	require 'dbh.inc.php';

	//store user input
	$nam = $_POST['name'];
	$las = $_POST['lastname'];
	$age = $_POST['age'];
	$pho = $_POST['phone'];
	$ema = $_POST['email'];
	$pas = $_POST['password'];

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
	else if (strlen($pho < 10)){

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

		//set hebrew support when inserting data into table
		mysqli_set_charset($conn, "utf8");

		//add password security by using a default hashing algorithm
		$pwdHash = password_hash($pas, PASSWORD_DEFAULT);

		//set and execute an INSERT query, use $conn as connection settings,
		$query = 'INSERT INTO users (name, lastname, age, phone, email, password)
		VALUES ("'.$nam.'", "'.$las.'", "'.$age.'", "'.$pho.'", "'.$ema.'", "'.$pwdHash.'")';
		mysqli_query($conn, $query);

		//configure session id - use the value stored in the first column of the new row we just inserted
		$query = 'SELECT id FROM users WHERE email="'.$ema.'"';
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_row($result);
		session_start();
		$_SESSION['UID'] = $row[0];

		//continue
		header("location:../questionnaire.php?signup=success");
		exit();

	}

}

else{

	//if user came here not by clicking submit, do nothing
	header("location:../signup.php");
	exit();

}
