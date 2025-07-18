<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">

    <title>In 'N Out</title>
</head>
<body>
<header class="header">
    <div class="logo">
        <i class="icofont-travelling mr-2"></i>
        <span class="font-weight-light">In</span>
        <span class="font-weight-bold mx-1">N'</span>
        <span class="font-weight-light">Out</span>
        <i class="icofont-runner-alt-1 ml-2"></i>
    </div>
    <div class="menu-toggle mx-3">
        <i class="icofont-navigation-menu" id="menu"></i>
    </div>
    <div class="spacer"></div>
    <div class="dropdown mr-2">
        <div class="dropdown-button">
            <span class="ml-2"><?=$_SESSION["user"]->name?></span>
            <i class="icofont-simple-down mx-2"></i>
        </div>
        <div class="dropdown-content">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="logout.php">
                        <i class="icofont-logout mr-2"></i>Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>

</header>
