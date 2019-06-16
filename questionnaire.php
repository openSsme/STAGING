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
      <form class="signup" action="includes/concat.inc.php" method="post">
        <!-- devide questions into 4 sections for better display-->
        <section class="section-Q">
          <select name="status" required>
            <option value="">מצב משפחתי</option>
            <option value="1">רווק</option>
            <option value="2">נשוי ללא ילדים</option>
            <option value="3">נשוי עם ילדים</option>
            <option value="4">גרוש בלי ילדים</option>
            <option value="5">גרוש עם ילדים</option>
          </select>
          <select name="location" required>
            <option value="">איזור מגורים</option>
            <option value="1">צפון</option>
            <option value="2">מרכז</option>
            <option value="3">שפלה</option>
            <option value="4">דרום</option>
          </select>
          <select name="home" required>
            <option value="">סוג בית</option>
            <option value="1">בית קרקע</option>
            <option value="2">דירה בבניין - ללא מרפסת</option>
            <option value="3">דירה בבניין - עם מרפסת</option>
            <option value="4">יחידת דיור</option>
          </select>
          <select name="family" required>
            <option value="">מס' ילדים בבית</option>
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
        <!-- new section -->
        <section class="section-Q">
          <select name="pets" required>
            <option value="">האם קיימים בעלי חיים נוספים בבית? במידה וכן אנא בחר את בעל החיים</option>
            <option value="1">לא</option>
            <option value="2">כלב</option>
            <option value="3">חתול</option>
            <option value="4">דגים</option>
            <option value="5">תוכי</option>
            <option value="6">אחר</option>
          </select>
          <select name="alonetime" required>
            <option value="">במידה ותצא לחופשה האם יש מי שידאג לכלב? האם אתה מרבה בנסיעות?</option>
            <option value="1">לא נוסע בכלל</option>
            <option value="2">נוסע מעט</option>
            <option value="3">נוסע בתדירות גבוהה</option>
          </select>
          <select name="firsttime" required>
            <option value="">האם אימצת כלב בעבר?</option>
            <option value="1">כן</option>
            <option value="2">לא</option>
          </select>
          <select name="reachout" required>
            <option value="">האם פנית בעבר לעמותה לאימוץ?</option>
            <option value="1">כן, אימצתי והכלב אצלי</option>
            <option value="2">כן, אימצתי והכלב נמסר / ננטש</option>
            <option value="3">כן, סורבתי לאימוץ</option>
            <option value="4">לא פניתי מעולם לאימוץ</option>
          </select>
        </section>
        <!-- new section -->
        <section class="section-Q">
          <select name="financial" required>
            <option value="">כיצד היית מגדיר את מצבך הכלכלי?</option>
            <option value="1">דל</option>
            <option value="2">ביניים</option>
            <option value="3">אמיד</option>
          </select>
          <select name="availability" required>
            <option value="">האם אתה חושב שיש לך מספיק זמן לטיפול בכלב?</option>
            <option value="1">כן</option>
            <option value="2">אולי</option>
            <option value="3">לא</option>
          </select>
          <select name="reason" required>
            <option value="">מה מטרת האימוץ? מדוע אתה מעוניין לאמץ?</option>
            <option value="1">מחפש חבר לחיים</option>
            <option value="2">מחפש כלב עבודה</option>
            <option value="3">מחפש כלב שמירה</option>
            <option value="4">הרבעה</option>
          </select>
          <select name="challenges" required>
            <option value="">האם אתה חושב שאתה מוכן לאתגרים הכרוכים בגידול הכלב?</option>
            <option value="1">כן</option>
            <option value="2">לא</option>
          </select>
        </section><br>
        <!-- new section -->
        <section class="section-Q">
          <select name="trainer" required>
            <option value="">מספר שעות העבודה של המטפל העיקרי בכלב</option>
            <option value="1">משרה מלאה</option>
            <option value="2">משרה חלקית</option>
            <option value="3">משרת אם</option>
            <option value="4">יותר ממשרה מלאה - שעות נוספות</option>
            <option value="5">משמרות</option>
          </select>
          <select name="longterm" required>
            <option value="">האם אתם מוכנים לטפל בכלב שלכם לטווח הארוך?</option>
            <option value="1">כן</option>
            <option value="2">לא</option>
          </select>
        </section><br>
        <button type="submit" name="q-submit">המשך</button>
      </form>
    </div>
  </main>
</body>
</html>
