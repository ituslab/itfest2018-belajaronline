<?php
    use Felis\Silvestris\Session;
    $userIdSession = Session::get("user_id");
    $loginSebagai = Session::get("login_sebagai");
?>

<nav id="left-nav">
    <div id="left-nav-header">
        Menu
    </div>
    <ul id="left-nav-container">
        <?php if($loginSebagai === "siswa") {?>
            <li class="left-nav-item">
               <a href="/it-a/list-pengajar">List pengajar</a> 
            </li>
            <li class="left-nav-item">
               <a href="/it-a/dashboard">Profil</a> 
            </li>
        <?php } else if ($loginSebagai === "pengajar") { ?>
            <li class="left-nav-item">
                <a href="/it-a/buat-soal">
                    Buat soal
                </a>
            </li>
            <li class="left-nav-item">
                <a href="/it-a/mata-kuliah">List mata kuliah</a>
            </li>
            <li class="left-nav-item">
               <a href="/it-a/dashboard">Profil</a> 
            </li>
        <?php }?>

    

    </ul>
    
    <?php if ($userIdSession) {?>
        <div id="left-nav-signout">
            <a href="/it-a/signout">Sign out</a>
        </div>
    <?php }?>

</nav>