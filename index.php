<?php
    session_start();
    if (isset($_SESSION["usersId"]))
    {
        header("location: ../home.php");
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
    <link rel="stylesheet" href="/CSS/sign.css">
    <title>Social Network</title>
</head>
<body>
    <div class="container">
        <div class="row align-items-center" style="justify-content: center;">
            <div class="text-center" style="width:310px">
                <form class="form-signin" action="/Includes/login.inc.php" method="post">
                    <img class="mb-4" src="/Images/logo.png" alt="" width="200" height="200">
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <?php
                        require_once "Includes/signErrorMessages.inc.php";
                    ?>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                </form>
                <a href="/signup.php" class="btn btn-lg btn-secondary btn-block" style="margin-top:7px">Sign up</a>
            </div>
        </div>
    </div>

    <div style="height:50px"></div>

    <div class="jumbotron text-center" style="margin-bottom:0">
        <p>Made by<br>Estin Bramka</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>