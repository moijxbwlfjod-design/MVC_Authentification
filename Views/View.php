<?php 
session_start();
if(!isset($_SESSION["name"])){
    header("location: ../Public/register");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="card">
        <?php 
            echo "Welcome " . $_SESSION["name"];
        ?>
    </div>
    <form action="../Controllers/AuthController.php" method="POST">
        <button name="logout-btn" type="submit">Log Out</button>
    </form>

</body>
</html>