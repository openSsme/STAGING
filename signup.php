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
