<?php //קל

require "includes/dbh.inc.php";

//for each image in images folder, execute query

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
$set = 31122214311121;
$prf = 121151;
$path    = 'images/dogs/';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));
$limit = count($files);
mysqli_set_charset($conn, "utf8");

for ($i = 0; $i < $limit;){
  ob_start();
  foreach ($files as $img){
    echo "RUNNING...";
    $query = 'INSERT INTO dogs (location, age, color, sex, size,
      homefit, training, potty, physical_health,
      mental_health, vaccination, spay_neuter, name,
      settings, pref, image)
      VALUES ("'.$loc.'", "'.$age.'", "'.$col.'", "'.$sex.'",
        "'.$siz.'", "'.$hom.'", "'.$tra.'", "'.$pot.'",
        "'.$phy.'", "'.$men.'", "'.$vac.'", "'.$neu.'",
        "'.$i.'", "'.$set.'", "'.$prf.'", "'.$img.'")';
    mysqli_query($conn, $query);
    $i++;
  }
  ob_end_clean();
  echo "DONE.";
}
