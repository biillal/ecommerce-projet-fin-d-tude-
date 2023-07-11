<?php
session_start();
$server="localhost";
$user="root";
$psd="1234567890";
$dbname="ecommerce";
$conn=mysqli_connect($server,$user,$psd,$dbname)
or die ("you have some erreurs in your connection ");
include("../inc/fonction.php");

if(isset($_GET['supprimer'])){
    $id_panier= $_SESSION['cart_id'];
    $id=$_GET['supprimer'];
    $querysupp="DELETE FROM commender WHERE id_commende='$id'";
    $result=mysqli_query($conn,$querysupp);
    header('location:panier.php?panier='.$id_panier);
    
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/panier.css">
</head>
<body>

<!-- navber -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ShoppingTop</a>
        
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && isset($_SESSION['cart_id'])){ ?>
            <a class="nav-link active" aria-current="page" href="../layout/produit.php">Deposer une annonce</a>
            <?php
                }else{ ?>
            <a class="nav-link active" aria-current="page" href="../layout/login.php">Deposer une annonce</a>
            <?php
                }
            ?>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorie
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                     $query="SELECT * FROM categories";
                    $run_cat=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($run_cat)){
                        $cat_id=$row['id_cat'];
                        $cat_title=$row['title_cat'];
                        echo "<li><a class='dropdown-item'  href='index.php?cat=$cat_id'>$cat_title</a></li>";
                    }
                ?>
            <li><hr class="dropdown-divider">Materiel</li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>

            </ul>
        </li>
    </ul>
        <form class="d-flex" action="results.php" method="get">
            <input class="form-control me-2" type="search" name="user_query"id="search_box" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" name="search" value="Search" type="submit">Search</button>
        
        </form>
        <div class="nav-cnct">
            <?php 
            $id=$_SESSION['id'];
            
            $oo=mysqli_query($conn,"SELECT * FROM regestre WHERE id= '$id'");
            
            $data_user=mysqli_fetch_assoc($oo);
            ?>
            <ul  class="navbar-nav me-auto mb-2 mb-lg-0" id="cmp">
                <li class="nav-item">
                    <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
                    ?>
                    <div class="cmpt">
                        <a class="nav-link" aria-current="page" href="compte.php?voir=<?php echo $row['id'] ?>"><i class="bi bi-person-fill"></i>profil </a>
                    </div>
            
                    <?php
                    }else{
                    ?>
                        <a class="nav-link" aria-current="page" href="login.php"><i class="bi bi-person-fill"></i> Se connect</a>
                    <?php
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && isset($_SESSION['cart_id'])){ ?>
                        <a class="nav-link" href="panier.php?panier=<?php echo $_SESSION['cart_id']  ?>"><i class="bi bi-cart-check-fill"></i>
                        Panier
                    </a>
                    <?php
                    }else{ ?>
                        <a class="nav-link" href="panier.php"><i class="bi bi-cart-check-fill"></i>
                        Panier
                    </a>
                    <?php
                    } ?>

                    <div class="num">
                        <?php  total_item();?>
                    </div>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php" tabindex="-1" aria-disabled="true"><i class="bi bi-chat-right-fill"> </i>Message</a>
                </li>
            </ul>
        
    
    </div>
    </div>

    
</nav>



<!-- panier -->
<?php
        $id_panier=$_SESSION['cart_id'];
        $queery="SELECT * FROM commender  ";
        $rrr=mysqli_query($conn,$queery);
        $yyy=mysqli_num_rows($rrr);
        if($yyy == null){
            echo'<div class="alert alert-info" role="alert">
                A simple info alert—check it out!
                </div>';
        }else{
                ?>
<div class="sub-title">
            Votre Panier
        </div>
    <div class="panier">

        
        <!--<div class="parant"> </div>-->

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">image</th>
        <th scope="col">title</th>
        <th scope="col">prix</th>
        <th scope="col">action</th>
    </tr>
    </thead>
        <?php add_panier();?>
        
    </tbody>
</table>


<div class="col-sm-6">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Prix total : <span><?php echo $_SESSION['prix_produit'] ?>  Da</span></h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#"  class="btn btn-primary">Acheter</a>
        </div>
    </div>
</div>
<!--
    <div class="fact">
        <form action="paiment.php" method="post">
        <div class="fact1">
        <div class="total">
            Total : <span><?php echo $_SESSION['prix_produit'] ?>  Da</span>

        </div>
        <div class="acheter">
            <button>Acheter</button>
        </div>
        </form>
        </div>

-->
    </div>
     



<?php
}
?>




    
</body>
</html>