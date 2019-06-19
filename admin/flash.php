<?php //for testing purposes
require "../includes/dbh.inc.php";
//for each image in images folder, execute INSERT query
$loc = $_POST['location'];
$age = $_POST['age'];
$col = $_POST['color'];
$sex = $_POST['sex'];
$siz = $_POST['size'];
$hom = $_POST['homefit'];
$tra = $_POST['training'];
$phy = $_POST['phealth'];
$men = $_POST['mhealth'];
$vac = $_POST['vaccination'];
$neu = $_POST['spayneuter'];
$set = $_POST['settings'];
$prf = $_POST['pref'];
$pth = '../images/dogs/';
$files = scandir($pth);
$files = array_diff(scandir($pth), array('.', '..'));
$limit = count($files);
mysqli_set_charset($conn, "utf8");
for ($i = 0; $i < $limit;){
  foreach ($files as $img){
    $query = 'INSERT INTO dogs (location, age, color, sex, size,
      homefit, training, physical_health,
      mental_health, vaccination, spay_neuter, name,
      settings, pref, image)
      VALUES ("'.$loc.'", "'.$age.'", "'.$col.'", "'.$sex.'",
        "'.$siz.'", "'.$hom.'", "'.$tra.'",
        "'.$phy.'", "'.$men.'", "'.$vac.'", "'.$neu.'",
        "DOG-'.$i.'", "'.$set.'", "'.$prf.'", "'.$img.'")';
    mysqli_query($conn, $query);
    $i++;
  }
  header("location:admin.php?flash=success");
}
