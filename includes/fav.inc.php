<?php //add to favorites:

if (isset($_POST['fav'])){
	require 'dbh.inc.php';

	$que = 'INSERT INTO favorites (email, tag) VALUES (?, ?)';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../results.php?error=sqlerror");
		exit();

	}
	else{

		session_start();
		mysqli_stmt_bind_param($stmt, 'si', $_SESSION['EMA'], $_POST['fav']);
		mysqli_stmt_execute($stmt);

		//continue
		header("location:../results.php?addedfav");
		exit();

	}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}
else if (isset($_POST['ufav'])){
	require 'dbh.inc.php';

	$que = 'DELETE FROM favorites WHERE email=? AND tag=?';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../favorites.php?error=sqlerror");
		exit();

	}
	else{

		session_start();
		mysqli_stmt_bind_param($stmt, 'si', $_SESSION['EMA'], $_POST['ufav']);
		mysqli_stmt_execute($stmt);

		//continue
		header("location:../favorites.php?removedfav");
		exit();

	}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}
else{

	echo "BLANK PAGE OF DOOM";
	exit();

}
