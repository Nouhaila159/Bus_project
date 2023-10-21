<?php
session_start();
extract($_POST);
$b = true;
include 'config.php';
$sql = "SELECT * FROM bus 
 inner join ligne on bus.ligne=ligne.id_ligne";
$table = "";
$row = $err = '';
$S = '';
$result = mysqli_query($mysqli, $sql);
if (isset($_POST["add"])) {

  $immatriculation = $_POST["imma"];
  $Num = $_POST["ligne"];
  if ($b) {
    $sql = "INSERT INTO bus (immatriculation,ligne) VALUES ('$immatriculation','$Num')";
    if (!mysqli_query($mysqli, $sql)) {
      echo 'Erreur de connexion (' . mysqli_connect_errno() . ') ' . mysqli_connect_error();
    }
    header("location:home.php");
  }


}
$option = '';
$sql2 = 'SELECT * FROM ligne';
$res = mysqli_query($mysqli, $sql2);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $option .= '<option value ="' . $row['id_ligne'] . '" >' . $row['num_ligne'] . '</option>';
    }
}
?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title>MyFuture_BUS</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!----css3---->
  <link rel="stylesheet" href="css/custom.css">
  
<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

  <!--google fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">


  <!--google material icon-->
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
</head>

<body>
  <form action="home.php" method="POST">
    <div class="wrapper">


      <div class="body-overlay"></div>

      <!-------------------------sidebar------------>
      <!-- Sidebar  -->
      <nav id="sidebar">
        <div class="sidebar-header">
          <h3><img src="img/logo.png" class="img-fluid" /><span>MyFuture BUS</span></h3>
        </div>
        <ul class="list-unstyled components">
          <li class="active">
            <a href="#" class="dashboard"><i class="material-icons">GESTION DES BUS</i>
              <span>Administrateur</span></a>
          </li>


          <li class="dropdown">
            <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="material-icons">apps</i>Espace Bus</a>
            <ul class="collapse list-unstyled menu" id="homeSubmenu1">
              <li>
                <a href="home.php">Liste des Bus</a>
              </li>

            </ul>
          </li>

          <li class="dropdown">
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="material-icons">apps</i><span>Espace Trajet</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu2">
              <li>
                <a href="ligne.php">Liste des Trajets</a>
              </li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
              <i class="material-icons">apps</i>


              <span>Espace Point d'arret</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu3">
              <li>
                <a href="pointArret.php">Liste des Points d'arret</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
                        <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">apps</i><span>Espace Details</span></a>
                        <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                            <li>
                                <a href="details_ligne.php">Details des lignes</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#pageSubmenu6" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">apps</i><span>Espace ville</span></a>
                        <ul class="collapse list-unstyled menu" id="pageSubmenu6">
                            <li>
                                <a href="ville.php">Gestion des villes</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">apps</i><span>Espace Horaire</span></a>
                        <ul class="collapse list-unstyled menu" id="pageSubmenu7">
                            <li>
                                <a href="heure.php">Gestion des horaires</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#pageSubmenu8" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <i class="material-icons">apps</i><span>Espace reclamation</span></a>
                        <ul class="collapse list-unstyled menu" id="pageSubmenu8">
                            <li>
                                <a href="reclamation.php">Espace réclamations</a>
                            </li>
                        </ul>
                    </li>

      </nav>
      <!--------page-content---------------->

      <div id="content">

        <!--top--navbar----design--------->

        <div class="top-navbar">
          <div class="xp-topbar">

            <!-- Start XP Row -->
            <div class="row">
              <!-- Start XP Col -->
              <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                <div class="xp-menubar">
                  <span class="material-icons text-white">signal_cellular_alt
                  </span>
                </div>
              </div>
              <!-- End XP Col -->

              <!-- Start XP Col -->
              <div class="col-md-5 col-lg-3 order-3 order-md-2">
                <div class="xp-searchbar">
                  <form method ='POST'> 
                    <div class="input-group">
                      <input type="search" name ="valueToSearch" class="form-control" placeholder="Search">
                      <div class="input-group-append">
                        <button class="btn" type="submit" name="search"  id="button-addon2">GO</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- End XP Col -->

              <!-- Start XP Col -->
              <div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">
                <div class="xp-profilebar text-right">
                  <nav class="navbar p-0">
                    <ul class="nav navbar-nav flex-row ml-auto">

                      <li class="nav-item dropdown">
                        <a class="nav-link" href="#" data-toggle="dropdown">
                          <!-- <img src="img/user.jpg" style="width:40px; border-radius:50%;" /> -->
                          <i class="fa-solid fa-user"></i>
                          <span class="xp-user-live"></span>
                        </a>
                        <ul class="dropdown-menu small-menu">
                          <li>
                            <a href="#">
                              <span class="material-icons">person_outline</span>Profile

                            </a>
                          </li>
                          <li>
                            <a href="#"><span class="material-icons">settings </span>Paramètres</a>
                          </li>
                          <li>
                            <a href="logout.php"><span class="material-icons">logout</span>Déconnecter</a>
                          </li>
                        </ul>
                      </li>
                    </ul>


                  </nav>

                </div>
              </div>
              <!-- End XP Col -->

            </div>
            <!-- End XP Row -->

          </div>
          <div class="xp-breadcrumbbar text-center">
            <?php
            if (isset($_SESSION["id"])) {
            ?>
              <ol class="breadcrumb">

                <li><a style="color:white;" href="#">Bonjour, <?php echo " " . $_SESSION["username"]; ?></a></li>
              </ol>
            <?php
            } ?>

          </div>

        </div>



        <!--------main-content------------->

        <div class="main-content">
          <div class="row">

            <div class="col-md-12">
              <div class="table-wrapper">
                <div class="table-title">
                  <div class="row">
                    <div class="col-sm-6 p-0 d-flex justify-content-lg-start justify-content-center">
                      <h2 class="ml-lg-2">Gestion des Bus</h2>
                    </div>
                    <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
                      <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                        <i class="material-icons">&#xE147;</i> <span>Ajouter un Bus</span></a>
                      <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                        <i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>
                    </div>
                  </div>
                </div>

                <table border="1" class="table table-striped table-hover" id="tb1">
                  <tr bgcolor='#CCCCCC'>
                    <thead>
                      <td>Immatriculation</td>
                      <td>Numero de ligne</td>
                      <td>Actions</td>
                  </tr>


                  <?php 
