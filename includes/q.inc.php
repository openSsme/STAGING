<?php

//check if submit button clicked
if (isset($_POST['q-submit'])){

	require 'dbh.inc.php';

	session_start();
	$_SESSION['SET'] .=
		$_POST['status'] . $_POST['area'] . $_POST['home'] .$_POST['family'] . $_POST['pets'] .
		$_POST['alonetime'] . $_POST['firsttime'] . $_POST['reachout'] . $_POST['financial'] . $_POST['availability'] .
		$_POST['reason'] . $_POST['challenges'] . $_POST['trainer'] . $_POST['longterm'];

	$que = 'UPDATE users SET settings=? WHERE id=?';
	$stmt = mysqli_stmt_init($conn);
	//echo $set;

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../questionnaire.php?error=sqlerror");
		exit();

	}
	else{
		//start session, safely bind parameters and execute query
		mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['SET'], $_SESSION['UID']);
		mysqli_stmt_execute($stmt);

		//continue
		header("location:../selection.php?qcompleted");
		exit();
	}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}
else{

	//getting lost often?
	header("location:../questionnaire.php");
	exit();

}
