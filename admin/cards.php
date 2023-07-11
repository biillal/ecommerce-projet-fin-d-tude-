<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="cerdbox">
                <div class="card">
                    
                    <div class="search">
                        <div class="numbers">
                        <?php
                        $server="localhost";
                        $user="root";
                        $psd="1234567890";
                        $dbname="e-commerce";
                        $conn=mysqli_connect($server,$user,$psd,$dbname)
                        or die ("you have some erreurs in your connection ");

                        $query= "SELECT id_admin FROM admin ORDER BY id_admin ";
                        $query_adm = mysqli_query($conn,$query);
                        $row = mysqli_num_rows($query_adm);
                        echo '<h3>' .$row. '</h3>';

                        ?>
                        </div>
                        <div class="cardname">Admin</div>

                    </div>
                    <div class="iconbox">
                        <i class="fa-solid fa-user"></i>
                    </div>
                </div>

                <div class="card">
                
                    <div class="search">
                        <div class="numbers">
                        <?php
                        $server="localhost";
                        $user="root";
                        $psd="1234567890";
                        $dbname="e-commerce";
                        $conn=mysqli_connect($server,$user,$psd,$dbname)
                        or die ("you have some erreurs in your connection ");

                        $query= "SELECT id FROM regestre ORDER BY id ";
                        $query_usr = mysqli_query($conn,$query);
                        $row = mysqli_num_rows($query_usr);
                        echo '<h3>' .$row. '</h3>';

                        ?>
                        </div>
                        <div class="cardname">Personnes</div>

                    </div>
                    <div class="iconbox">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                
                <div class="search">
                    <div class="numbers">
                    <?php
                    $server="localhost";
                    $user="root";
                    $psd="1234567890";
                    $dbname="e-commerce";
                    $conn=mysqli_connect($server,$user,$psd,$dbname)
                    or die ("you have some erreurs in your connection ");

                    $query= "SELECT id_produit FROM produit ORDER BY id_produit ";
                    $query_usr = mysqli_query($conn,$query);
                    $row = mysqli_num_rows($query_usr);
                        echo '<h3>' .$row. '</h3>';

                    ?>
                    </div>
                    <div class="cardname">Annonce</div>

                </div>
                <div class="iconbox">
                    <ion-icon name="people-outline"></ion-icon>
                </div>
            </div>

                <div class="card">
                
                    <div class="search">
                        <div class="numbers">
                        <?php
                    $server="localhost";
                    $user="root";
                    $psd="1234567890";
                    $dbname="e-commerce";
                    $conn=mysqli_connect($server,$user,$psd,$dbname)
                    or die ("you have some erreurs in your connection ");

                    $query= "SELECT cart_id FROM panier ORDER BY cart_id ";
                    $query_panier = mysqli_query($conn,$query);
                    $row = mysqli_num_rows($query_panier);
                        echo '<h3>' .$row. '</h3>';

                    ?>
                        </div>
                        <div class="cardname">Panier</div>

                    </div>
                    <div class="iconbox">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                
                    <div class="search">
                        <div class="numbers">
                        <?php
                        $server="localhost";
                        $user="root";
                        $psd="1234567890";
                        $dbname="e-commerce";
                        $conn=mysqli_connect($server,$user,$psd,$dbname)
                        or die ("you have some erreurs in your connection ");

                        $query= "SELECT id_message FROM message ORDER BY id_message ";
                        $query_msg = mysqli_query($conn,$query);
                        $row = mysqli_num_rows($query_msg);
                        echo '<h3>' .$row. '</h3>';


                        ?>
                        </div>
                        <div class="cardname">Message</div>

                    </div>
                    <div class="iconbox">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </div>
                </div>
            </div>


            
</div>
</body>
</html>