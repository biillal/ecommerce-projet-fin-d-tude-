<?php 
session_start();
$server="localhost";
$user="root";
$psd="1234567890";
$dbname="ecommerce";
$conn=mysqli_connect($server,$user,$psd,$dbname)
or die ("you have some erreurs in your connection ");





$user=$_SESSION['id'];


$id_produit = $_GET['produit'] ;
$id_panier= $_GET['panier'];


$commende = "INSERT into commender(produit,panier) Values ('$id_produit','$id_panier') ";
$query = mysqli_query($conn,$commende);



//creation de panier


if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
    header('location: panier.php?panier='.$id_panier);
}else{
    header('location: login.php');

}
    







?>