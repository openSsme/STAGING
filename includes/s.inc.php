<?php //display matches:

//check if session started
if (isset($_POST['submit-selection'])){

	require "dbh.inc.php";
	
	session_start();
	$_SESSION['LOC'] = $_POST['location'];
	$_SESSION['AGE'] = $_POST['age'];
	$_SESSION['COL'] = $_POST['color'];
	$_SESSION['SEX'] = $_POST['sex'];
	$_SESSION['SIZ'] = $_POST['size'];
	$_SESSION['HOM'] = $_POST['homefit'];

	$prf .=
	$_POST['location'] . $_POST['age'] .
	$_POST['color'] . $_POST['sex'] .
	$_POST['size'] . $_POST['homefit'];

	$que = 'UPDATE users SET pref=? WHERE id=?';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../selection.php?error=sqlerror2");
		print_r($prf);
		exit();

	}
	else{
		//set hebrew support when updating data
		mysqli_set_charset($conn, "utf8");

		//safely bind parameters and execute query
		mysqli_stmt_bind_param($stmt, 'si', $prf, $_SESSION['UID']);
		mysqli_stmt_execute($stmt);

		header("location:../results.php");
	}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}
else{

	echo "BLANK PAGE OF DOOM";
	exit();

}
