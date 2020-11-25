<?php
    session_start();
    if (empty($_SESSION["usersId"]))
    {
        header("location: ../");
        exit();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="/CSS/button.css">
    <link rel="stylesheet" href="/CSS/chat.css">
    <script src="https://kit.fontawesome.com/39ba5b7d11.js" crossorigin="anonymous"></script>
    <title>Social Network</title>
</head>
<body>

<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light py-sm-1" id="navigationBar">
    <a class="navbar-brand" href="/">
        <img src="/Images/logoMinimal.svg" width="38" height="38" alt="" loading="lazy" class="px-sm-1 border border-dark rounded-circle">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
            <div class="ml-sm-n2 border border-primary rounded-pill" style="position:relative; width:272px; height:40px;">
                <i class="fas fa-search fa-lg" style="position:absolute; left:11px;top:13px; color:#99abb6;"></i>
                <input class="form-control border-white rounded-pill" style="width:230px; position:absolute; left:40px;" type="search" placeholder="Search" aria-label="Search">
            </div>
            <button class="btn btn-outline-success my-2 my-sm-0 d-none" type="submit">Search</button>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown mr-sm-2">
                <a class="nav-link dropdown-toggle dropdown-toggle-estin btn btn-estin rounded-circle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-comment fa-lg" style="color:white;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-estin" aria-labelledby="navbarDropdown">
                    <h1 class="dropdown-header" style="font-size: 1.6rem;">Messages</h1>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown mr-sm-2">
                <a class="nav-link dropdown-toggle dropdown-toggle-estin btn btn-estin rounded-circle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-lg" style="color:white;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-estin" aria-labelledby="navbarDropdown">
                    <h1 class="dropdown-header" style="font-size: 1.6rem;">Notifications</h1>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item mr-sm-2">
                <a class="nav-link btn btn-estin rounded-circle" href="/Includes/logout.inc.php">
                    <i class="fas fa-sign-out-alt fa-lg" style="color:white;"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div style="height:56px" id="navbarOffset"></div>

<?php
include_once 'chat.php';
?>

<div id="main_layer">