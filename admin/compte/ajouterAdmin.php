<!-- code php -->
<?php
include 'connection.php';

$Name_admin=$_POST['Name_admin'];
$Lastname_admin=$_POST['Lastname_admin'];
$Email_admin=$_POST['Email_admin'];
$Password_admin=$_POST['Password_admin'];
$gender_admin=$_POST['gender_admin'];

if(isset($_POST['ajouter'])){
    $queryadmin="INSERT INTO admin(Name_admin,Lastname_admin,Email_admin,Password_admin,gender_admin)
    VALUES ('$Name_admin','$Lastname_admin','$Email_admin','$Password_admin','$gender_admin')";

    if(mysqli_query($conn,$queryadmin)){
    header('location: ajouterAdmin.php');
    }else{
    echo 'ERREUR biil' . mysqli_error($conn);
    }
}

if(isset($_GET['supprimer'])){
    $id_admin=$_GET['supprimer'];
    $querysupp="DELETE FROM admin WHERE id_admin='$id_admin'";
    mysqli_query($conn,$querysupp);
    header('location:ajouterAdmin.php');

}

if(isset($_POST['update'])){
    $id_admin = $_POST['id_admin'];
    $Name_admin=$_POST['Name_admin'];
    $Lastname_admin=$_POST['Lastname_admin'];
    $Email_admin=$_POST['Email_admin'];
    $Password_admin=$_POST['Password_admin'];
    $gender_admin=$_POST['gender_admin'];
    $updatequery="UPDATE admin SET Name_admin='$Name_admin' , 
    Lastname_admin='$Lastname_admin',
    Email_admin='$Email_admin' ,
    Password_admin='$Password_admin',
    gender_admin='$gender_admin' WHERE id_admin = '$id_admin'";
    $resultatmodifier=mysqli_query($conn,$updatequery);
    header("location:ajouterAdmin.php");

    }

mysqli_close($conn);
?>

<!-- code html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter admin</title>
    <link rel="stylesheet" href="../css/ajouterAdmin.css">
</head>
<body>
<div class="title">
        <div class="return">
            <a href="admin.php"> Retourner </a>
        </div>
        <div class="titre">
        Ajouter admin
        </div>
    </div>    
    
    <div class="parant-admin">
    <div class="container">
        <form action="" method="post">
            <div class="user-box">
                <div class="input-box">
                    <span class="details">Nom</span>
                    <input  type="text" name="Name_admin" placeholder="Entrer your name" >
                </div>

                <div class="input-box">
                    <span class="details">Prénom</span>
                    <input  type="text" name="Lastname_admin" placeholder="Entrer your name" >
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input  type="email" name="Email_admin" placeholder="Entrer your name" >
                </div>

                <div class="input-box">
                    <span class="details">password</span>
                    <input  type="password" name="Password_admin" placeholder="Entrer your name" >
                </div>

                <div class="sexe1">
                    <h3>Sexe</h3>
                    <div class="sexe-homme">
                        <input type="radio" id="male" name="gender_admin" value="homme">
                        <label for="male">homme <i class="fas fa-mars"></i></label>
                    </div>
                    <div class="sexe-famme">
                        <input type="radio" id="female" name="gender_admin" value="femme">
                        <label for="female">famme <i class="fas fa-venus"></i></label>
                    </div>

                </div>


            </div>

            <div class="button">
                    <input class="btn" type="submit" name="ajouter" value="inscrire" >
            </div>
        </form>
    </div>

    <!-- table admin -->


    <div class="parant">
    <table class="parant-table">
        <thead>
            <tr>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Email</td>
                <td>Password</td>
                <td>Sexe</td>
                <td>Action</td>
            </tr>
        </thead>
        <thead>
            <?php
                include 'connection.php';
               $query="SELECT * from admin";
                $result=mysqli_query($conn,$query);
                while($row= mysqli_fetch_assoc($result)){
            ?>
            <tr>
                <td><?php echo $row ['Name_admin']; ?></td>
                <td><?php echo $row ['Lastname_admin']; ?></td>
                <td><?php echo $row ['Email_admin']; ?></td>
                <td><?php echo $row ['Password_admin']; ?></td>
                <td><?php echo $row ['gender_admin']; ?></td>
                <td>
                    <div class="modifier"><a href="modifieAdmin.php?modifier=<?php echo $row['id_admin'] ?>">Modifier </a></div>
                    <div class="supprimer"><a href="ajouterAdmin.php?supprimer=<?php echo $row['id_admin'] ?>">Supprimer </a></div> 
                </td>
            </tr>

        <?php
    }
        mysqli_close($conn);
        ?>
        </thead>
    </table>
</div>


</div>

</div>
</body>
</html>