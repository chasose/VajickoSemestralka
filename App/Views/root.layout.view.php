<?php
/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <link rel="icon" href="../../public/images/logo.png">
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,600;0,700;1,300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/styl.css">
    <script src="../../public/js/script.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://kit.fontawesome.com/676f23cd61.js" crossorigin="anonymous"></script>
</head>
<body>
<section class="header">
    <nav>
        <?php if ($auth->isLogged()) { ?>
            <a href="?c=admin"><img src="../../public/images/logo.png" alt=""></a>
        <?php } else { ?>
            <a href="?c=home"><img src="../../public/images/logo.png" alt=""></a>
        <?php } ?>
        <div class="nav-links" id="nav-links">
            <i class="fa fa-times-circle" onclick="hideMenu()"></i>
            <ul>
                <li><a href="?c=posts">DOMOV</a></li>
                <li><a href="?c=offers">JEDALNICEK</a></li>
                <li><a href="?c=openingHours">OTVARACIE HODINY</a></li>
                <?php if ($auth->isLogged()) { ?>
                    <li><a href="?c=users&a=showAccoutInfo" style="color: white">UCET: <strong style="color: orange"><?= $auth->getLoggedUserName() ?></strong></a> </li>
                    <li><a href="?c=auth&a=logout" style="color: green">LOGOUT</a> </li>
                <?php } else { ?>
                    <li><a href="?c=auth&a=login" style="color: green">LOGIN</a></li>
                <?php } ?>
            </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
    </nav>

</section>
<div class="web-content">
    <?= $contentHTML ?>
</div>



<section class="footer m-0">
    <h4>O nas</h4>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
    <ul class="socials">
        <li><a href="https://www.instagram.com/"><i class="fa fa-instagram fa-2xl"></i></a></li>
        <li><a href="https://www.facebook.com/"><i class="fa fa-facebook fa-2xl"></i></a></li>
        <li><a href="https://twitter.com/"><i class="fa fa-twitter fa-2xl"></i></a></li>
        <li><a href="https://youtube.com/"><i class="fa fa-youtube fa-2xl"></i></a></li>
    </ul>

    <div class="footer-bottom">
        <p>copyright &copy;2022 PIZZA123. designed by me</p>
    </div>
</section>

<script type="text/javascript" src="../../public/js/script.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
