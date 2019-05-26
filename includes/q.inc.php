<?php

//check if submit button clicked
if (isset($_POST['q-submit'])){

	require 'dbh.inc.php';
	
	$sta = $_POST['status'];
	$loc = $_POST['location'];
	$hom = $_POST['home'];
	$fam = $_POST['family'];
	$pet = $_POST['pets'];
	$alo = $_POST['alonetime'];
	$fir = $_POST['firsttime'];
	$rea = $_POST['reachout'];
	$fin = $_POST['financial'];
	$ava = $_POST['availability'];
	$rsn = $_POST['reason'];
	$cha = $_POST['challenges'];
	$tra = $_POST['trainer'];
	$lon = $_POST['longterm'];
	$set = "";
	$set .= $sta . $loc . $hom . $fam . $pet . $alo . $fir . $rea . $fin . $ava . $rsn . $cha . $tra . $lon;
	
	$que = 'UPDATE users SET settings=? WHERE id=?';
	$stmt = mysqli_stmt_init($conn);
	//echo $set;

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../questionnaire.php?error=sqlerror");
		exit();

	}
	else{
		//start session, safely bind parameters and execute query
		session_start();
		mysqli_stmt_bind_param($stmt, 'ii', $set, $_SESSION['UID']);
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