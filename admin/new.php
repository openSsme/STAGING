<!DOCTYPE html> <!--start-->
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <link href="../stylesheet.css" rel=stylesheet type="text/css"/>
</head>
<body>
  <main>
    <div class="wrapper-main">
      <section class="section-default">
        <h1>הוספה למאגר</h1>
        <form class="insert" action="n.inc.php" method="post">
          <input type="text" name="name" placeholder="שם" required>
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
          </section>
          <section class="section-S">
            <select name="training" required>
              <option value="0">אילוף</option>
              <option value="ללא">ללא</option>
              <option value="בסיסי">בסיסי</option>
              <option value="מתקדם">מתקדם</option>
              <option value="מקצועי">מקצועי</option>
            </select>
            <select name="phealth" required>
              <option value="0">מצב בריאותי</option>
              <option value="בריא">בריא</option>
              <option value="מטופל">מטופל</option>
              <option value="מחלה גנטית">מחלה גנטית</option>
              <option value="מחלה תורשתית">מחלה תורשתית</option>
              <option value="נכה">נכה</option>
            </select>
            <select name="mhealth" required>
              <option value="0">מצב נפשי</option>
              <option value="יציב">יציב</option>
              <option value="לא יציב">לא יציב</option>
              <option value="קיצוני">קיצוני</option>
            </select>
            <select name="vaccination" required>
              <option value="0">חיסונים</option>
              <option value="ללא">ללא</option>
              <option value="משושה">משושה</option>
              <option value="כלבת">כלבת</option>
              <option value="שעלת">שעלת</option>
              <option value="תולעת הפארק">תולעת הפארק</option>
              <option value="הכל">הכל</option>
            </select>
            <select name="spayneuter" required>
              <option value="0">סירוס/עיקור</option>
              <option value="כן">כן</option>
              <option value="לא">לא</option>
            </select>
          </section><br>
          <input type="file" name="addimg" placeholder="תמונה">
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
