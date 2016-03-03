
<html>
<head>
	<meta name="viewport" content="width =device-width" />
	<link rel="stylesheet" href="css/style.css">
	<title></title>
</head>
<body>
	<header>
		<div class="header-line">
			<div class="wrapper">
				<div class="line-header">
					sdjhfjsdhfkjshdfk jsdf jkhsdkfjh skdjfh skfdj
				</div>
				<div class="line-header">
					<div class="user-stat">
						<?php Model_checking_logined::return_logined(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="header-menu">
			<div class="wrapper">
				<div class="logo">
					
				</div>
				<div class="menu">
					<nav>
						<ul>
							<li><a href="">home</a></li>
								<?php Model_checking_logined::return_menu_item(); ?>
							<li><a href="">Settings</a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
							<li><a href=""></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	<div class="wrapper">
		<aside>
			<div class="widget">
				<h2 class="widget">
					Serach
				</h2>
				<div class="body-widget"></div>

				<h2 class="widget">
					last vacnsy
				</h2>
				<div class="body-widget"></div>
			
				<h2 class="widget">
					Last resume
				</h2>
				<div class="body-widget"></div>
				
				<h2 class="widget">
					Last resume
				</h2>
				<div class="body-widget"></div>
				
				<h2 class="widget">
					calendar
				</h2>
				<div class="body-widget"></div>

				<h2 class="widget">
					Tag Cloud
				</h2>
				<div class="body-widget"></div>
			</div>
		</aside>
		<main class="content">
			<?php include 'application/views/' . $content; ?>
		</main>
	</div>
	<footer>
		<div class="footer-content">
			<div class="wrapper"></div>
		</div>
		<div class="footer-line">
			<div class="wrapper">
				<div class="direct">
					Direct by <a href="https//:vk.com/dayredo00one">Dayredo</a>
				</div>
				<div class="up">
					<button class="up"></button>
				</div>
				<div class="copy">
					Copyright @ 2015 All Rights Reserved
				</div>
			</div>
		</div>
	</footer>
</body>
</html>