if (isset($_POST['search'])) {
  $sql = "SELECT * FROM bus 
  inner join ligne on bus.ligne=ligne.id_ligne WHERE immatriculation=$valueToSearch";
     $result = mysqli_query($mysqli, $sql);
     while ($res = mysqli_fetch_array($result)) {
         echo "<tr>";
         echo "<td>" . $res['immatriculation'] . "</td>";
         echo "<td>" . $res['num_ligne'] . "</td>";
         echo "<td><a href=\"updateBus.php?id_bus=$res[id_bus]\">Edit</a> | <a href=\"deleteBus.php?id_bus=$res[id_bus]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
         echo "</tr>";
     }
} else {
  $sql = "SELECT * FROM bus 
inner join ligne on bus.ligne=ligne.id_ligne";
  $result = mysqli_query($mysqli, $sql);
  while ($res = mysqli_fetch_array($result)) {
      echo "<tr>";
      echo "<td>" . $res['immatriculation'] . "</td>";
      echo "<td>" . $res['num_ligne'] . "</td>";
      echo "<td><a href=\"updateBus.php?id_bus=$res[id_bus]\">Edit</a> | <a href=\"deleteBus.php?id_bus=$res[id_bus]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
      echo "</tr>";
  }
}

?>
                </table>

                <!-- Edit Modal HTML -->
                <div id="addEmployeeModal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form action="home.php" method="POST">
                        <div class="modal-header">
                          <h4 class="modal-title">Ajouter un Bus</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Immatriculation</label>
                            <input type="text" class="form-control" required="required" name="imma">
                          </div>
                          <div class="form-group">
                            <label>Numero de ligne</label>
                            <select name="ligne" class="form-control">
                                                                <option selected disabled>Choose...</option>
                                                                <?php echo $option  ?>
                                                            </select>
                          </div>

                          <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-success" value="Add" name="add">
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Edit Modal HTML -->
                <div id="editEmployeeModal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form>
                        <div class="modal-header">
                          <h4 class="modal-title">Modifier</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Immatriculation</label>
                            <input type="text" class="form-control" required="required">
                          </div>
                          <div class="form-group">
                            <label>Numero de ligne</label>
                            <input type="text" class="form-control" required="required">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                          <input type="submit" class="btn btn-info" value="Save">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>



                <!-- Delete Modal HTML -->
                <div id="deleteEmployeeModal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <form>
                        <div class="modal-header">
                          <h4 class="modal-title">Delete Employee</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <p>Are you sure you want to delete these Records?</p>
                          <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                          <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                          <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                      </form>
                    </div>
                  </div>
                </div>


              </div>


              <!---footer---->


            </div>

            <footer class="footer">
              <div class="container-fluid">
                <div class="footer-in">
                  <p class="mb-0">My Future Bus</p>
                </div>
              </div>
            </footer>
          </div>
        </div>


        <!----------html code compleate----------->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.3.1.slim.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-3.3.1.min.js"></script>


        <script type="text/javascript">
          $(document).ready(function() {
            $(".xp-menubar").on('click', function() {
              $('#sidebar').toggleClass('active');
              $('#content').toggleClass('active');
            });

            $(".xp-menubar,.body-overlay").on('click', function() {
              $('#sidebar,.body-overlay').toggleClass('show-nav');
            });

          });
        </script>
  </form>
</body>

</html>