<?php //concatenate all user inputs into one int and store it in a variable, then update 'settings' column
 			//where the user id is the same as session id:

//check if submit button clicked
if (isset($_POST['q-submit'])){

	//db connection settings
	require 'dbh.inc.php';

	//concat user input
	$set = "";
	$set .=
	$_POST['status'] . $_POST['location'] .
	$_POST['home'] .$_POST['family'] .
	$_POST['pets'] . $_POST['alonetime'] .
	$_POST['firsttime'] . $_POST['reachout'] .
	$_POST['financial'] . $_POST['availability'] .
	$_POST['reason'] . $_POST['challenges'] .
	$_POST['trainer'] . $_POST['longterm'];

	//set and execute UPDATE query for users table
	session_start();
	$query = 'UPDATE users SET settings="'.$set.'" WHERE id="'.$_SESSION['UID'].'"';
	mysqli_query($conn, $query);

	//continue
	header("location:../selection.php?q=completed");
	exit();

}
else{

	//if user came here not by clicking submit, do nothing
	header("location:../questionnaire.php");
	exit();

}
