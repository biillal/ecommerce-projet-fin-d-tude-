<?php
$idpersonnes=$_GET['id'];
include('../inc/connexion.php');
$requette = "UPDATE regestre set etat=1 WHERE id = '$idpersonnes'";
$resultt=mysqli_query($conn,$requette);

if($resultt){
    header('location:personnes.php?valide=ok');
}else{
    echo'error'.mysqli_error($conn);
}