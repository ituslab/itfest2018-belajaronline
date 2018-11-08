<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/it-a/assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="/it-a/assets/css/index.css">
	<title>BelajarOnline</title>
</head>
<body>

<!-- navbar -->
<div class="navbar-fixed">
	<nav style="padding: 0px 15px;" class="light-blue darken-1">
		<div class="nav-wrapper light-blue darken-1">
			<a href="#"  class="sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
			<a href="#!" class="brand-logo font-title animasi-in-top">BelajarOnline</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="#modal1" class="waves-effect waves-light modal-trigger animasi-in-top">Login</a></li>
				<li><a href="#daftar" class="waves-effect waves-light animasi-in-top">Daftar</a></li>
				<li><a href="#fasilitas" class="waves-effect waves-light animasi-in-top">Fasilitas</a></li>
				<li><a href="#about" class="waves-effect waves-light animasi-in-top">About</a></li>
				<li><a href="#sponsor" class="waves-effect waves-light animasi-in-top">Sponsors</a></li>
			</ul>
		</div>
	</nav>
</div>
	<ul class="sidenav" id="mobile-links">
		<li><center class="light-blue darken-1 menu-style">Menu</center></li>
		<li><a href="#modal1" class="waves-effect waves-light sidenav-close modal-trigger">Login</a></li>
		<li><a href="#daftar" class="waves-effect waves-light sidenav-close">Daftar</a></li>
		<li><a href="#fasilitas" class="waves-effect waves-light sidenav-close">Fasilitas</a></li>
		<li><a href="#about" class="waves-effect waves-light sidenav-close">About</a></li>
		<li><a href="#sponsor" class="waves-effect waves-light sidenav-close">Sponsors</a></li>
	</ul>                 
<!-- navbar -->



	
<!-- modal -->
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
    	  <div class="row no-margin">
		    <form class="col s12" method="POST" action="/it-a/login">
		      <div class="row">	
		      	<label class="label-size"><center>Login</center></label>
		        <div class="input-field col s12">
		          	<input id="username" name="username" type="text" class="validate">
		          	<label for="username" >Username</label>
		        </div>
		        <div class="input-field col s12">
		          	<input id="password" name="password" type="password" class="validate">
          			<label for="password">Password</label>
				</div>
				<div class="input-field col s12">
					<select name="login_sebagai">
						<option value="siswa">Mahasiswa</option>
						<option value="pengajar">Pengajar</option>
					</select>
					<label>Login sebagai</label>
				</div>
			  </div>
		      <div class="modal-footer">
      			<a class="modal-close waves-effect waves-light btn-flat">CANCEL</a>
      			<button class="modal-close waves-effect waves-light btn-flat">LOGIN</button>
		      </div>
		    </form>
		  </div>
    </div>
  </div>
<!-- modal -->

