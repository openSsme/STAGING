<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>SignUp</title>
  <link href="stylesheet.css" rel=stylesheet type="text/css"/>
</head>
<body>
  <main>
    <div class="wrapper-main">
      <section class="section-default">
        <h1>משתמש חדש</h1>
        <form class="signup" action="includes/signup.inc.php" method="post">
          <input type="text" name="name" placeholder="שם" autofocus required>
          <input type="text" name="lastname" placeholder="שם משפחה" required>
          <input type="text" name="age" placeholder="גיל" required>
          <input type="text" name="phone" placeholder="טלפון" required>
          <input type="text" name="email" placeholder="אימייל" required>
          <input type="password" name="password" placeholder="סיסמא" required>
          <?php
          $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          if(strpos($url, "error=invalidname") == true){
            echo "<p class='error'>שם פרטי לא תקין</p>";
          }
          elseif(strpos($url, "error=invalidlastname") == true){
            echo "<p class='error'>שם משפחה לא תקין</p>";
          }
          elseif(strpos($url, "error=invalidage") == true){
            echo "<p class='error'>גיל לא תקין</p>";
          }
          elseif(strpos($url, "error=restriction") == true){
            echo "<p class='error'>גיל לא מורשה</p>";
          }
          elseif(strpos($url, "error=invalidphone") == true){
            echo "<p class='error'>מספר טלפון לא תקין</p>";
          }
          elseif(strpos($url, "error=invalidemail") == true){
            echo "<p class='error'>כתובת אימייל לא תקינה</p>";
          }
          elseif(strpos($url, "error=invalidpass") == true){
            echo "<p class='error'>סיסמה לא תקינה. יש להשתמש באותיות באנגלית ומספרים בלבד ועד 8 תווים</p>";
          }
          ?>
          <button type="submit" name="form-submit">הרשמה</button>
        </form>
      </section>
    </div>
  </main>
</body>
<footer>
  <small>2019 &copy; Copyright</small>
</footer>
</html>
