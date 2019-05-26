<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Favorites</title>
        <link href="stylesheet.css" rel=stylesheet type="text/css"/>
    </head>
    <body>
        <main>
			<div class="wrapper-main">
				<h1>מועדפים</h1>
				<section class="section-default">
					<div class="profile">
						<?php
							session_start();
							require "includes/f.inc.php";
						?>
					</div>
				</section>
			</div>
        </main>
    </body>
	<footer>
       <small>2019 &copy; Copyright</small>
    </footer>
</html>
