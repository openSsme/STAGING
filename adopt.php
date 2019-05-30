<?php session_start(); ?>
<!DOCTYPE html> <!--end-->
<html>
<head>
  <meta charset="UTF-8">
  <title>Landing</title>
  <link href="stylesheet.css" rel=stylesheet type="text/css"/>
</head>
<body>
  <main>
    <div class="wrapper-main">
      <section class="section-default">
        <h1>אנו שמחים שמצאת את הכלב המתאים לך!</h1>
        <h3>מעתה המשך הטיפול יועבר לעמותה בה הכלב נמצא, נציגנו יחזרו אליך תוך 4 ימים לתיאום מפגש היכרות עם בן המשפחה החדש שלך. תמיד תוכל לחזור לפרטי הכלב ע"י לחיצה על כפתור המועדפים.</h3>
        <br>
        <?php
        require "includes/adoptme.inc.php"
        ?>
        <a href="results.php"><button id="back">סיים וחזור לדף התוצאות</button></a>
        <a href="favorites.php"><button id="back">מועדפים</button></a>
      </section>
    </div>
  </main>
</body>
</html>
