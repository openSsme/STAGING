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
      <form class="signup" action="includes/selection.inc.php" method="post">
        <section class="section-S">
          <select name="area">
            <option value="FF">איזור אימוץ</option>
            <option value="1">צפון</option>
            <option value="2">מרכז</option>
            <option value="3">שפלה</option>
            <option value="4">דרום</option>
          </select>
          <select name="age">
            <option value="FF">גיל</option>
            <option value="1">גור</option>
            <option value="2">צעיר</option>
            <option value="3">מבוגר</option>
            <option value="4">זקן</option>
          </select>
          <select name="color">
            <option value="FF">צבע</option>
            <option value="1">לבן</option>
            <option value="2">שחור</option>
            <option value="3">בז'</option>
            <option value="4">מעורב צבעים</option>
            <option value="5">חום</option>
          </select>
          <select name="sex">
            <option value="FF">מין הכלב</option>
            <option value="1">זכר</option>
            <option value="2">נקבה</option>
          </select>
          <select name="size">
            <option value="FF">גודל</option>
            <option value="1">ננסי</option>
            <option value="2">קטן</option>
            <option value="3">בינוני</option>
            <option value="4">גדול</option>
            <option value="5">ענק</option>
          </select>
          <select name="homefit">
            <option value="FF">מתאים לבית</option>
            <option value="1">בית קרקע</option>
            <option value="2">דירה בבניין - ללא מרפסת</option>
            <option value="3">דירה בבניין - עם מרפסת</option>
            <option value="4">יחידת דיור</option>
          </select>
        </section><br>
        <button type="submit" name="submit-selection">המשך</button>
      </form>
    </div>
  </main>
</body>
</html>
