<?php     session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="ecommerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");
    include('../inc/fonction.php');?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/produit.css">
</head>
<body>
<!-- navbar -->
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



<?php
$rr="SELECT * FROM regestre";
$ii=mysqli_query($conn,$rr);
while($ff=mysqli_fetch_assoc($ii)){
    $etat=$ff['etat'];
}

if($etat == 0){
    echo'hbeabkea';
}else{ ?>
<div class="title">
    Information
</div>
<?php
            if(isset($_GET['enregestre']) && $_GET['enregestre'] == "ok"){ ?>
                <div class="alert alert-success" role="alert">
                    enregestrement avec success
                </div>
            <?php
            }
?>
<form action="produit.php" method="post" enctype="multipart/form-data">
    <div class="parant">
        <div class="type">
            <span> type de categorie </span>
            <select class="form-select" aria-label="Default select example" name="id_cat">
                <option >Select a categories</option>
                <?php
                    $query="SELECT * FROM categories";
                    $run_cat=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($run_cat)){
                    $cat_id=$row['id_cat'];
                    $cat_title=$row['title_cat'];
                    echo "<option value='$cat_id'> $cat_title </option>";
                    }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Marque </label>
            <input type="text" name="title_produit" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Capacité</label>
            <input type="text" name="caracteristique" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prix</label>
            <input type="number" step="0.01" name="prix_produit" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Batterie</label>
            <input type="text" name="Batterie_produit" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>

        <input type="hidden" name="createur" value="">

        <div class="radio">
            <span>Caracteristique</span>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="type_produit" type="radio"  id="nouveau" value="nouveau">
                <label class="form-check-label" for="inlineRadio1">nouveau</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="type_produit"  type="radio"  id="dijautilise" value="utiliser">
                <label class="form-check-label" for="inlineRadio2">déja utilisé</label>
            </div>
        </div>


        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" name="product_image" type="file" id="" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
            <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="button">
            <input type="submit" name="insert_post" value="Enregestrer" class="btn btn-outline-success" >
            <button type="button" class="btn btn-outline-success">Supprimer</button>
        </div>
    </div>
</form>
<?php
} 
?>
</body>
</html>




<!-- code php -->
<?php

if(isset($_POST['insert_post'])){
    $title_produit = $_POST['title_produit'];
    $id_cat = $_POST['id_cat'];
    $createur=$_SESSION['id'];
    
    $prix_produit = $_POST['prix_produit'];
    $caracteristique = $_POST['caracteristique'];
    $type_produit = $_POST['type_produit'];
    $Description = $_POST['Description'];
    $Batterie_produit = $_POST['Batterie_produit'];


    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp,"product_images/$product_image");

    $insert="INSERT into produit (id_cat,createur,title_produit,prix_produit,caracteristique,type_produit,product_image,Description,Batterie_produit)
    VALUES ('$id_cat','$createur','$title_produit','$prix_produit','$caracteristique','$type_produit','$product_image','$Description','$Batterie_produit')";

    $insert_pro=mysqli_query($conn,$insert);

    if($insert_pro){
        header('location:produit.php?enregestre=ok');
    }else{
        echo 'error'.mysqli_error($conn);
    }

}

?>