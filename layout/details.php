<?php
    session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="ecommerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");
    include('../inc/fonction.php');
    $user_id=$_SESSION['id'];
$query_panier="SELECT cart_id FROM panier WHERE id_user = '$user_id' LIMIT 1 ";
$result_query =mysqli_query($conn,$query_panier); 
//echo $result_query;
while($row=mysqli_fetch_assoc($result_query)){
    $id_panier=$row['cart_id'];
    $_SESSION['cart_id']=$id_panier;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/annonce.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css  ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- navber -->
<?php include('../inc/nav.php'); ?>



<!-- depose annonce -->
<div class="container">
<?php

session_start();
$server="localhost";
$user="root";
$psd="123456789";
$dbname="e-commerce";
$conn=mysqli_connect($server,$user,$psd,$dbname)
or die ("you have some erreurs in your connection ");
    //creat query

        $id_pro=$_GET['pro_id'];
        $queryss="SELECT * from produit WHERE id_produit='$id_pro' ";
        $result=mysqli_query($conn,$queryss);

        while($row= mysqli_fetch_assoc($result)){
            $pro_id = $row['id_produit'];
            $pro_cat= $row['id_cat'];
            $pro_title= $row['title_produit'];
            $pro_price= $row['prix_produit'];
            $caracteristique= $row['caracteristique'];
            $type_produit= $row['type_produit'];
            $pro_image= $row['product_image'];
            $Description= $row['Description'];
            $Batterie_produit= $row['Batterie_produit'];
    
    /*echo "
    <div class='parant'>
        <div class='img'>
            
            <img class='img1' src='product_images/$pro_image' >
            <div class='type'> $pro_cat  </div>
        </div>
        <div class='titre'>
            <div class='title'>
            <div class='marque'> Marque :<p>  $pro_title </p> </div>
            <div class='capacite'>
                capacité: <p>  $caracteristique</p>
            </div>
            <div class='prix'>
                Prix: <P> $pro_price  Da</P>
            </div>
            <div class='prix'>
                Batterie: <P> $Batterie_produit  map</P>
            </div>
            <div class='desc'>
                    <span>    $Description </span>
            </div>   


            </div>
 
            ";*/
        ?>
    <div class="hh">
        <div class="row g-0 bg-light position-relative">
            <div class="col-md-6 mb-md-0 p-md-4">
                <img src="product_images/<?php echo  $pro_image ?>" class="w-100" alt="...">
            </div>
            <div class="col-md-6 p-4 ps-md-0">
                <h5 class="mt-0"><?php echo  $pro_title ?></h5>
                <p><?php echo  $caracteristique ?></p>
                <p><?php echo  $pro_price ?></p>
                <p><?php echo  $Batterie_produit ?></p>
                <p><?php echo  $Description ?></p>
                
                <form action="commender.php" methode="GET">
            
            <div class="panier">
                <input type="text" value="<?php echo $pro_id ?>" name="produit" >
                <input type="text"  value="<?php echo  $id_panier ?>" name="panier" >
                <button type="submit" class="stretched-link" name="submit">Add to cart</button>
                            
            </div>

            </form>
            </div>
        </div>
    </div>
            


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