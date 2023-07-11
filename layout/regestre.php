<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSCRIPTION</title>
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css    ">
</head>
<body>

    <nav >
        <div >
            <a class="abshoping" href="home.php"><i class="fas fa-home"></i> <span class="ab">AB</span><span class="shoping">shoping</span>  </a>
            </div>
    </nav>
    <div class="body">
            
        
        <form action="form.php" method="post" enctype="multipart/form-data">
        <h1>INSCRIPTION</h1>
            <ul>
        <li>
            <h3>Nom</h3>
            <div class="regestre"><i class="fas fa-file-signature"></i><input type="text" name="name" value="<?php echo $name ?> " placeholder="écrire votre nom"></div>
            <div class="nom"><?php echo $errors['nameError']   ?>  </div>
        </li>


        <li>
            <h3>Prénom</h3>
            <div class="regestre"><i class="fas fa-file-signature"></i><input type="text" name="lastname" value="<?php echo $prenom ?> " placeholder="écrire votre prénom" ></div>
            <div class="nom"><?php echo $errors['prenomError']   ?></div>
        </li>

        <li>
            <h3>Email</h3>
            <div class="regestre"><i class="fas fa-user"></i><input type="email" name="email" value="<?php echo $email ?> " placeholder="écrire votre email"></div>
            <div class="nom"><?php echo $errors['emailError']   ?></div>
        </li>

        <li>
            <h3>Mot de pass</h3>
            <div class="regestre"><i class="fas fa-lock"></i><input type="password" name="password" value="<?php echo $password ?> " placeholder="écrire votre password"></div>
            <div class="nom"><?php echo $errors['passwordError']   ?></div>
        </li>

        <li>
            <h3>Numéro de téléphone</h3>
            <div class="regestre"><i class="fas fa-mobile-alt"></i><input type="text" name="telephone" value="<?php echo $number ?> " placeholder="écrire votre néméro"></div>
            <div class="nom"><?php echo $errors['numberError']   ?></div>
        </li>

        <li>
            <h3>Adress</h3>
            <div class="regestre"><input type="text" name="adress" value="<?php echo $number ?> " placeholder="écrire votre néméro"></div>
            <div class="nom"><?php echo $errors['numberError']   ?></div>
        </li>

        <div class="mb-3">
            <label for="formFile" class="form-label">Image</label>
            <input class="form-control" name="image" type="file" id="" required>
        </div>

        <div class="sexe1">
            <li><h3>Sexe</h3></li>
            <div class="sexe">
                <input type="radio" id="male" name="gender" value="homme">
                <label for="male">homme <i class="fas fa-mars"></i></label>
            </div>
            <div class="sexe">
                <input type="radio" id="female" name="gender" value="femme">
                <label for="female">femme <i class="fas fa-venus"></i></label>
            </div>
            <div class="nom"><?php echo $errors['genderError']   ?></div>
        </div>
    </ul>
    <div>
        <a href="login.html"></a>
    </div>
    <div class="input">
        <input class="btn" type="submit" name="submit" value="inscrire" ></div>
        <input type="image" src="/" alt="">
        </form>
    </div>



    
</body>
</html>