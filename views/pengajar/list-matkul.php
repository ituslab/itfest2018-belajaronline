<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List matakuliah</title>
    <?php 
        loadTop();
        loadCSS("dashboard-new.css");
    ?>
</head>
<body>
    <!-- List Matakuliah -->
    <div class="row height-soal">
        <div class="center padding-collapsible">
          <h5>List Matakuliah</h5>
        </div>
        <div class="col s12 m12">
          <ul class="collapsible">
            <li class="active">
              <div class="collapsible-header"><i class="fas fa-swatchbook icon-color"></i>Matakuliah 1</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="fas fa-swatchbook icon-color"></i>Matakuliah 2</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
              <div class="collapsible-header"><i class="fas fa-swatchbook icon-color"></i>Matakuliah 3</div>
              <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
          </ul>
        </div>
    </div>
    <!-- List Matakuliah -->
</body>
    <?php 
        loadBottom(); 
        loadJS("dashboard-new.js");
    ?>
</html>