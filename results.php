<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Results</title>
  <link href="stylesheet.css" rel=stylesheet type="text/css"/>
</head>
<body>
  <main>
    <div class="wrapper-main">
      <h1>ריכוז תוצאות</h1>
      <section class="section-results">
          <?php
          require "includes/match.inc.php";
          ?>
          <br>
          <a href="favorites.php"><button id="continue">המשך</button></a>
      </section>
    </div>
  </main>
</body>
</html>
