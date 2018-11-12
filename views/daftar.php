<!DOCTYPE html>
<html>
<head>
	<title>BelajarOnline</title>
</head>
	<?php include_once __DIR__ . '/includes/top.php'; ?>
    <link rel="stylesheet" href="/it-a/assets/css/daftar.css"/>
<body>

 <div class="row margin-nol height-daftar">
    <div class="col s12 m6 height-left">
    	<div class="margin-left-side">
    	<a href="#daftar-form">
	    	<div class="color-white fa-2x animasi-in-zoom">
				<i class="fa fa-fw fa-user-plus fa-2x"></i>
				<span class="left-side-desc">Daftar Sekarang</span>
			</div>
		</a>
		<a href="#daftar-form">
		<div class="color-white fa-2x animasi-in-zoom-1">
			<i class="fa fa-fw fa-search fa-2x"></i>
			<span class="left-side-desc">Pilih Matakuliah</span>
		</div>
		</a>
    	<a href="#daftar-form">
		<div class="color-white fa-2x animasi-in-zoom-2">
			<i class="fas fa-pen fa-2x fa-fw"></i>
			<span class="left-side-desc">Kerjakan soal dan dapatkan nilai</span>
		</div>
		</a>
    	</div>	
    </div>
<!-- form daftar -->
    <div class="col s12 m6 margin-form" id="daftar-form">	
    <form method="POST" id="form-daftar" action="/it-a/daftar">
	    <div class="section white width-daftar border-form" >
	        <div class="title-form">Daftar</div>
		        <div class="row margin-nol">
			        <div class="input-field col s12">
			          <input id="nama" name="nama" type="text" class="validate">
					  <label for="nama">Nama Anda</label>
					  <div id="error_nama"></div>
			        </div>
		            <div class="form-row">
		                <label class="form-label">Daftar sebagai</label>
		                <select id="daftar-sebagai" name="daftar_sebagai" class="form-input">
		                    <option value="Mahasiswa">Mahasiswa</option>
		                    <option value="Pengajar">Pengajar</option>
						</select>
						<div id="error_daftar_sebagai"></div>
		            </div>
			        <div class="input-field col s12">
			          <input id="user-name-input" name="user_id" type="text" class="validate">
					  <label for="user-name-input" id="user-id-label"></label>
					  <div id="error_user_id"></div>
			        </div>
			        <div class="input-field col s12">
			          <input id="no_hp" type="tel" name="no_hp" class="validate">
					  <label for="no_hp">Nomor Handphone</label>
					  <div id="error_no_hp"></div>
			        </div>
			        <div class="input-field col s12">
			          <input id="password" type="password" name="user_password" class="validate">
					  <label for="password">Password</label>
					  <div id="error_user_password"></div>
			        </div>
			        <div class="input-field col s12">
			          <input id="email" name="email" type="email" class="validate">
					  <label for="email">Email</label>
					  <div id="error_email"></div>
			        </div>
	        	    <label class="margin-gender">
				      <input class="with-gap" name="gender" type="radio"/>
				      <span>Laki - Laki</span>
				      <input class="with-gap" name="gender" type="radio" />
				      <span>Perempuan</span>
				    </label>
			        <div class="input-field col s12">
			          <input id="alamat" name="alamat" type="text" class="validate">
					  <label for="alamat">Alamat</label>
					  <div id="error_alamat"></div>
			        </div>
			    </div>
			    <div class="center">
				    <a href="landing-page.php" class="waves-effect waves-light btn margin-btn">Batal</a>
				    <button class="waves-effect waves-light btn">Daftar</button>				    	
			    </div>        
	    	</div>
		</form>
	</div>
<!-- form daftar -->
	
</div>


</body>
	<?php include_once __DIR__ . '/includes/bottom.php'; ?>
	<script type="text/javascript" src="/it-a/assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="/it-a/assets/js/daftar-new.js"></script>
</html>