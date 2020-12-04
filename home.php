<?php
include_once 'header.php';
?>

    <?php
    echo "<h1>Hello, " . $_SESSION["user_firstname"] . " " . $_SESSION["user_lastname"] . ", " . $_SESSION['login_details_id'] . "</h1>";
    ?>
    <div style="height:800px"></div>

<?php
include_once 'footer.php';
?>

</body>
</html>