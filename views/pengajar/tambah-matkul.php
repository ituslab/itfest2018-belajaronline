<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah matkul</title>
    <?php 
        loadTop();
        loadCSS("dashboard.override.css");
    ?>
</head>
<body>

    <?php
        loadPengajarNavbar();
    ?>


    <div class="my-sidebar-right">
        <div class="my-row">
            <form class="card">
                <div class="card-content">
                    <span class="card-title">Tambah Matakuliah</span>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <i class="material-icons prefix">library_books</i>
                            <input id="matkul_nama" name="matkul_nama" type="text" class="validate"/>
                            <label for="matkul_nama">Nama matakuliah</label>
                        </div>
                    </div>
                </div>
                <div class="card-action grey lighten-5">
                    <button class="btn waves-effect waves-light my-btn-bgcolor" type="submit" name="action">Submit data
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    
</body>
    <?php 
        loadBottom();
        loadJS("dashboard.override.js");
    ?>
</html>