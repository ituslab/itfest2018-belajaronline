<!DOCTYPE html>
<html>
<head>	
	<?php 

include_once __DIR__ . '/includes/top.php'; ?>
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
				<li><a href="#fasilitas" class="waves-effect waves-light animasi-in-top">Fitur</a></li>
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
		<li><a href="#fasilitas" class="waves-effect waves-light sidenav-close">Fitur</a></li>
		<li><a href="#about" class="waves-effect waves-light sidenav-close">About</a></li>
		<li><a href="#sponsor" class="waves-effect waves-light sidenav-close">Sponsors</a></li>
	</ul>                 
<!-- navbar -->

<!-- modal -->
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
    	  <div class="row no-margin">
		    <form id="form-login" class="col s12" method="POST" action="/it-a/login">
		      <div class="row">	
				<label class="label-size"><center>Login</center></label>
				
				<?php if (isset($_SESSION['login_gagal'])) {?>
					<div class="left-align red-text login-gagal-container">
						<?= $_SESSION['login_gagal']?>
					</div>
				<?php }?>


		        <div class="input-field col s12">
		          	<input id="username" name="username" type="text" class="validate">
					<label for="username" >NIM or NIP</label>
					<div id="error_username"></div>
		        </div>
		        <div class="input-field col s12">
		          	<input id="password" name="password" type="password" class="validate">
					<label for="password">Password</label>
					<div id="error_password"></div>
				</div>
				<div class="input-field col s12">
					<select name="login_sebagai">
						<option value="siswa">Mahasiswa</option>
						<option value="pengajar">Pengajar</option>
					</select>
				</div>
			  </div>
		      <div class="modal-footer">
      			<a class="modal-close waves-effect waves-light btn-flat">CANCEL</a>
				<button class="waves-effect waves-light btn-flat">LOGIN</button>
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
			<a href="/it-a/daftar" class="waves-effect waves-light btn-large red hover-animasi">Daftar Sekarang</a>
		</div>
      	<div class="parallax"><img src="/it-a/assets/img/background-2.jpg"></div>
    </div>
    <div class="section white" id="fasilitas">
      	<div class="row container">
       		<h2 class="header center top-title">Fitur Kami</h2>
       		<!-- fitur -->
				<div class="row">
					<div class="col s12 m4 margin-icon-top">
						<div class="center">
       						<i class="fas fa-book-open medium fa-fw"></i>
						</div>
						<div class="center">	
       						<p>Buat soal pilihan ganda atau Essay</p>
						</div>
					</div>
					<div class="col s12 m4 margin-icon-top">
						<div class="center">
       						<i class="fa fa-search medium fa-fw"></i>
						</div>
						<div class="center">	
       						<p>Cari Matakuliah anda</p>
						</div>
					</div>
					<div class="col s12 m4 margin-icon-top">
						<div class="center">
       						<i class="fas fa-pen medium fa-fw"></i>
						</div>
						<div class="center">	
       						<p>Kerjakan dan dapatkan hasilnya</p>
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
    <div class="parallax-container height-paralax-container" id="about">
    	<!-- about -->
    <div class="section color-white">
      	<div class="row container">
       		<h2 class="header center top-title">About us</h2>
    		<div class="row">
					<div class="col s12 m6 margin-m6">
						<div class="center">
							<img src="/it-a/assets/img/foto2.jpg" class="img-about">
						</div>
						<div class="center">
							<a class="btn-floating btn-medium green accent-3 padding-sg" href="https://api.whatsapp.com/send?phone=+6282179400816&text=Hai%20Arief"><i class="fab fa-whatsapp"></i></a>
	    					<a class="btn-floating btn-medium grey darken-4" href="https://github.com/ariefkahfi"><i class="fab fa-github"></i></a><br>
	    					<p>Arief Al-Kahfi Verdana<br>
       						Full Stack Developer</p>
						</div>
					</div>
					<div class="col s12 m6 margin-m6">
						<div class="center">
							<img src="/it-a/assets/img/foto5.jpg" class="img-about">
						</div>
						<div class="center">
							<a class="btn-floating btn-medium green accent-3 padding-sg" href="https://api.whatsapp.com/send?phone=+6282311695444&text=Hai%20Aji"><i class="fab fa-whatsapp"></i></a>
	    					<a class="btn-floating btn-medium red accent-3" href="https://api.instagram.com/aji.prasetyoo.5"><i class="fab fa-instagram"></i></a><br>

	    					<p>Aji Prasetyo<br>
       						Front End Developer</p>
						</div>
					</div>
					<div class="col s12 m4 margin-m6">
						<div class="center">
							<img src="/it-a/assets/img/foto1.jpg" class="img-about">
						</div>
						<div class="center">
							<a class="btn-floating btn-medium green accent-3 padding-sg" href="https://api.whatsapp.com/send?phone=+6281271377018&text=Hai%20Sutan"><i class="fab fa-whatsapp"></i></a>
	    					<a class="btn-floating btn-medium red accent-3" href="https://api.instagram.com/sutan_gnst"><i class="fab fa-instagram"></i></a><br>

	    					<p>Sutan Gading Fadilah N<br>
       						Full Stack Developer</p>
						</div>
					</div>
					<div class="col s12 m4 margin-m6">
						<div class="center">
							<img src="/it-a/assets/img/foto3.jpg" class="img-about">
						</div>
						<div class="center">
							<a class="btn-floating btn-medium grey darken-4 padding-sg" href="https://github.com/zzcomzz"><i class="fab fa-github"></i></a>
	    					<a class="btn-floating btn-medium red accent-3" href="https://api.instagram.com/irvref02"><i class="fab fa-instagram"></i></a><br>

	    					<p>M. Irvan Refnaldi<br>
       						JavaScript Developer</p>
						</div>
					</div>
					<div class="col s12 m4 margin-m6">
						<div class="center">
							<img src="/it-a/assets/img/foto6.jpg" class="img-about">
						</div>
						<div class="center">
							<a class="btn-floating btn-medium green accent-3 padding-sg" href="https://api.whatsapp.com/send?phone=+6285269574522&text=Hai%20Jian"><i class="fab fa-whatsapp"></i></a>
	    					<a class="btn-floating btn-medium red accent-3" href="https://api.instagram.com/Jian.malik69"><i class="fab fa-instagram"></i></a><br>

	    					<p>Jian Malik Hidayat<br>
       						Network Engineer</p>
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
	    	<li><a class="btn-floating btn-large blue" href="https://twitter.com/home?status=https%3A//materializecss.com/"><i class="fab fa-twitter"></i></a></li>
	  		<li><a class="btn-floating btn-large green accent-3" href="https://api.whatsapp.com/send?&text=https://materializecss.com/"><i class="fab fa-whatsapp"></i></a></li>
	    	<li><a class="btn-floating btn-large red accent-3" href="https://api.instagram.com/itpolsri"><i class="fab fa-instagram"></i></a></li>
	    	<li><a class="btn-floating btn-large blue darken-4" href="https://www.facebook.com/sharer/sharer.php?u=https%3A//materializecss.com/"><i class="fab fa-facebook-f"></i></a></li>
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
                  <li><a class="grey-text text-lighten-3" href="http://itpolsri.org">IT - POLSRI</a></li>
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
<?php include_once __DIR__ . '/includes/bottom.php'; ?>
	<script type="text/javascript" src="/it-a/assets/js/jquery.validate.min.js"></script>
	<script src="/it-a/assets/js/index.js"></script>
	<?php if (isset($_SESSION['login_gagal'])) {?>
		<script type="text/javascript">
			$(document).ready(function(){
				var modalInstance = M.Modal.getInstance(document.getElementById('modal1'));
				modalInstance.open();
			});
		</script>
	<?php }?>
</body>
</html>

