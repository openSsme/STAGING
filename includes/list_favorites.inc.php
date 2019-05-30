<?php //favorites page. display all favorites selected in results page here.

//check if session started
if (isset($_SESSION['UID'])){

	//db connection settings
	require 'dbh.inc.php';

	//set SELECT query for favorites table to select all rows containing the session variable 'EMA'
	$query = 'SELECT * FROM favorites WHERE email="'.$_SESSION['EMA'].'"';

	//store results in $result, concatenate and save as $list
	$result = mysqli_query($conn, $query);
	$str= "";
	while ($row = mysqli_fetch_assoc($result)){

		$tag = $row['tag'];
		$str .= $tag.","; //concatenate
	}
	$list = rtrim($str,", "); //trim $list to make a valid sql statement below

	//set and execute SELECT query for dogs table to select all rows containing the same values in $list
	$query = 'SELECT * FROM dogs WHERE tag IN ('.$list.')';
	$result = mysqli_query($conn, $query);

	//only if $query contains something:
	if($row = mysqli_fetch_all($result)){

		//for each retreived row display an image on the page with
		//a remove from favorites button..
		//also add back to results button and adopt button

		echo "<div class='container' style='border:5px solid black;width:900px;height:100%;'>";
		foreach ($row as $col){

			//display favorites
			echo "<div class='entry'>";
			echo "	<form class='content' action='includes/fav.inc.php' method='post'>"; //handle add/remove favorites here
			echo "		<img src='images/".$col[16]."' id='favimg'>";
			echo "			<button type='submit' name='ufav' value='".$col[0]."'>"; //remove from favorites
			echo "				<img src='images/star.png' height='30' />";
			echo "			</button>";
			echo "	</form>";
			echo "</div>";
			echo "<div class='nav'>";
			echo "	<a href='results.php'><button>חזור לדף תוצאות</button></a><br>"; //go back
			echo "	<form class='action' action='adopt.php' method='post'>";
			echo "			<button type='submit' name='adopt2' value='".$col[0]."'>המשך לאימוץ</button></a>"; //use this specific entry as reference for adoption - continue to adopt.php
			echo "	</form>";
			echo "</div>";
			echo $list;
			echo $_SESSION['EMA'];

		}
		echo "</div>";

	}
	else{

		echo "NO RESULTS";
		exit();

	}

}
else{

	//if session is not started do nothing
	header("location:../favorites.php");
	exit();

}
