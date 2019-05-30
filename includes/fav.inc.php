<?php //add to favorites:

if (isset($_POST['fav'])){

	//db connection settings
	require 'dbh.inc.php';

	//set and execute an INSERT query on favorites table, use session variables 'EMA' and 'FAV'
	session_start();
	$query = 'INSERT INTO favorites (email, tag) VALUES ("'.$_SESSION['EMA'].'", "'.$_POST['fav'].'")';
	mysqli_query($conn, $query);
	header("location:../results.php?fav=added");
	exit();

}
else if (isset($_POST['ufav'])){

	//db connection settings
	require 'dbh.inc.php';

	//set and execute an DELETE query on favorites table, use session variables 'EMA' and 'FAV'
	session_start();
	$query = 'DELETE FROM favorites WHERE email="'.$_SESSION['EMA'].'" AND tag="'.$_POST['ufav'].'"';
	mysqli_query($conn, $query);
	header("location:../favorites.php?fav=removed");
	exit();
}
else{

	//if user did not click the favorite button, do nothing
	header("location:../results.php");
	exit();

}
