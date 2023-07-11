<div class="parant">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">ShoppingTop</a>
        
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true ){ ?>
            <a class="nav-link active" aria-current="page" href="../layout/produit.php">Deposer une annonce</a>
            <?php
                }else{ ?>
            <a class="nav-link active" aria-current="page" href="../layout/login.php">Deposer une annonce</a>
            <?php
                }
            ?>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Categorie
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <?php
                     $query="SELECT * FROM categories";
                    $run_cat=mysqli_query($conn,$query);
                    while($row=mysqli_fetch_assoc($run_cat)){
                        $cat_id=$row['id_cat'];
                        $cat_title=$row['title_cat'];
                        echo "<li><a class='dropdown-item'  href='index.php?cat=$cat_id'>$cat_title</a></li>";
                    }
                ?>
            <li><hr class="dropdown-divider">Materiel</li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>

            </ul>
        </li>
    </ul>
        <form class="d-flex" action="results.php" method="get">
            <input class="form-control me-2" type="search" name="user_query"id="search_box" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" name="search" value="Search" type="submit">Search</button>
        
        </form>
        <div class="nav-cnct">
            <?php 
            $id=$_SESSION['id'];
            
            $oo=mysqli_query($conn,"SELECT * FROM regestre WHERE id= '$id'");
            
            $data_user=mysqli_fetch_assoc($oo);
            ?>
            <ul  class="navbar-nav me-auto mb-2 mb-lg-0" id="cmp">
                <li class="nav-item">
                    <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
                    ?>
                    <div class="cmpt">
                        <a class="nav-link" aria-current="page" href="compte.php?voir=<?php echo $row['id'] ?>"><i class="bi bi-person-fill"></i>profil </a>
                    </div>
            
                    <?php
                    }else{
                    ?>
                        <a class="nav-link" aria-current="page" href="login.php"><i class="bi bi-person-fill"></i> Se connect</a>
                    <?php
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true && isset($_SESSION['cart_id'])){ ?>
                        <a class="nav-link" href="panier.php?panier=<?php echo $_SESSION['cart_id']  ?>"><i class="bi bi-cart-check-fill"></i>
                        Panier
                    </a>
                    <?php
                    }else{ ?>
                        <a class="nav-link" href="panier.php"><i class="bi bi-cart-check-fill"></i>
                        Panier
                    </a>
                    <?php
                    } ?>

                    <div class="num">
                        <?php  total_item();?>
                    </div>
                    
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="message.php" tabindex="-1" aria-disabled="true"><i class="bi bi-chat-right-fill"> </i>Message</a>
                </li>
            </ul>
        
    
    </div>
    </div>

    
</nav>
</div>

<script>
    $(document).ready(function(){
        $(".nav-item").click(function(){
            $(this).find(".ull").slideToggle("fast");
            alert("ok");
        });
    });
</script>