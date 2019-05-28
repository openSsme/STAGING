<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Questionnaire</title>
  <link href="stylesheet.css" rel=stylesheet type="text/css"/>
</head>
<body>
  <main>
    <div class="wrapper-main">
      <section class="section-Questionnaire">
        <h1>שאלון הכרות</h1>
        <h3>כיוון שאנו רוצים למצוא את ההתאמה הטובה ביותר עבורך ועבור הכלבים שלנו, נשמח שתענה על שאלון שיעזור לנו לחדד עבורך את התוצאות:</h3>
      </section><br>
      <form class="signup" action="includes/q.inc.php" method="post">
        <section class="section-Q">
          <select name="status">
            <option value="FF">מצב משפחתי</option>
            <option value="1">רווק</option>
            <option value="2">נשוי ללא ילדים</option>
            <option value="3">נשוי עם ילדים</option>
            <option value="4">גרוש בלי ילדים</option>
            <option value="5">גרוש עם ילדים</option>
          </select>
          <select name="location">
            <option value="FF">איזור מגורים</option>
            <option value="1">צפון</option>
            <option value="2">מרכז</option>
            <option value="3">שפלה</option>
            <option value="4">דרום</option>
          </select>
          <select name="home">
            <option value="FF">סוג בית</option>
            <option value="1">בית קרקע</option>
            <option value="2">דירה בבניין - ללא מרפסת</option>
            <option value="3">דירה בבניין - עם מרפסת</option>
            <option value="4">יחידת דיור</option>
          </select>
          <select name="family">
            <option value="FF">מס' ילדים בבית</option>
            <option value="0">ללא</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9+</option>
          </select>
        </section>
        <section class="section-Q">
          <select name="pets">
            <option value="FF">האם קיימים בעלי חיים נוספים בבית? במידה וכן אנא בחר את בעל החיים</option>
            <option value="1">לא</option>
            <option value="2">כלב</option>
            <option value="3">חתול</option>
            <option value="4">דגים</option>
            <option value="5">תוכי</option>
            <option value="6">אחר</option>
          </select>
          <select name="alonetime">
            <option value="FF">במידה ותצא לחופשה האם יש מי שידאג לכלב? האם אתה מרבה בנסיעות?</option>
            <option value="1">לא נוסע בכלל</option>
            <option value="2">נוסע מעט</option>
            <option value="3">נוסע בתדירות גבוהה</option>
          </select>
          <select name="firsttime">
            <option value="FF">האם אימצת כלב בעבר?</option>
            <option value="1">כן</option>
            <option value="2">לא</option>
          </select>
          <select name="reachout">
            <option value="FF">האם פנית בעבר לעמותה לאימוץ?</option>
            <option value="1">כן, אימצתי והכלב אצלי</option>
            <option value="2">כן, אימצתי והכלב נמסר / ננטש</option>
            <option value="3">כן, סורבתי לאימוץ</option>
            <option value="4">לא פניתי מעולם לאימוץ</option>
          </select>
        </section>
        <section class="section-Q">
          <select name="financial">
            <option value="FF">כיצד היית מגדיר את מצבך הכלכלי?</option>
            <option value="1">דל</option>
            <option value="2">ביניים</option>
            <option value="3">אמיד</option>
          </select>
          <select name="availability">
            <option value="FF">האם אתה חושב שיש לך מספיק זמן לטיפול בכלב?</option>
            <option value="1">כן</option>
            <option value="2">אולי</option>p questions for interview
            <option value="3">לא</option>
          </select>
          <select name="reason">
            <option value="FF">מה מטרת האימוץ? מדוע אתה מעוניין לאמץ?</option>
            <option value="1">מחפש חבר לחיים</option>
            <option value="2">מחפש כלב עבודה</option>
            <option value="3">מחפש כלב שמירה</option>
            <option value="4">הרבעה</option>
          </select>
          <select name="challenges">
            <option value="FF">האם אתה חושב שאתה מוכן לאתגרים הכרוכים בגידול הכלב?</option>
            <option value="1">כן</option>
            <option value="2">לא</option>
          </select>
        </section>
        <section class="section-Q">
          <select name="trainer">
            <option value="FF">מספר שעות העבודה של המטפל העיקרי בכלב</option>
            <option value="1">משרה מלאה</option>
            <option value="2">משרה חלקית</option>
            <option value="3">משרת אם</option>
            <option value="4">יותר ממשרה מלאה - שעות נוספות</option>
            <option value="5">משמרות</option>
          </select>
          <select name="longterm">
            <option value="FF">האם אתם מוכנים לטפל בכלב שלכם לטווח הארוך?</option>
            <option value="1">כן</option>
            <option value="2">לא</option>
          </select>
        </section><br>
        <button type="submit" name="q-submit">המשך</button>
      </form>
    </div>
  </main>
</body>
<footer>
  <small>2019 &copy; Copyright</small>
</footer>
</html>
