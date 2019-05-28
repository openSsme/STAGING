<?php //adopt a dog

if (isset($_POST['adopt'])){

	require 'dbh.inc.php';

  $que = 'UPDATE users SET adopt=? WHERE id=?';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../results.php?error=sqlerror");
		exit();

	}
	else{

    mysqli_stmt_bind_param($stmt, 'ss', $_POST['adopt'], $_SESSION['UID']);
		mysqli_stmt_execute($stmt);

  }

}
else if (isset($_POST['adopt2'])){

	require 'dbh.inc.php';

  $que = 'UPDATE users SET adopt=? WHERE id=?';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../results.php?error=sqlerror");
		exit();

	}
	else{

    mysqli_stmt_bind_param($stmt, 'ss', $_POST['adopt2'], $_SESSION['UID']);
		mysqli_stmt_execute($stmt);

  }
}
else{
  echo "NO SESSION, NO DOG, MAN..";
  exit();
}
