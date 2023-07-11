<?php
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="e-commerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");
$id_cat=$_POST['id_cat'];
$name=$_POST['title_cat'];
$Description=$_POST['Description'];
$date_modification= date('Y-m-d');
if(isset($_POST['modifier'])){
    $update="UPDATE categories set title_cat='$name', Description='$Description' ,  date_modification = '$date_modification' where id_cat = '$id_cat' ";
    $update_cat=mysqli_query($conn,$update);
    if($update_cat){
        header('location:list.php');
    }else{
        echo'error'.mysqli_error($conn);
    }
}
?>