<?php
include_once 'header.php';
?>

    <?php
    echo "<h1>Hello, " . $_SESSION["usersFirstname"] . " " . $_SESSION["usersLastname"] . "</h1>";
    ?>
    <div style="height:800px"></div>

<?php
include_once 'footer.php';
?>

</body>
</html>