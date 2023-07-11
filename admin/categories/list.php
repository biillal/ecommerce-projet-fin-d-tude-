<?php
    session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="e-commerce";
    $conn=mysqli_connect($server,$user,$psd,$dbname)
    or die ("you have some erreurs in your connection ");
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Administration</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/personnes.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <button>search</button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#"> Deconnexion</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link " href="../dashboard.php">
                            <span data-feather="home"></span>
                                Home <span class="sr-only">(current)
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="file"></span>
                                Categorie
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../personnes.php">
                            <span data-feather="shopping-cart"></span>
                                Personnes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../product.php">
                            <span data-feather="users"></span>
                                Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="bar-chart-2"></span>
                                Reports
                    </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../consumateur/personnesestvalide.php">
                  <span data-feather="layers"></span>
                  Integrations
                </a>
              </li>
            </ul>

          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Table des categories</h1>
            <div>
                <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Ajouter</a>
            </div>
            </div>
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">First</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
  <tbody>
    <?php
        $i=0 ;
        $query="SELECT * FROM categories";
        $run_cat=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($run_cat)){
          $i++;
            $cat_id=$row['id_cat'];
            $cat_title=$row['title_cat'];
            $Description=$row['Description'];
        
        ?>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $cat_title ?></td>
      <th><?php echo $Description ?> </th>
      <td>
        <a data-bs-toggle="modal" data-bs-target="#editModel<?php echo $cat_id ?>" class="btn btn-success">Modifier</a>
        <a href="supprimer.php?id_cat=<?php echo $cat_id ?>" class="btn btn-danger">supprimer</a>

      </td>
    </tr>
    <?php } ?>
  </tbody>
</table>

        </main>
      </div>
    </div>



<!-- Modal ajouter-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter categorie</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="ajou.php" method="post">
            <div class="form-floating mb-3">
                <label for="floatingInput"> </label>
                <input type="text" class="form-control" name="title_cat"  id="floatingInput" placeholder="nom de categorie" required>
                
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="Description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
            </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php
        $query="SELECT * FROM categories";
        $run_cat=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($run_cat)){
            $cat_id=$row['id_cat'];
            $cat_title=$row['title_cat'];
            $Description=$row['Description'];
            
        
?>
<!-- Modal modifier-->
<div class="modal fade" id="editModel<?php echo $cat_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modifier categorie</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="modifier.php" method="post">
            <input type="hidden" name="" value="<?php echo $cat_id ?>">
            <div class="form-floating mb-3">
                <label for="floatingInput"> </label>
                <input type="text" class="form-control" name="title_cat" value="<?php echo $cat_title ?>"  id="floatingInput" placeholder="nom de categorie" required>
                
            </div>
            <div class="form-floating">
                <textarea class="form-control" name="Description" value="<?php echo $Description ?>" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" required></textarea>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
      </div>
      </form>
    </div>

  </div>
</div>
<?php 
          }
        ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/vendor/popper.min.js"></script>
    <script src="..js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
  </body>
</html>



