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
      <section class="section-default">
        <h1>התחברות</h1>
        <form action="includes/login.inc.php" method="post">
          <input type="text" name="email" placeholder="שם משתמש" autofocus required>
          <input type="password" name="password" placeholder="סיסמא" required>
          <button type="submit" name="login-submit">התחבר</button>
        </form>
      </section>
    </div>
  </main>
</body>
<footer>
  <small>2019 &copy; Copyright</small>
</footer>
</html>
