<?php //favorites page

//check if session started
if (isset($_SESSION['UID'])){

	require 'dbh.inc.php';

	$que = 'SELECT tag FROM favorites WHERE email=?';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

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
				echo "		<img src='images/dogs/".$col[15]."' id='favimg'>";
				echo "			<button type='submit' name='ufav' value='".$col[0]."'>";
				echo "				<img src='images/star.png' height='30' />";
				echo "			</button>";
				echo "	</form>";
				echo "</div>";
				echo "<div class='nav'>";
				echo "	<a href='results.php'><button>חזור לדף תוצאות</button></a><br>";
				echo "	<form class='action' action='adopt.php' method='post'>";
				echo "			<button type='submit' name='adopt2' value='".$col[0]."'>המשך לאימוץ</button></a>";
				echo "	</form>";
				echo "</div>";

			}
			echo "</div>";

		}
		else{

			echo "BLANK PAGE OF DOOM";
			exit();

		}

	}

}
else{

	echo "BLANK PAGE OF DOOM";
	exit();

}
