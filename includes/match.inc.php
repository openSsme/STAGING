<?php //compare between #pref and #settings columns in dogs and users tables and then display matches:

//check if session started
if (isset($_SESSION['UID'])){

	//db connection settings
	require 'dbh.inc.php';

	//set hebrew support when pulling data from table
	mysqli_set_charset($conn, "utf8");

	//set SELECT query for users table
	$que1 = 'SELECT email, settings, pref FROM users WHERE id="'.$_SESSION['UID'].'"';

	//execute SELECT query on users table, use $conn as connection settings, store result in $result1
	$result1 = mysqli_query($conn, $que1);

	//set $result1 as array, store #settings, #pref values from $que1
	$row = mysqli_fetch_row($result1);
	$_SESSION['EMA'] = $row[0];
	$set = $row[1];
	$prf = $row[2];

	//set SELECT query for dogs table, use $row values for matching current session variable 'UID'
	$que2 = 'SELECT * FROM dogs WHERE settings="'.$set.'" AND pref="'.$prf.'"';

	//execute SELECT query on dogs table, use $conn as connection settings, store result in $result2
	$result2 = mysqli_query($conn, $que2);

	//count matches, use this result later for limiting a 'for' loop
	$rows = mysqli_num_rows($result2);

	//only if $results2 contain something:
	if($row = mysqli_fetch_all($result2)){

		//for each retreived row display an image on the page with
		//a add to favorites button and a tooltip with more info..
		//also display a popup for each image on mouse click

		for ($i = 0; $i < $rows;){ //iterate to support individual popups

			foreach ($row as $col){ //display HTML

				// display matches
				echo "<div class='entry'>";
				echo "	<form class='content' action='includes/fav.inc.php' method='post'>"; //handle add/remove favorites here
				echo "		<a class='button' href='#popup".$i."'>";$i++; //iterate here - link this to a popup
				echo "			<img src='images/".$col[16]."' style='height:300px;border-radius:7px;'>";
				echo "		</a>";
				echo "		<button type='submit' name='fav' value='".$col[0]."'>"; //add to favorites
				echo "			<img src='images/star.png' id='addfav' height='30' />";
				echo "		</button>";
				echo "		<span class='tooltip-dtls'>"; //show tooltip
				echo "		<b>שם:</b> ".$col[13]."<br>";
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
		for ($j = 0; $j < $rows;){ //iterate to support individual popups

			foreach ($row as $pop){ //display HTML

				//this is the popup
				echo "<div id='popup".$j."' class='overlay'>";$j++; //iterate here
				echo "	<div class='popup'>";
				echo "		<h2>בחרת חבר חדש לחיים!!</h2>";
				echo "		<a class='close' href='#'>&times;</a>"; //close the popup
				echo "		<div class='content'>";
				echo "			<div class='dtls'>";
				echo "				<b>שם:</b> ".$pop[13]."<br>";
				echo "				<b>מיקום:</b> ".$pop[1]."<br>";
				echo "				<b>גיל:</b> ".$pop[2]."<br>";
				echo "				<b>צבע:</b> ".$pop[3]."<br>";
				echo "				<b>גודל:</b> ".$pop[5]."<br>";
				echo "				<b>מין:</b> ".$pop[4]."<br>";
				echo "				<b>מתאים לבית:</b> ".$pop[6]."<br>";
				echo "				<b>אילוף:</b> ".$pop[7]."<br>";
				echo "				<b>מחונך לצרכים:</b> ".$pop[8]."<br>";
				echo "				<b>מצב בריאותי:</b> ".$pop[9]."<br>";
				echo "				<b>מצב מנטלי:</b> ".$pop[10]."<br>";
				echo "				<b>חיסונים:</b> ".$pop[11]."<br>";
				echo "				<b>סירוס/עיקור:</b> ".$pop[12]."<br><br><br>";
				echo "				<a href='https://www.youtube.com/watch?v=67QMzqqH1no'>- טיפים לאילוף</a><br><br><br>";
				echo "				<a href='results.php'><button>חזור לדף תוצאות</button></a><br>"; //close the popup
				echo "				<form class='action' action='adopt.php' method='post'>";
				echo "					<button type='submit' name='adopt' value='".$pop[0]."'>המשך לאימוץ</button>"; //use this specific entry as reference for adoption - continue to adopt.php
				echo "				</form>";
				echo "			</div>";
				echo "			<img src='images/".$pop[16]."'>";
				echo "		</div>";
				echo "	</div>";
				echo "</div>";

			}

		}

	}
	else{

		echo "NO RESULTS";
		exit();

	}

}
else{

	//if session is not started do nothing
	header("location:../results.php");
	exit();

}
