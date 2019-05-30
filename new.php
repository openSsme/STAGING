<!DOCTYPE html> <!--start-->
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link href="stylesheet.css" rel=stylesheet type="text/css"/>
</head>
<body>
  <main>
    <div class="wrapper-main">
      <section class="section-default">
        <h1>הוספה למאגר</h1>
        <form class="insert" action="includes/n.inc.php" method="post">
          <input type="text" name="location" placeholder="מיקום" autofocus required>
          <input type="text" name="age" placeholder="גיל" required>
          <input type="text" name="color" placeholder="צבע" required>
          <input type="text" name="sex" placeholder="מין" required>
          <input type="text" name="size" placeholder="גודל" required>
          <input type="text" name="homefit" placeholder="מתאים לבית" required>
          <input type="text" name="training" placeholder="אילוף" required>
          <input type="text" name="potty" placeholder="מחונך לצרכים" required>
          <input type="text" name="phealth" placeholder="מצב בריאותי" required>
          <input type="text" name="mhealth" placeholder="מצב נפשי" required>
          <input type="text" name="vaccination" placeholder="חיסונים" required>
          <input type="text" name="spayneuter" placeholder="סירוס/עיקור" required>
          <input type="text" name="name" placeholder="שם" required>
          <input type="text" name="settings" placeholder="התאמה" required>
          <input type="text" name="pref" placeholder="העדפה" required>
          <!--input type="file" name="image" placeholder="תמונה" /-->
          <button type="submit" name="newdogg">הוסף</button>
          <a href="admin.php"><button>חזור</button></a>
        </form>
      </section>
    </div>
  </main>
</body>
<footer>
  <small>2019 &copy; Copyright</small>
</footer>
</html>
