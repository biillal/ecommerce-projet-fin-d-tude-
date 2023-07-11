<?php
$server="localhost";
$user="root";
$psd="1234567890";
$dbname="ecommerce";
$conn=mysqli_connect($server,$user,$psd,$dbname)
or die ("you have some erreurs in your connection ");





/*
$errors = [ 
    'nameError' =>'',
    'prenomError' =>'',
    'emailError' => '',
    'passwordError' => '',
    'numberError' => '',
    'genderError' => '',
];

if(empty($nom)){
    $errors['nameError'] = 'name is empty ';
}
if(empty($prenom)){
    $errors['prenomError'] = 'dakhel prenom';
}
if(empty($email)){
    $errors['emailError'] = 'email a sahbi';
}
if(empty($password)){
    $errors['passwordError'] = 'password win rah ';
}
if(empty($number)){
    $errors['numberError'] = 'numero a zin';
}
if(empty($gender)){
    $errors['genderError'] = 'chkoun nta';
}


*/
$name=$_POST['name'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$password=$_POST['password'];
$adress=$_POST['adress'];
$telephone=$_POST['telephone'];
$gender=$_POST['gender'];
$date_creation= date('Y-m-d');

//image 
$image = $_FILES['image']['name'];
$product_image_tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($product_image_tmp,"images/$image");


if(isset($_POST['submit'])){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query="INSERT into regestre(name,lastname,email,password,adress,telephone,image,etat,date_creation,gender)
    values('$name','$lastname','$email','$hash','$adress','$telephone','$image','0','$date_creation','$gender')";
    echo $query;


// conferme not errors



    $result=mysqli_query($conn,$query);
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
    $query="SELECT * FROM regestre WHERE id='$last_id' ";
    echo $query;
                $queryuser = mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($queryuser)){
                $password1=$row['password'];
                $name=$row['name'];
                $lastname=$row['lastname'];
                $id=$row['id'];
                }
                $total=$_SESSION['prix_produit'];
                echo $total;
                $date = date('Y-m-d');
        $query_panier= "INSERT into panier(id_user,total,date) Values('$id','$total','$date') ";
        echo $query_panier;
        $result_panier = mysqli_query($conn,$query_panier);
        
        $_SESSION['logged']= true;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['id'] = $id;
        header('location:index.php');
    



}


mysqli_close($conn);

?>