<?php //select a dog and set a preference value in users table

//check if submit button clicked
if (isset($_POST['submit-selection'])){

	require 'dbh.inc.php';

	$are = $_POST['area'];
	$age = $_POST['age'];
	$col = $_POST['color'];
	$sex = $_POST['sex'];
	$siz = $_POST['size'];
	$hom = $_POST['homefit'];
	$prf = "";
	$prf .= $are . $age . $col . $sex . $siz . $hom;
	$que = 'UPDATE users SET pref=? where id=?';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../selection.php?error=sqlerror");
		exit();

	}
	else{
		//safely bind parameters and execute query
		session_start();
		mysqli_stmt_bind_param($stmt, 'ii', $prf, $_SESSION['UID']);
		mysqli_stmt_execute($stmt);

		//continue
		header("location:../index.php?done");
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