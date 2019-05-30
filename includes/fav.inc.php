<?php //add to favorites:

if (isset($_POST['fav'])){

	//db connection settings
	require 'dbh.inc.php';

	//set and execute an INSERT query on favorites table, use session variables 'EMA' and 'FAV'
	$query = 'INSERT INTO favorites (email, tag) VALUES ('.$_SESSION['EMA'].', '.$_POST['fav'].')';
	mysqli_query($conn, $query);

}
else{

	//if user did not click the add to favorites button, do nothing
	header("location:../results.php");
	exit();

}
if (isset($_POST['ufav'])){

	//db connection settings
	require 'dbh.inc.php';

	//set and execute an DELETE query on favorites table, use session variables 'EMA' and 'FAV'
	$query = 'DELETE FROM favorites WHERE email="'.$_SESSION['EMA'].'" AND tag="'.$_POST['fav'].'"';
	mysqli_query($conn, $query);
}
else{

	//if user did not click the remove from favorites button, do nothing
	header("location:../favorites.php");
	exit();

}
