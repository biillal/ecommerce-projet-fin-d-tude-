<?php
include('../../inc/connexion.php');
if(isset($_GET['id_cat'])){
    $id_cat=$_GET['id_cat'];
    $supp_cat="DELETE FROM categories WHERE id_cat = '$id_cat' ";
    echo $supp_cat;
    $result_cat=mysqli_query($conn,$supp_cat);
    if($result_cat){
        header('location:list.php');
    }else{
        echo'error'.mysqli_error($conn);
    }
}


?>