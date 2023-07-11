<?php
    session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="e-commerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");


function getcat(){
    session_start();
    global $conn;
    $query="SELECT * FROM categories";
    $run_cat=mysqli_query($conn,$query);
    while($row=mysqli_fetch_assoc($run_cat)){
        $cat_id=$row['id_cat'];
        $cat_title=$row['title_cat'];
        $_SESSION['title_cat']=$cat_title;
        echo "<li><a class='dropdown-item'  href='indeex.php?cat=$cat_id'>$cat_title</a></li>";
    }
}

function get_pro_catt(){
    global $conn;
    if(!isset($_GET['cat'])){
        $get_pro="SELECT * FROM produit order by RAND() LIMIT 0,6";
        $run_pro=mysqli_query($conn,$get_pro);
        while($row_pro=mysqli_fetch_assoc($run_pro)){
            $pro_id = $row_pro['id_produit'];
            $pro_cat= $row_pro['id_cat'];
            $pro_title= $row_pro['title_produit'];
            $pro_price= $row_pro['prix_produit'];
            $caracteristique= $row_pro['caracteristique'];
            $type_produit= $row_pro['type_produit'];
            $pro_image= $row_pro['product_image'];
            $Description= $row_pro['Description'];
            $Batterie_produit= $row_pro['Batterie_produit'];
            
            ?>

    
            <div class="product">
        
                
                    
                <div class="img">
                    <img src="product_images/<?php echo $pro_image ?>" class="card-img-top" alt="...">            </div>
                <div class="type">
                    <?php echo $row  ?>
                </div>
                <div class="marque">
                    <?php echo  $pro_title ;?>
                </div>
                <div class="prix">
                    <?php echo $pro_price; ?> Da
                </div>
                
                <a href='details.php?pro_id=<?php echo $pro_id ?>' class='btn btn-primary'>detail</a>
                
                
    
        
            </div>
            <?php

        }
    }
}


function get_pro(){
    global $conn;
    if(isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $get_cat_pro = "SELECT * FROM produit where id_cat = '$cat_id'";
        $run_cat_pro = mysqli_query($conn,$get_cat_pro);
        $count_cat = mysqli_num_rows($run_cat_pro);
            if($count_cat == 0){
                echo 'no product';
            }else{
                while($row_cat_pro = mysqli_fetch_assoc($run_cat_pro)){
                    $pro_id = $row_cat_pro['id_produit'];
                    $pro_cat= $row_cat_pro['id_cat'];
                    $pro_title= $row_cat_pro['title_produit'];
                    $pro_price= $row_cat_pro['prix_produit'];
                    $caracteristique= $row_cat_pro['caracteristique'];
                    $type_produit= $row_cat_pro['type_produit'];
                    $pro_image= $row_cat_pro['product_image'];
                    $Description= $row_cat_pro['Description'];
                    $Batterie_produit= $row_cat_pro['Batterie_produit'];                     
                    ?>
                            <div class="product">
                                <div class="img">
                                    <img src="product_images/<?php echo $pro_image ?>" class="card-img-top" alt="...">            </div>
                                    
                                <div class="marque">
                                        <?php echo  $pro_title ;?>
                                </div>
                                <div class="prix">
                                        <?php echo $pro_price; ?> Da
                                </div>
    
    
                                <a href='details.php?pro_id=<?php echo $pro_id ?>' class='btn btn-primary'>detail</a>


                                </div>
                    <?php
                }

            } 

    }
}

