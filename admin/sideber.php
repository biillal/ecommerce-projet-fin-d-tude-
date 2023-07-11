)=<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css  ">
    <title>Document</title>
</head>
<body>
<div class="navigation">
            <ul>
                <li>
                    <a href="">
                        <span class="icon" ><ion-icon name="person-circle-outline"></ion-icon></span>
                        <span class="title" >Administration</span>
                    </a>
                </li>
                <li>
                    <a href="admin.php">
                        <span class="icon" ><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title" >Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="personnes.php">
                        <span class="icon" ><ion-icon name="people-outline"></ion-icon></span>
                        <span class="title" >Personnes</span>
                    </a>
                </li>
                <li>
                    <a href="recevoire_message.php">
                        <span class="icon" ><ion-icon name="chatbubble-outline"></ion-icon></span>
                        <span class="title" >Message</span>
                    </a>
                </li>
                
                <li>
                    <a href="ajouterAdmin.php">
                        <span class="icon" ><i class="fa-solid fa-user"></i></span>
                        <span class="title" >Admin</span>
                    </a>
                </li>

                <li>
                    <a href="annonce.php">
                        <span class="icon" ><i class="fa-solid fa-megaphone"></i></span>
                        <span class="title" >Annonce</span>
                    </a>
                </li>

                <li>
                    <a href="logout.php">
                        <span class="icon" ><ion-icon name="log-in-outline"></ion-icon></span>
                        <span class="title" >Deconnecter</span>
                    </a>
                </li>
            </ul>
        </div>
        

        
        
        <!--menu-->
        <div class="main">
            <div class="topber">
            <div class="toggle">
                    
            </div>

            <?php
            if($_SESSION['Name_admin'] ){

            ?>
                <div class="user">
                    
                    <?php
                    session_start();
                    echo $_SESSION['Name_admin'] . $_SESSION['Lastname_admin'] ; ?>

                </div>
                <?php
                }
                ?>
            </div>

            



        <!-- code js -->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>






</body>
</html>