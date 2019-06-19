<?php //select a dog and set a preference value in users table

//check if submit button clicked
if (isset($_SESSION['UID'])){

	require 'dbh.inc.php';

	$que = 'SELECT * FROM dogs WHERE location=? AND age=? AND color=? AND sex=? AND size=? AND homefit=? AND settings=? OR pref=? AND settings=?';
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $que)){

		header("location:../selection.php?error=sqlerror1");
		exit();

	}
	else{
		//set hebrew support when inserting data into table
		mysqli_set_charset($conn, "utf8");

		//safely bind parameters and execute query
		mysqli_stmt_bind_param($stmt, 'ssssssisi', $_SESSION['LOC'], $_SESSION['AGE'], $_SESSION['COL'], $_SESSION['SEX'], $_SESSION['SIZ'], $_SESSION['HOM'], $_SESSION['SET'], $_SESSION['PRF'], $_SESSION['SET']);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);
		$rows = mysqli_num_rows($result);
		/*
		print_r($rows);
		print_r($_SESSION['SET']);
		print_r($_SESSION['LOC']);
		print_r($_SESSION['AGE']);
		print_r($_SESSION['COL']);
		print_r($_SESSION['SEX']);
		print_r($_SESSION['SIZ']);
		print_r($_SESSION['HOM']);
		print_r($_SESSION['EMA']);
		print_r($_SESSION['PRF']);
		*/
		if($row = mysqli_fetch_all($result)){

			//for each retreived row display an image on the page with
			//a add to favorites button and a tooltip with more info..
			//also display a popup for each image on mouse click

			for ($i = 0; $i < $rows;){

				foreach ($row as $col){

					echo "<div class='entry'>";
					echo "	<form class='content' action='includes/fav.inc.php' method='post'>";
					echo "		<a class='button' href='#popup".$i."'>";$i++; //iterate to support individual popups
					echo "			<img src='images/dogs/".$col[15]."' style='height:300px;border-radius:7px;'>";
					echo "		</a>";
					echo "		<button type='submit' name='fav' value='".$col[0]."'>";
					echo "			<img src='images/star.png' id='addfav' height='30' />";
					echo "		</button>";
					echo "		<span class='tooltip-dtls'>"; //tooltip
					echo "		<b>שם:</b> ".$col[12]."<br>";
					echo "		<b>מיקום:</b> ".$col[1]."<br>";
					echo "		<b>גיל:</b> ".$col[2]."<br>";
					echo "		<b>צבע:</b> ".$col[3]."<br>";
					echo "		<b>גודל:</b> ".$col[5]."<br>";
					echo "		<b>מין:</b> ".$col[4]."<br>";
					echo "		</span>";
					echo "	</form>";
					echo "</div>";

				}

			}
			for ($j = 0; $j < $rows;){

				foreach ($row as $pop){

					echo "<div id='popup".$j."' class='overlay'>";$j++; //iterate to support individual popups
					echo "	<div class='popup'>";
					echo "		<h2>בחרת חבר חדש לחיים!!</h2>";
					echo "		<a class='close' href='#'>&times;</a>";
					echo "		<div class='content'>";
					echo "			<div class='dtls'>";
					echo "				<b>שם:</b> ".$pop[12]."<br>";
					echo "				<b>מיקום:</b> ".$pop[1]."<br>";
					echo "				<b>גיל:</b> ".$pop[2]."<br>";
					echo "				<b>צבע:</b> ".$pop[3]."<br>";
					echo "				<b>גודל:</b> ".$pop[5]."<br>";
					echo "				<b>מין:</b> ".$pop[4]."<br>";
					echo "				<b>מתאים לבית:</b> ".$pop[6]."<br>";
					echo "				<b>אילוף:</b> ".$pop[7]."<br>";
					echo "				<b>מצב בריאותי:</b> ".$pop[8]."<br>";
					echo "				<b>מצב מנטלי:</b> ".$pop[9]."<br>";
					echo "				<b>חיסונים:</b> ".$pop[10]."<br>";
					echo "				<b>סירוס/עיקור:</b> ".$pop[11]."<br><br><br>";
					echo "				<a href='https://www.youtube.com/watch?v=dQw4w9WgXcQ'>- טיפים לאילוף</a><br>";
					echo "				<a href='http://www.teaenergy.com/information/effects-of-tree-bark-in-herbal-teas/'>- מאפייני הגזע</a><br>";
					echo "				<a href='https://freemaninstitute.com/uselessFacts.htm'>- מידע כללי</a><br><br><br>";
					echo "				<a href='#'><button>חזור לדף תוצאות</button></a><br>";
					echo "				<form class='action' action='adopt.php' method='post'>";
					echo "					<button type='submit' name='adopt' value='".$pop[0]."'>המשך לאימוץ</button>";
					echo "				</form>";
					echo "			</div>";
					echo "			<img src='images/dogs/".$pop[15]."'>";
					echo "		</div>";
					echo "	</div>";
					echo "</div>";

				}

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

	//getting lost often?
	header("location:index.php");
	exit();

}