function total_item(){
    session_start();
    global $conn;
    $id_panier=$_SESSION['cart_id'];
    $run_item=mysqli_query($conn,"SELECT * FROM commender WHERE panier='$id_panier'");
    echo $count_item = mysqli_num_rows($run_item);
}
function get_ip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
function add_cart(){
    global $conn;
    if(isset($_GET['add_cart'])){
        $product_id = $_GET['add_cart'];
        $ip_address = get_ip();
        $run_check_pro = mysqli_query($conn,"SELECT * FROM cart WHERE product_id='$product_id'");
        if(mysqli_num_rows($run_check_pro) > 0){
                echo"hhhh";
        }else{
            $fetch_pro = mysqli_query($conn,"SELECT * FROM products WHERE product_id='$product_id'");
            $row_fetch=mysqli_fetch_assoc($fetch_pro);
            $product_title=$row_fetch['product_title'];

            $run_insert_pro = mysqli_query($conn,"INSERT into cart(product_id,product_title,ip_address,quality) values('$product_id','$product_title','$ip_address','$quality')");

            if($run_insert_pro){
                header('location:cart.php');
            }
        }
    }
}


function total_price(){
    global $conn;
    $total = 0;
    $ip = get_ip();
    $run_cart=mysqli_query($conn,"SELECT * FROM cart WHERE ip_address='$ip'");

    while($fetch_product=mysqli_fetch_assoc($run_cart)){
        $product_id=$fetch_product['product_id'];
        $result_product = mysqli_query($conn,"SELECT * FROM products WHERE product_id='$product_id'");
        while($fetch_product=mysqli_fetch_assoc($result_product)){
            $product_price = array($fetch_product['product_price']);
            $pro_title= $fetch_product['product_title'];
            $pro_price= $fetch_product['product_price'];
            $pro_image= $fetch_product['product_image'];
            $values = array_sum($product_price);
            $total += $values;
        }



    }
}

function add_panier(){
    global $conn;
    $id_panier= $_GET['panier'] ;
    $user=$_SESSION['id'];
    
    $query_panier="SELECT * FROM panier WHERE id_user = $user ";
    $result_query =mysqli_query($conn,$query_panier); 
    while($roww=mysqli_fetch_assoc($result_query)){
        $roww['cart_id']=$id_panier;
                            
    }
    $_SESSION['cart_id']=$id_panier;
    $query= "SELECT produit.id_produit,produit.title_produit,produit.prix_produit,produit.product_image,commender.id_commende FROM produit 
    INNER JOIN  commender ON commender.produit = produit.id_produit WHERE commender.panier = $id_panier";
    
    $result=mysqli_query($conn,$query);
    $query1= "SELECT id_commende FROM commender WHERE panier = $id_panier";
    $result1=mysqli_query($conn,$query1);
    $i=0 ;
    while($row=mysqli_fetch_assoc($result)){
        $i++;
        $total += $row['prix_produit'];
        $_SESSION['prix_produit']=$total;
        $totaal=$_SESSION['prix_produit'];
        $marque_depose = $row['title_produit'];
        $_SESSION['title_produit']=$marque_depose;
        
        
?>
<!--
<div class="sub_parant">
<div class="img">
    <img src="product_images/<?php echo $row['product_image']?> " alt="">
</div>
<div class="panier1">
    <div class="type">
        <p></p>
    </div>
    <div class="marque">
        <p><?php echo  $row['title_produit'] ?></p>
    </div>
    <div class="prix">
        <?php echo $row['prix_produit'] ?> Da 
    </div>
    <div class="sup-panier">
        <a href="panier.php?supprimer=<?php echo $row['id_commende']   ?>?panier=<?php echo  $id_panier ?>"> Supprimer </a>
    </div>
</div>
</div>
    -->


    <tr>
        
        <th scope="row"><?php echo $i ?></th>
        <td class="img"><img src="product_images/<?php echo $row['product_image']?> " alt=""></td>
        <td><p><?php echo  $row['title_produit'] ?>  </p>  </td>
        <td><p> <?php echo $row['prix_produit'] ?>  </p>  </td>
        <td><a class="btn btn-danger" href="panier.php?supprimer=<?php echo $row['id_commende']   ?>?panier=<?php echo  $id_panier ?>"> Supprimer </a></td>
    </tr>


<?php
}
}

?>

