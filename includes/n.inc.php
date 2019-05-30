<?php //insert new dog into db:
//check if submit button clicked
if (isset($_POST['newdogg'])){

	require 'dbh.inc.php';

  $que = 'INSERT INTO dogs (location, age, color, sex, size, homefit, training, potty,
    physical_health, mental_health, vaccination, spay_neuter, name, settings, pref)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

			header("location:../new.php?error=sqlerror");
			exit();

		}
		else{

			//safely bind parameters and execute query
			mysqli_stmt_bind_param($stmt, 'sssssssssssssii', $_POST['location'], $_POST['age'],
      $_POST['color'], $_POST['sex'], $_POST['size'], $_POST['homefit'], $_POST['training'],
      $_POST['potty'], $_POST['phealth'], $_POST['mhealth'], $_POST['vaccination'],
      $_POST['spay_neuter'], $_POST['name'], $_POST['settings'], $_POST['pref']);
			mysqli_stmt_execute($stmt);

			//continue
			header("location:../admin.php?addnewdogg=success");
			exit();

		}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{

	//getting lost often?
	header("location:../admin.php");
	exit();

}
