<?php //concatenate all user inputs into one int and store it in a variable, then update 'pref' column
			//where the user id is the same as session id:

//check if submit button clicked
if (isset($_POST['submit-selection'])){

	//db connection settings
	require 'dbh.inc.php';

	//concat user input
	$prf = "";
	$prf .=
	$_POST['area'] . $_POST['age'] .
	$_POST['color'] . $_POST['sex'] .
	$_POST['size'] . $_POST['homefit'];

	//set and execute UPDATE query, use $conn as connection settings
	session_start();

	mysqli_set_charset($conn, "utf8");

	$query = 'UPDATE users SET pref="'.$prf.'" WHERE id="'.$_SESSION['UID'].'"';
	mysqli_query($conn, $query);

	$img = array('14fb43d94f601b28bb8b1f0de0e07a5a--dog-portrait-painting-dog-paintings.jpg','21b159ed8487d01f4ea52913804b870d.jpg','98198f24919691.5604b2210caad.jpg','b9e11e3e67e977ab9f38e4b63b8d7f8e--dog-with-flowers-dog-with-flower-crown.jpg','DEEF-DOG-r1-797x1024.jpg','dog-13.jpg','dogpaint-12-900x1069.jpg','Dog-Photography-by-Mark-Hewitson-Photography-003-2.jpg','Dog-Portrait-11.jpg','Dog-portrait-12337.jpg','Dog-Portrait-15.jpg','dog-portrait-by-marko-savic.jpg','dog-portrait-photography-elke-vogelsang-4.jpg','dog-portrait-photography-elke-vogelsang-8.jpg','dog-portraits-alexander-khokhlov-2.jpg','dog-portraits-alexander-khokhlov-5.jpg','dog-portraits-alexander-khokhlov-9.jpg','ElkeVogelsang1.jpg','expressive-dog-portraits-elke-vogelsang-3.jpg','expressive-dog-portraits-elke-vogelsang-8.jpg','PetPortraits_0877.jpg','Red.3235503_large.JPG','Romeo - Labrador Dog Portrait.jpg');

	for ($i = 0; $i < 4;){
		$query2 = 'INSERT INTO dogs (location, age, color, sex, size, homefit, training, potty, physical_health, mental_health, vaccination, spay_neuter, name, settings, pref, image) VALUES ("צפון", "צעיר","חום", "זכר", "גדול", "בית קרקע", "בסיסי", "כן", "בריא", "יציב", "משושה", "כן", "DOGG", "'.$_SESSION['SET'].'", "'.$prf.'", "'.$img[array_rand($img)].'")';
		mysqli_query($conn, $query2);
		$i++;
	}


	//continue
	header("location:../results.php?done");
	exit();

}
else{

	//if user came here not by clicking submit, do nothing
	header("location:../questionnaire.php");
	exit();

}
