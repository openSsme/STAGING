<?php //add a dog tag from dogs table to adopt column in users table - this will indicate which dog the user wishes to adopt

//if user clicked adopt button in a popup inside adopt.php
if (isset($_POST['adopt'])){

	require 'dbh.inc.php';

  $query = 'UPDATE users SET adopt="'.$_POST['adopt'].'" WHERE id="'.$_SESSION['UID'].'"';
	mysqli_query($conn, $query);

}
//if user clicked adopt button in favorites.php
else if (isset($_POST['adopt2'])){

	require 'dbh.inc.php';

  $query = 'UPDATE users SET adopt="'.$_POST['adopt2'].'" WHERE id="'.$_SESSION['UID'].'"';
	mysqli_query($conn, $query);

}
else{

	//if user got here by mistake - revert to results page
	header("location:../results.php");
  exit();
}
