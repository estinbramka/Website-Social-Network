<?php
include_once 'header.php';
?>

    <?php
    echo "<br><br><br><h1>Hello, " . $_SESSION["usersFirstname"] . " " . $_SESSION["usersLastname"] . "</h1>";
    ?>

<?php
include_once 'footer.php';
?>