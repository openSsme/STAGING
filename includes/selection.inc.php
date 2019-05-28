<?php //select a dog and set a preference value in users table

//check if submit button clicked
if (isset($_POST['submit-selection'])){

	require 'dbh.inc.php';

	$prf .= $_POST['area'] . $_POST['age'] . $_POST['color'] . $_POST['sex'] . $_POST['size'] . $_POST['homefit'];

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
		header("location:../results.php?done");
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
