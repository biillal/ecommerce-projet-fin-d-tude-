<?php
    
    $server="localhost";
 $user="root";
 $psd="1234567890";
 $dbname="ecommerce";
 $conn=mysqli_connect($server,$user,$psd,$dbname)
 or die ("you have some erreurs in your connection ");
        
    
        if(isset($_POST['ajouter'])){
            if(isset($_POST['role'])=='user'){
                $email=$_POST['email'];
                $password=$_POST['password'];
                $query="SELECT * FROM regestre WHERE email='$email' ";
                $queryuser = mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($queryuser)){
                $password1=$row['password'];
                $name=$row['name'];
                $Lastname=$row['lastname'];
                $id=$row['id'];
                }
                if(password_verify($password, $password1)) {
                    echo 'Password is valid!';
                    session_start();
                    $_SESSION['logged']= true;
                    $_SESSION['name'] = $name;
                    $_SESSION['lastname'] = $Lastname;
                    $_SESSION['image'] = $image;
                    $_SESSION['id'] = $id;
                    
                    header('location: index.php');
                    
                    
                }else {
                    echo 'Invalid password.';
                }
                

            }
        }


        if(isset($_POST['ajouter'])){
            if(isset($_POST['role'])=='admin'){
                $Email_admin=$_POST['email'];
                $Password_admin=$_POST['password'];
                $querys="SELECT * FROM admin WHERE Email_admin='$Email_admin' AND Password_admin = '$Password_admin'";
                $queryadmin = mysqli_query($conn,$querys);
                if(mysqli_num_rows($queryadmin)==1){
                    while($roww=mysqli_fetch_assoc($queryadmin)){
                        $Name=$row['Name_admin'];
                        $Lastname=$row['Lastname_admin'];
                    }
                    session_start();
                    $_SESSION['Name_admin'] = $Name;
                    $_SESSION['Lastname_admin'] = $Lastname;
                    header('location:../admin/dashboard.php');
                }
            }
        }



   mysqli_close($conn);





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css    ">
</head>
<body>
    <nav>
        <div >
        <a class="abshoping" href="index.php"><i class="fas fa-home"></i> <span class="ab">AB</span><span class="shoping">shoping</span>  </a>
        </div>
    </nav>
        <div class="body">
        <h1>   CONNEXION  </h1>
        <form action="login.php" method="post" >
        
            <ul>
        
        <li>
            <h3>Email</h3>
            <div class="regestre"><i class="fas fa-user"></i><input type="email" name="email" placeholder="écrire votre email"></div>
        </li>


        <li>
            <h3>Mot de passe</h3>
            <div class="regestre"><i class="fas fa-lock"></i><input type="password" name="password" placeholder="écrire votre mot de passe"></div>
        </li>


            <label for=""></label>
            <input list="role" placeholder="" name="role" hidden>
            <datalist id="role">
                <option value="user">
                <option value="admin">
            </datalist>        

        
            </ul>
    <div class="link">
        <a class="a" href="regestre.php">Créer un compte</a>
    </div>
    <div class="seconnecter">
        <input class="connect" type="submit" name="ajouter" value="Se connecter" ></div>
        </form>
    </div>
</body>
</html>