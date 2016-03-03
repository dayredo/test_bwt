<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html>
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<meta name="viewport" content="width =device-width" />
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<header>
		<div class="header-line">
			<div class="wrapper">
				<div class="logo">
					<a href="/test_bwt"><span class="logo">b</span><span class="logo">w</span><span class="logo">t</span></a>
				
				</div>
			</div>
		</div>
		<div class="header-menu">
			<div class="wrapper">
				<div class="panel-menu">
					<?php Model::menu_items(); ?>
				</div>
					
					<div class="user-stat">
						<?php Model::logined(); ?>
					</div>
				
			</div>
		</div>
	</header>
	<div class="wrapper">
		<aside>
			
				<nav>
				<ul class="nav nav-pills nav-stacked">

					<li><a href="/test_bwt">Home</a></li>
					<li><a href="about">About</a></li>
					<li><a href="feedback">Feedback</a></li>
				</ul>
			</nav>
		</aside>
		<main class="content">
			<?php include 'application/views/' . $content; ?>
		</main>
	</div>
	<footer>
		<div class="footer-content">
			<div class="wrapper">
				<nav class="footer_menu">
					<ul>
						<li><a href="/test_bwt">Home</a></li>
						<li><a href="about">About</a></li>
						<li><a href="feedback">Feedback</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="footer-line">
			<div class="wrapper">
				<div class="footer-down">
					Developed by <a href="https//:vk.com/dayredo00one">Dayredo</a>
				</div>
				<div class="footer-down">
					<button class="up" onclick="up();"></button>
				</div>
				<div class="footer-down">
					 Test Task from Group BWT &copy; 2016
				</div>
			</div>
		</div>
	</footer>
</body>
<script src="jquery.inputmask.js"></script>
<script src="js/scripts.js"></script>
</html>