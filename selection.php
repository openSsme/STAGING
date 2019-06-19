<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dog Selection</title>
  <link href="stylesheet.css" rel=stylesheet type="text/css"/>
</head>
<body>
  <main>
    <div class="wrapper-main">
      <section class="section-S">
        <h1>איזה כלב ברצונך לאמץ?</h1>
      </section><br>
      <form class="signup" action="includes/s.inc.php" method="post">
        <section class="section-S">
          <select name="location" required>
            <option value="0">איזור אימוץ</option>
            <option value="צפון">צפון</option>
            <option value="מרכז">מרכז</option>
            <option value="שפלה">שפלה</option>
            <option value="דרום">דרום</option>
          </select>
          <select name="age" required>
            <option value="0">גיל</option>
            <option value="גור">גור</option>
            <option value="צעיר">צעיר</option>
            <option value="מבוגר">מבוגר</option>
            <option value="זקן">זקן</option>
          </select>
          <select name="color" required>
            <option value="0">צבע</option>
            <option value="לבן">לבן</option>
            <option value="שחור">שחור</option>
            <option value="בז">בז'</option>
            <option value="מעורב">מעורב צבעים</option>
            <option value="חום">חום</option>
          </select>
          <select name="sex" required>
            <option value="0">מין הכלב</option>
            <option value="זכר">זכר</option>
            <option value="נקבה">נקבה</option>
          </select>
          <select name="size">
            <option value="0">גודל</option>
            <option value="ננסי">ננסי</option>
            <option value="קטן">קטן</option>
            <option value="בינוני">בינוני</option>
            <option value="גדול">גדול</option>
            <option value="ענק">ענק</option>
          </select>
          <select name="homefit" required>
            <option value="0">מתאים לבית</option>
            <option value="בית קרקע">בית קרקע</option>
            <option value="דירה בבניין ללא מרפסת">דירה בבניין - ללא מרפסת</option>
            <option value="דירה בבניין עם מרפסת">דירה בבניין - עם מרפסת</option>
            <option value="יחידת דיור">יחידת דיור</option>
          </select>
        </section><br>
        <button type="submit" name="submit-selection">המשך</button>
      </form>
    </div>
  </main>
</body>
<footer>
  <small>2019 &copy; Copyright</small>
</footer>
</html>
