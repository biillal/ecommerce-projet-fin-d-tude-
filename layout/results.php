<?php
    session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="ecommerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");
    include('../inc/fonction.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/index.css">


    <title>Document</title>
</head>
<body>
<?php include('../inc/nav.php'); ?>
<div class="card" style="width: 18rem;">
    <?php
    if(isset($_GET['search'])){
        $search_query = $_GET['user_query'];
        $queryss="SELECT * from produit WHERE title_produit like '%$search_query%' ";
        $run_pro=mysqli_query($conn,$queryss);
        while($row_pro=mysqli_fetch_assoc($run_pro)){
            $pro_id = $row_pro['id_produit'];
            $pro_cat= $row_pro['id_cat'];
            $pro_title= $row_pro['title_produit'];
            $pro_price= $row_pro['prix_produit'];
            $caracteristique= $row_pro['caracteristique'];
            $type_produit= $row_pro['type_produit'];
            $pro_image= $row_pro['product_image'];
            $Description= $row_pro['Description'];
            $Batterie_produit= $row_pro['Batterie_produit'];
            
            
            ?>

    
            <div class="product">
        
                
                    
                <div class="img">
                    <img src="product_images/<?php echo $pro_image ?>" class="card-img-top" alt="...">            </div>
                <div class="type">
                    <?php echo $row  ?>
                </div>
                <div class="marque">
                    <?php echo  $pro_title ;?>
                </div>
                <div class="prix">
                    <?php echo $pro_price; ?> Da
                </div>
                
                <a href='details.php?pro_id=<?php echo $pro_id ?>' class='btn btn-primary'>detail</a>
                
                
    
        
            </div>
            <?php

        }
    }

    ?>
    <?php
        if(isset($_GET['cat'])){
            $cat_id = $_GET['cat'];
            $get_cat_pro = "SELECT * FROM products where product_cat = '$cat_id'";
            $run_cat_pro = mysqli_query($conn,$get_cat_pro);
            $count_cat = mysqli_num_rows($run_cat_pro);
                if($count_cat == 0){
                    echo 'no product';
                }else{
                    while($row_cat_pro = mysqli_fetch_assoc($run_cat_pro)){
                        $pro_id = $row_cat_pro['product_id'];
                        $pro_cat= $row_cat_pro['product_cat'];
                        $pro_title= $row_cat_pro['product_title'];
                        $pro_price= $row_cat_pro['product_price'];
                        $pro_image= $row_cat_pro['product_image'];
                        echo "
                        <img src='../admin_area/product_images/$pro_image' class='card-img-top' alt='...'>
                        <div class='card-body'>
                        <h5 class='card-title'>$pro_title</h5>
                        <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        
                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>detail</a>
                        ";
                    }
                }
        }
    ?>

    </div>
</div>
</body>
</html>