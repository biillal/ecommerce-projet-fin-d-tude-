<?php
    session_start();
    $server="localhost";
    $user="root";
    $psd="1234567890";
    $dbname="ecommerce";
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
    <link rel="stylesheet" href="css/product.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
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
                        <a class="nav-link " href="dashboard.php">
                            <span data-feather="home"></span>
                                Home<span class="sr-only">(current)
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories/list.php">
                            <span data-feather="file"></span>
                                Categorie
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="personnes.php">
                            <span data-feather="shopping-cart"></span>
                            Personnes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="product.php">
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
                        <a class="nav-link" href="consumateur/personnesestvalide.php">
                            <span data-feather="layers"></span>
                            Integrations
                    </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Table Personnes</h1>
            </div>
        <?php
            if(isset($_GET['valide']) && $_GET['valide'] == "ok"){
                print '<div class="alert alert-success">perssones valider avec success </div>';
            }
            ?>
          <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $get_prs="SELECT * FROM regestre where etat=0";
        $run_prs=mysqli_query($conn,$get_prs);
        while($row_prs=mysqli_fetch_assoc($run_prs)){
            $id = $row_prs['id'];
            $name= $row_prs['name'];
            $lastname= $row_prs['lastname'];
            $email= $row_prs['email'];
            $gender= $row_prs['gender'];
            
            
            ?>
    <tr>
        <th scope="row">1</th>
        <td ><?php echo $name ?></td>
        <td><p><?php echo $lastname ?></p></td>
        <td><p><?php echo $email ?></p></td>
        <td><p><?php echo $gender ?></p></td>

        <td>
            <a href="valide.php?id=<?php echo $id ?>" class="btn btn-outline-danger">Valide</a>
        </td>
    </tr>
    </tbody>
    <?php
        }
  ?>
</table>
        </main>
      </div>
    </div>

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
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
