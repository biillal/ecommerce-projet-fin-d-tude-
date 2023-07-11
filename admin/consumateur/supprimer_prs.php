<?php
    session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="e-commerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");

    if(isset($_GET['id'])){
        $nn=mysqli_query($conn,"SELECT * FROM regestre");
        while($ww=mysqli_fetch_assoc($nn)){
            
        }

    $id=$_GET['id'];
    $supp_prs="DELETE FROM regestre WHERE id = '$id' and etat=1";
    echo $supp_prs;
    $result_prs=mysqli_query($conn,$supp_prs);
    if($result_prs){
        header('location:personnesestvalide.php?supprimer=ok');
    }else{
        echo'error'.mysqli_error($conn);
    }
}


?>