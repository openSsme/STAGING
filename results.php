<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>LogIn</title>
  <link href="stylesheet.css" rel=stylesheet type="text/css"/>
</head>
<body>
  <main>
    <div class="wrapper-main">
      <h1>ריכוז תוצאות</h1>
      <section class="section-results">
          <?php
          require "includes/s.inc.php";
          ?>
          <br>
          <a href="favorites.php"><button id="continue">המשך</button></a>
      </section>
    </div>
  </main>
</body>
<footer>
  <small>2019 &copy; Copyright</small>
</footer>
</html>
