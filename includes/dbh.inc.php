<?php

	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "yofi";
	$dBName = "db";

	$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

	if (!$conn){

		die("could not connect to database. ".mysqli_connect_error());

	}

?>
