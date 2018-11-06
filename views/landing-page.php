<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BelajarOnline</title>
	<?php include_once __DIR__ . '/includes/top.php';?>
</head>
<body>

<!-- navbar -->
	<nav style="padding: 0px 15px;" class="light-blue darken-1">
		<div class="nav-wrapper light-blue darken-1">
			<a href="#!" class="brand-logo" style="font-size: 22px;">BelajarOnline.Com</a>
			<a href="#"  class="sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="sass.html">Login</a></li>
				<li><a href="/it-a/daftar">Daftar</a></li>
				<li><a href="badges.html">About</a></li>
			</ul>
		</div>
	</nav>

	<ul class="sidenav" id="mobile-links">
		<li><center class="light-blue darken-1"><b>Menu</b></center></li>
		<li><a href="sass.html">Login</a></li>
		<li><a href="badges.html">Daftar</a></li>
		<li><a href="badges.html">About</a></li>
	</ul>                 
<!-- navbar -->
<!-- paralax -->
	<div class="parallax-container" style="height: 600px;">
      	<div class="parallax"><img src="assets/img/background.jpg"></div>
    </div>
    <div class="section white">
      	<div class="row container">
       		<h2 class="header">Parallax</h2>
        	<p class="grey-text text-darken-3 lighten-3">Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.</p>
      	</div>
    </div>
    <div class="parallax-container">
  		<div class="parallax"><img src="images/parallax2.jpg"></div>
    </div>
<!-- paralax -->
<!-- floating button -->
	<div class="fixed-action-btn">
		<a class="btn-floating btn-large red">
	    	<i class="large material-icons">share</i>
	  	</a>
	  	<ul>
	    	<li><a class="btn-floating btn-large red accent-3"><i class="fa fa-instagram"></i></a></li>
	    	<li><a class="btn-floating btn-large blue darken-4"><i class="fa fa-facebook"></i></a></li>
	    	<li><a class="btn-floating btn-large green accent-3"><i class="fa fa-whatsapp"></i></a></li>
	    	<li><a class="btn-floating btn-large blue"><i class="fa fa-twitter"></i></a></li>
	  	</ul>
	</div>
<!-- floating button -->

<?php include_once __DIR__ . '/includes/bottom.php';?>
<script src="assets/js/Index.js"></script>
   
</body>
</html>

