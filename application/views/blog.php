<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>博客页面</title>
	<!-- <base href="<?php echo site_url(); ?>"> -->
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/blog.css">
	<!-- <link href='http://fonts.googleapis.com/css?family=Raleway:200,400,300,600,500,900,700,100,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'> -->
	<script type="application/x-javascript"> addEventListener("load", function() { 
			setTimeout(hideURLbar, 0); }, 
			false); 
		function hideURLbar(){ 
			window.scrollTo(0,1); 
		} 
	</script>
</head>
<body>
	<div id="nav">
		<div class="nav-menu-box">
			<ul class="nav-menu">
				<li><a class="scroll" href="index.html">HOME</a></li>
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
	<div id="warp">
		<div id="content">
		<img src="<?php echo $blog -> blog_photo; ?>" alt="">
		<p><?php echo $blog -> content; ?></p>
		</div>
		<div id="post">
		<h5>Written by <?php echo $blog -> admin_name; ?></h5>
		<img src="img/avatar.png" alt="">
		<p>View all posts by: <?php echo $blog -> admin_name; ?></p>
		</div>


		<div id="comment">
			<div class="comment-header">
				<p>所有评论</p>
			</div>
			<div class="comment-bottom">
				<div class="comment-bottom-top">

				</div>
			</div>
		</div>


		<form action="blog/save_comment">
			<input type="hidden" name="blog_id" value="<?php echo $blog -> blog_id; ?>">
		<h3>ADD NEW COMMENT</h3>
		<label for="">Name</label>
		<br>
		<input type="text" name="com_name">
		<br>
		<label for="">Email</label>
		<br>
		<input type="text" name="email">
		<br>
		<label for="">Website</label>
		<br>
		<input type="text" name="website">
		<br>
		<label for="">Subject</label>
		<br>
		<textarea name="subject" id="" cols="80" rows="10"></textarea>
		<br>
		<input type="submit" value="Submit Comment" id="submit">
		</form>
	</div>
	

	<script src="js/jquery-1.11.3.js"></script>
	<script src="js/contact.js"></script>
</body>
</html>