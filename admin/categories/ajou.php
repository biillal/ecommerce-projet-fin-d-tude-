<?php
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="e-commerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");

$name_cat=$_POST['title_cat'];
$Description=$_POST['Description'];
$date_creation= date('Y-m-d');
if(isset($_POST['ajouter'])){
    $query="INSERT into categories(title_cat,date_creation,Description)
    VALUES('$name_cat','$date_creation','$Description')";
    $result_cat=mysqli_query($conn,$query);
    if($result_cat){
        header('location:list.php');
    }else{
        echo'error'.mysqli_error($conn);
    }
}
?>