<?php //קל

require "includes/dbh.inc.php";

//for each image in images folder, execute INSERT query

$loc = "צפון";
$age = "צעיר";
$col = "חום";
$sex = "זכר";
$siz = "גדול";
$hom = "בית קרקע";
$tra = "בסיסי";
$pot = "כן";
$phy = "בריא";
$men = "יציב";
$vac = "משושה";
$neu = "כן";
$set = 12101114212121;  //CHANGE THIS
$prf = 221131;          //CHANGE THIS
$pth = 'images/dogs/';
$files = scandir($pth);
$files = array_diff(scandir($pth), array('.', '..'));
$limit = count($files);
mysqli_set_charset($conn, "utf8");

for ($i = 0; $i < $limit;){
  foreach ($files as $img){
    $query = 'INSERT INTO dogs (location, age, color, sex, size,
      homefit, training, potty, physical_health,
      mental_health, vaccination, spay_neuter, name,
      settings, pref, image)
      VALUES ("'.$loc.'", "'.$age.'", "'.$col.'", "'.$sex.'",
        "'.$siz.'", "'.$hom.'", "'.$tra.'", "'.$pot.'",
        "'.$phy.'", "'.$men.'", "'.$vac.'", "'.$neu.'",
        "DOG-'.$i.'", "'.$set.'", "'.$prf.'", "'.$img.'")';
    mysqli_query($conn, $query);
    $i++;
  }
  echo "DONE.";
}
