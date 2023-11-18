<?php 
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>

<header>
    <img src="images/logosite.png" alt="logo do site" id="logo">
    <h1>Curabitur</h1>
    <nav class="menu">
        <ul>
            <li <?php if($currentPage == 'home'){echo 'class="active"';}else{echo 'class=""';} ?>><a href="home.php">Home</a></li>
            <li <?php if($currentPage == 'about'){echo 'class="active"';}else{echo 'class=""';} ?>><a href="about.php">Sobre nós</a></li>
            <li <?php if($currentPage == 'forum'){echo 'class="active"';}else{echo 'class=""';} ?>><a href="forum.php">Fórum</a></li>
            <li <?php if($currentPage == 'contact'){echo 'class="active"';}else{echo 'class=""';} ?>><a href="contact.php">Contato</a></li>
        </ul>
    </nav>
</header>