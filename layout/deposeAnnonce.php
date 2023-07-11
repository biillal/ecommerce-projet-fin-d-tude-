<?php
session_start();
$server="localhost";
$user="root";
$psd="1234567890";
$dbname="ecommerce";
$conn=mysqli_connect($server,$user,$psd,$dbname)
or die ("you have some erreurs in your connection ");
$user_id=$_SESSION['id'];
$query_panier="SELECT id_panier FROM panier WHERE user= '$user_id' LIMIT 1 ";
$result_query =mysqli_query($conn,$query_panier); 
//echo $result_query;
while($row=mysqli_fetch_assoc($result_query)){
    $id_panier=$row['id_panier'];
    
}
$_SESSION['id_panier']=$id_panier;





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/annonce.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css  ">
    <link rel="stylesheet" href="../css/message.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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





<!-- depose annonce -->
<div class="container">
<?php
require('connection.php');

    //creat query

        $id=$_GET['voir'];
        $queryss="SELECT * from produit WHERE id_depose='$id' ";
        $result=mysqli_query($conn,$queryss);
        while($row= mysqli_fetch_assoc($result)){
        
    
    ?>
    <div class="parant">
        <div class="img">
            <img class="img1" src="" alt="">
            <div class="type">
                    <?php echo $row ['gender_depose'] ?>
            </div>
        </div>
        <div class="titre">
            <div class="title">
            <div class="marque">
                Marque :<p> <?php echo $row ['marque_depose'] ?></p>
            </div>
            <div class="caractiristique">
                <p></p>
            </div>
            <div class="taille">
                caractiristique   <p>:<?php echo $row ['genders_depose'] ?></p>
            </div>
            <div class="capacite">
                capacité: <p> <?php echo $row ['capacité_depose'] ?></p>
            </div>
            <div class="prix">
                Prix: <P> <?php echo $row ['prix_depose'] ?> Da</P>
            </div>
            <div class="prix">
                Batterie: <P> <?php echo $row ['prix_depose'] ?> map</P>
            </div>
            <div class="desc">
                    <span>   <?php echo $row ['Description'] ?> </span>
            </div>   


            </div>
            
            <form action="commender.php" methode="GET">
            
            <div class="panier">
                <input type="hidden" value="<?php echo $row['id_depose'] ?>" name="produit">
                <input type="hidden" value="<?php echo  $id_panier ?>" name="panier"> 
                <button type="submit" name="submit">Ajouter au panier</button>
                  
            </div>

            </form>
        
        



    <?php

   
    }
    ?>
    </div>
    </div>
    
        <?php
        
            mysqli_close($conn);
        ?>
    
        </div>
    
    </div>
    
</body>
</html>