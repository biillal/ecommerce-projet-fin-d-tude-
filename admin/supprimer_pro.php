<?php
    session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="ecommerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");

if(isset($_GET['id'])){
    $id_pro=$_GET['id'];
    $supp_cat="DELETE FROM produit WHERE id_produit = '$id_pro' ";
    echo $supp_cat;
    echo'ddd';
    $result_cat=mysqli_query($conn,$supp_cat);
    if($result_cat){
        echo 'ftgrg';
        header('location:product.php?supprimer=ok');
    }else{
        echo'error'.mysqli_error($conn);
    }
}


?>