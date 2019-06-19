<?php //insert new dog into db:
//check if submit button clicked
if (isset($_POST['newdogg'])){

	require '../includes/dbh.inc.php';

  $que = 'INSERT INTO dogs (location, age, color, sex, size, homefit, training,
    physical_health, mental_health, vaccination, spay_neuter, name)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

			header("location:../new.php?error=sqlerror");
			exit();

		}
		else{

			//set hebrew support when inserting data into table
			mysqli_set_charset($conn, "utf8");

			//safely bind parameters and execute query
			mysqli_stmt_bind_param($stmt, 'ssssssssssss', $_POST['location'], $_POST['age'],
      $_POST['color'], $_POST['sex'], $_POST['size'], $_POST['homefit'], $_POST['training'],
			$_POST['phealth'], $_POST['mhealth'], $_POST['vaccination'],
      $_POST['spayneuter'], $_POST['name']);
			mysqli_stmt_execute($stmt);

			//continue
			header("location:new.php?addnewdogg=success");
			exit();

		}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{

	//getting lost often?
	header("location:admin.php");
	exit();

}
