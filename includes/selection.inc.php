<?php //concatenate all user inputs into one int and store it in a variable, then update 'pref' column
			//where the user id is the same as session id:

//check if submit button clicked
if (isset($_POST['submit-selection'])){

	//db connection settings
	require 'dbh.inc.php';

	//concat user input
	$prf = "";
	$prf .=
	$_POST['area'] . $_POST['age'] .
	$_POST['color'] . $_POST['sex'] .
	$_POST['size'] . $_POST['homefit'];

	//set and execute UPDATE query, use $conn as connection settings
	session_start();
	$query = 'UPDATE users SET pref="'.$prf.'" WHERE id="'.$_SESSION['UID'].'"';
	mysqli_query($conn, $query);

	//continue
	header("location:../results.php?done");
	exit();

}
else{

	//if user came here not by clicking submit, do nothing
	header("location:../questionnaire.php");
	exit();

}
