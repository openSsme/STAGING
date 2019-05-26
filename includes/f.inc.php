<?php //favorites page

//check if session started
if (isset($_SESSION['UID'])){

	require 'dbh.inc.php';

	$que1 = 'SELECT tag FROM favorites WHERE email=?';
	$que2 = 'SELECT * FROM dogs WHERE tag IN ';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que1)){

		header("location:../favorites.php?error=sqlerror");
		exit();

	}
	else{

		mysqli_stmt_bind_param($stmt, 's', $_SESSION['EMA']);
		mysqli_stmt_execute($stmt);

		$str = "";
		$result = mysqli_stmt_get_result($stmt);
		while ($row = mysqli_fetch_assoc($result)){

			$tag = $row['tag'];
			$str .= $tag.",";

		}
		$list = rtrim($str,", ");
		$query = 'SELECT * FROM dogs WHERE tag IN ('.$list.')';
		if($result = mysqli_query($conn, $query)){

			$row = mysqli_fetch_all($result);

			echo "<div class='container' style='border:5px solid black;width:900px;height:100%;'>";
			foreach ($row as $col){

				echo "<div class='entry'>";
				echo "	<form class='content' action='includes/fav.inc.php' method='post'>";
				echo "		<img src='images/".$col[16]."' id='favimg'>";
				echo "			<button type='submit' name='ufav' value='".$col[0]."'>";
				echo "				<img src='images/star.png' height='30' />";
				echo "			</button>";
				echo "	</form>";
				echo "</div>";
				echo "	<div class='nav'>";
				echo "		<a href='index.php'><button>חזור לדף תוצאות</button></a><br>";
				echo "		<a href='adopt.php'><button>המשך לאימוץ</button></a>";
				echo "	</div>";

			}
			echo "</div>";
		}
		else{
			echo "BLANK PAGE OF DOOM";
			exit();
		}
		

	}
/*
	if (!mysqli_stmt_prepare($stmt, $que2)){

		header("location:../favorites.php?error=sqlerror2");
		exit();

	}
	else{

		//set hebrew support when pulling data from table
		mysqli_set_charset($conn, "utf8");

		mysqli_stmt_bind_param($stmt, 's', $list);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_all($result);
		echo $list;
		//print_r($result);
		foreach ($row as $col){

			echo "<div class='entry'>";
			echo "	<img src='images/".$col[16]."' class='image'>";
			echo "</div>";

		}

	}
*/
}
else{

	echo "BLANK PAGE OF DOOM";
	exit();

}