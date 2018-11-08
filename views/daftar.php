<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"/>
    <link rel="stylesheet" href="/it-a/assets/css/daftar.css"/>
</head>
<body>
    <div id="left-side-overlay"></div>
    
    <div id="side-container">
        <div id="left-side">
            <div id="left-side-caption">
                <div class="left-side-item">
                    <i class="fa fa-fw fa-2x fa-user-plus"></i>
                    <span class="left-side-desc">Daftar</span>
                </div>
                <div class="left-side-item">
                    <i class="fa fa-fw fa-2x fa-search"></i>
                    <span class="left-side-desc">Cari kelas</span>
                </div>
                <div class="left-side-item">
                    <i class="fa fa-fw fa-2x fa-pencil"></i>
                    <span class="left-side-desc">Kerjakan ujian dan dapatkan skornya</span>
                </div>
            </div>
        </div>
        <div id="right-side">
            <div id="form-container">
                <div id="right-side-header">
                    <h2 id="right-side-title">Daftar</h2>
                </div>
                <form action="/it-a/daftar" method="post" id="form-wrapper">
                    <div class="form-row">
                        <label class="form-label" >Nama</label>
                        <input type="text" name="nama" class="form-input"/>
                    </div>
                    <div class="form-row">
                        <label class="form-label">Daftar sebagai</label>
                        <select id="daftar-sebagai" name="daftar_sebagai" class="form-input">
                            <option value="Mahasiswa">Mahasiswa</option>
                            <option value="Pengajar">Pengajar</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label class="form-label" id="user-id-label"></label>
                        <input class="form-input" name="user_id" type="number" id="user-name-input"/>
                    </div>
                    <div class="form-row">
                        <label class="form-label">Password</label>
                        <input type="password" name="user_password" class="form-input"/>
                    </div>
                    <div class="form-row">
                        <label class="form-label">No HP</label>
                        <input type="number" name="no_hp" class="form-input" />
                    </div>
                    <div class="form-row">
                        <button id="btn-daftar">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="/it-a/assets/js/daftar.js"></script>
</html>