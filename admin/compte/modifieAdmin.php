<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/modifierAdmin.css">
</head>
<body>
        <div class="return">
            <a href="ajouterAdmin.php"> Retourner </a>
        </div>

    
    <div class="parant-admin">
    <div class="container">
        <?php

        $id_admin=$_GET['modifier']

        ?>
        <form action="ajouterAdmin.php" method="post">
            <div class="user-box">
                <div class="input-box1">
                    
                    <input  type="text" name="id_admin" value="<?php echo $id_admin;?>" placeholder="Entrer your name" hidden require>
                </div>

                <div class="input-box">
                    <span class="details">Nom</span>
                    <input  type="text" name="Name_admin" placeholder="Entrer your name" require>
                </div>

                <div class="input-box">
                    <span class="details">Prénom</span>
                    <input  type="text" name="Lastname_admin" placeholder="Entrer your name" require >
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input  type="email" name="Email_admin" placeholder="Entrer your name" require>
                </div>

                <div class="input-box">
                    <span class="details">password</span>
                    <input  type="password" name="Password_admin" placeholder="Entrer your name" require>
                </div>

                <div class="sexe1">
                    <h3>Sexe</h3>
                    <div class="sexe-homme">
                        <input type="radio" id="male" name="gender_admin" value="homme">
                        <label for="male">homme <i class="fas fa-mars"></i></label>
                    </div>
                    <div class="sexe-famme">
                        <input type="radio" id="female" name="gender_admin" value="famme">
                        <label for="female">femme <i class="fas fa-venus"></i></label>
                    </div>

                </div>


            </div>

            <div class="button">
                    <input class="btn" type="submit" name="update" value="modifier" >
            </div>
        </form>
    </div>