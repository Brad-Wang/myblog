<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>contact页面</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/contact.css">
	<!-- <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,300,600,500,900,700,100,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'> -->
	<script type="application/x-javascript"> addEventListener("load", function() { 
			setTimeout(hideURLbar, 0); }, 
			false); 
		function hideURLbar(){ 
			window.scrollTo(0,1); 
		} 
	</script>x
</head>
<body>
	<div id="nav">
		<div class="nav-menu-box">
			<ul class="nav-menu">
				<li><a class="scroll" href="index.php">HOME</a></li>
				<li><a class="scroll" href="#about">ABOUT</a></li>
				<li><a class="scroll" href="#services">SERVICES</a></li>
				<li><a class="scroll" href="#portfolio">PROTFOLIO</a></li> 
				<li><a class="scroll" href="#blog">BLOG</a></li>
				<li><a class="scroll" href="#contact">CONTACT</a></li>
			</ul>
			<div class="nav-menu-bg"></div>
			<span class="nav-icon-close"></span>
		</div>
		<span class="nav-icon-list"></span>
	</div>

	<div id="header">
		<img src="img/bg2.jpg" alt="背景" class="header-bg">
	</div>

	<div id="center">
		<form action="message/put_message" method="post">
			<div class="name">
				<label for="name">YOUR NAME:</label>
				<br>
				<input type="text" name="username" value="Enter your name here..." onfocus="this.value = ''">
			</div class="email">
			<div class="email">
				<label for="email">EMAIL:</label>
				<br>
				<input type="text" name="email" value="Email" onfocus="this.value = ''">
			</div>
			<div class="message">
				<label for="message">MESSAGE:</label>
				<br>
				<textarea type="message" name="content" value="Message" onfocus="this.value = ''">
				</textarea>
			</div>
			<input name="submit" type="submit" id="submit" value="Submit">			
		</form>
		<div id="address">
			<h2>ADDRESS</h2>
			<p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non</p>
			<p>1-25-2568-897</p>
			<p>mail@portfolio.com</p>
		</div>
	</div>

	<div id="footer"></div>

	<script src="js/jquery-1.11.3.js"></script>
	<script src="js/contact.js"></script>
</body>
</html>