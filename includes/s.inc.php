<?php //display matches:

//check if session started
if (isset($_SESSION['UID'])){

	require 'dbh.inc.php';

	$que1 = 'SELECT * FROM users WHERE id=?';
	$que2 = 'SELECT * FROM dogs WHERE pref=? AND settings=?';
	$stmt = mysqli_stmt_init($conn);


	if (!mysqli_stmt_prepare($stmt, $que1)){

		header("location:../selection.php?error=sqlerror");
		exit();

	}
	else{

		mysqli_stmt_bind_param($stmt, 'i', $_SESSION['UID']);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($result);
		$pref = $row['pref'];
		$set = $row['settings'];
		$_SESSION['EMA'] = $row['email'];
		
	}

	if (!mysqli_stmt_prepare($stmt, $que2)){

		header("location:../index.php?error=sqlerror");
		exit();

	}
	else{

		//set hebrew support when pulling data from table
		mysqli_set_charset($conn, "utf8");

		mysqli_stmt_bind_param($stmt, 'ii', $pref, $set);
		mysqli_stmt_execute($stmt);
		
		$result = mysqli_stmt_get_result($stmt);

		if($row = mysqli_fetch_all($result)){

			//for each retreived row display a profile on the page with
			//a add to favorites button and a tooltip with more info

			foreach ($row as $col){
			
				$_SESSION[''] = $col[1];
				$_SESSION[''] = $col[2];
				$_SESSION[''] = $col[3];
				$_SESSION[''] = $col[4];
				$_SESSION[''] = $col[5];
				$_SESSION[''] = $col[6];
				$_SESSION[''] = $col[7];
				$_SESSION[''] = $col[8];
				$_SESSION[''] = $col[9];
				$_SESSION[''] = $col[10];
				$_SESSION[''] = $col[11];
				$_SESSION[''] = $col[12];
				$_SESSION[''] = $col[13];
				$_SESSION[''] = $col[14];
				$_SESSION[''] = $col[15];
				$_SESSION[''] = $col[16];

				echo "<div class='entry'>";
				echo "	<form class='content' action='includes/fav.inc.php' method='post'>";
				echo "		<a class='button' href='#popup1'><img src='images/".$col[16]."' id='dog'></a>";
				echo "			<button type='submit' name='fav' value='".$col[0]."'>";
				echo "				<img src='images/star.png' id='addfav' height='30' />";
				echo "			</button>";
				echo "		<span class='tooltip-dtls'>";
				echo "		<b>שם:</b> '".$col[13]."'<br>";
				echo "		<b>מיקום:</b> '".$col[1]."'<br>";
				echo "		<b>גיל:</b> '".$col[2]."'<br>";
				echo "		<b>צבע:</b> '".$col[3]."'<br>";
				echo "		<b>גודל:</b> '".$col[5]."'<br>";
				echo "		<b>מין:</b> '".$col[4]."'<br>";
				echo "		</span>";
				echo "	</form>";
				echo "</div>";
				echo"";
				echo "<div id='popup1' class='overlay'>";
				echo "	<div class='popup'>";
				echo "		<h2>בחרת חבר חדש לחיים!!</h2>";
				echo "		<a class='close' href='#'>&times;</a>";
				echo "		<div class='content'>";
				echo "			<div class='dtls'>";
				echo "				<b>שם:</b> '".$col[13]."'<br>";
				echo "				<b>מיקום:</b> '".$col[1]."'<br>";
				echo "				<b>גיל:</b> '".$col[2]."'<br>";
				echo "				<b>צבע:</b> '".$col[3]."'<br>";
				echo "				<b>גודל:</b> '".$col[5]."'<br>";
				echo "				<b>מין:</b> '".$col[4]."'<br>";
				echo "				<b>מתאים לבית:</b> '".$col[6]."'<br>";
				echo "				<b>אילוף:</b> '".$col[7]."'<br>";
				echo "				<b>מחונך לצרכים:</b> '".$col[8]."'<br>";
				echo "				<b>מצב בריאותי:</b> '".$col[9]."'<br>";
				echo "				<b>מצב מנטלי:</b> '".$col[10]."'<br>";
				echo "				<b>חיסונים:</b> '".$col[11]."'<br>";
				echo "				<b>סירוס/עיקור:</b> '".$col[12]."'<br><br><br>";
				echo "				<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>- טיפים לאילוף</a><br>";
				echo "				<a href='http://www.teaenergy.com/information/effects-of-tree-bark-in-herbal-teas/'>- מאפייני הגזע</a><br>";
				echo "				<a href='https://freemaninstitute.com/uselessFacts.htm'>- מידע כללי</a><br><br><br>";
				echo "				<a href='index.php'><button>חזור לדף תוצאות</button></a><br>";
				echo "				<a href='adopt.php'><button>המשך לאימוץ</button></a>";
				echo "			</div>";
				echo "			<img src='images/".$col[16]."'>";
				echo "		</div>";
				echo "	</div>";
				echo "</div>";


			}
		}
		else{

			echo "BLANK PAGE OF DOOM";
			exit();

		}
	}
	//clean up
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{

	echo "BLANK PAGE OF DOOM";
	exit();

}
