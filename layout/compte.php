<?php
    session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="ecommerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="da">
        Bienvenue <?php echo $_SESSION['name'].''.$_SESSION['lastname'] ?>
    </div>
    <a href="logout.php">Déconnexion</a>
</body>
</html>