<!-- paralax -->
	<div class="parallax-container" id="daftar">
		<div class="title-page center">
			<p class="font-size animasi-in-zoom">Welcome To Belajar Online</p>
			<p class="font-size-2 animasi-in-zoom">Belajar Online adalah solusi belajar untuk segala kesulitan kamu di kampus. Matakuliah tersedia untuk seluruh mahasiswa dengan pengajar berpengalaman serta dapat diakses dimanapun.</p>
			<a href="daftar.php" class="waves-effect waves-light btn-large red hover-animasi">Daftar Sekarang</a>
		</div>
      	<div class="parallax"><img src="/it-a/assets/img/background-2.jpg"></div>
    </div>
    <div class="section white" id="fasilitas">
      	<div class="row container">
       		<h2 class="header center top-title">Fasilitas</h2>
       		<!-- fitur -->
				<div class="row">
					<div class="col s12 m4">
						<div class="center">
       						<i class="material-icons medium">flash_on</i>
						</div>
						<div class="left">	
       						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       						tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="col s12 m4">
						<div class="center">
       						<i class="material-icons medium">flash_on</i>
						</div>
						<div class="left">	
       						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       						tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="col s12 m4">
						<div class="center">
       						<i class="material-icons medium">flash_on</i>
						</div>
						<div class="left">	
       						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       						tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
							<div class="row container">
       		<h2 class="header center top-title">Support by</h2>
    		<div class="row">
					<div class="col s12 m4">
						<div class="center">
							<a href="http://polsri.ac.id">
							<img src="/it-a/assets/img/logo1.png" class="img-sponsor">
							</a>
						</div>
					</div>
					<div class="col s12 m4">
						<div class="center">
							<a href="http://itfest-mipolsri.com">
							<img src="/it-a/assets/img/logo2.png" class="img-sponsor">
							</a>
						</div>
					</div>
					<div class="col s12 m4">
						<div class="center">
							<a href="http://itfest-mipolsri.com">
							<img src="/it-a/assets/img/logo3.jpg" class="img-sponsor">
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- fitur -->
      	</div>
    </div>
    <div class="parallax-container" id="about">
    	<!-- about -->
    <div class="section color-white">
      	<div class="row container">
       		<h2 class="header center top-title">About Me</h2>
    		<div class="row">
					<div class="col s12 m6">
						<div class="center">
       						<i class="fa fa-user medium"></i>
						</div>
						<div class="left">	
       						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       						tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="col s12 m6">
						<div class="center">
       						<i class="fa fa-users medium"></i>
						</div>
						<div class="left">	
       						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
       						tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
    	<!-- about -->
  		<div class="parallax"><img src="/it-a/assets/img/background.jpg"></div>
    </div>
<!-- paralax -->

<!-- sponsor -->
    <div class="section white" id="sponsor">
      	<div class="row container">
       		<h2 class="header center top-title">Sponsors</h2>
				<div class="row">
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/1.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/2.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/3.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/4.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/5.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/6.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/7.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/8.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/9.jpeg" class="img-sponsor">
       					</div>
					</div>
					<div class="col s12 m3">
						<div class="center">
							<img src="/it-a/assets/img/10.jpeg" class="img-sponsor">
       					</div>
					</div>
				</div>
	      	</div>
	    </div>
<!-- sponsor -->

<!-- floating button -->
	<div class="fixed-action-btn">
		<a class="btn-floating btn-large red">
	    	<i class="large material-icons">share</i>
	  	</a>
	  	<ul>
	    	<li><a class="btn-floating btn-large blue" href="https://twitter.com/home?status=https%3A//materializecss.com/"><i class="fa fa-twitter"></i></a></li>
	  		<li><a class="btn-floating btn-large green accent-3" href="https://api.whatsapp.com/send?&text=https://materializecss.com/"><i class="fa fa-whatsapp"></i></a></li>
	    	<li><a class="btn-floating btn-large red accent-3" href="https://api.instagram.com/itpolsri"><i class="fa fa-instagram"></i></a></li>
	    	<li><a class="btn-floating btn-large blue darken-4" href="https://www.facebook.com/sharer/sharer.php?u=https%3A//materializecss.com/"><i class="fa fa-facebook"></i></a></li>
	  	</ul>
	</div>
<!-- floating button -->

<!-- footer -->
        <footer class="page-footer red darken-2">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Lokasi Kami</h5>
                <p class="grey-text text-lighten-4">Jl. Srijaya Negara Bukit Besar, Bukit Lama, Ilir Barat I, Bukit Lama, Ilir Bar. I, Kota Palembang, Sumatera Selatan 30139</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Didukung Oleh</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://polsri.ac.id">POLSRI</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://itfest-mipolsri.com">IT FEST</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://itfest-mipolsri.com">HMJ MI</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2018 Copyright
            </div>
          </div>
        </footer>
<!-- footer -->

<script src="/it-a/assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
<script src="/it-a/assets/js/index.js"></script>
   
</body>
</html>

