
<?php
session_start();
extract($_POST);

include 'config.php';
$table = "";
$row = $err = '';
$S = '';

$result4 = mysqli_query($mysqli, 
$sql = "SELECT DISTINCT id_ligne, num_ligne, p.nom_point as pointDepart, pp.nom_point as pointArrivee 
FROM ligne JOIN point_arret p JOIN point_arret pp 
on ligne.point_depart=p.id_point and ligne.point_arrivee=pp.id_point 
WHERE p.id_point IN ( SELECT point_depart FROM ligne) and  pp.id_point IN ( SELECT point_arrivee FROM ligne)");


$b = true;
if (isset($_POST["add"])) {

  $num_ligne = $_POST["num_ligne"];
  $point_depart = $_POST["point_depart"];
  $point_arrivee = $_POST["point_arrivee"];
  if ($b) {
    $sql3 = "INSERT INTO ligne (num_ligne,point_depart,point_arrivee) VALUES ('$num_ligne','$point_depart','$point_arrivee')";
    mysqli_query($mysqli, $sql3);
    header("location:ligne.php");
} else {
    echo mysqli_error($mysqli);
}
  }
 

$option = '';
$sql2 = 'SELECT * FROM point_arret';
$res = mysqli_query($mysqli, $sql2);
if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $option .= '<option value ="' . $row['id_point'] . '" >' . $row['nom_point'] . '</option>';
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
    <title>MyFuture_ligne</title>
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

    <form action="ligne.php" method="post">
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
                                <a href="#">Liste des Trajets</a>
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
                                    <form>
                                        <div class="input-group">
                                            <input type="search" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" id="button-addon2">GO</button>
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
                                            <h2 class="ml-lg-2">Gestion des ligne</h2>
                                        </div>
                                        <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center">
                                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                                <i class="material-icons">&#xE147;</i> <span>Ajouter un ligne</span></a>
                                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal">
                                                <i class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>
                                        </div>
                                    </div>
                                </div>

                                <table border="1" class="table table-striped table-hover" id="tb1">
                                    <tr bgcolor='#CCCCCC'>
                                        <thead>
                                            <td>Num Ligne</td>
                                            <td>Point Depart</td>
                                            <td>Point Arriver</td>
                                            <td>Actions</td>
                                    </tr>
                                    <?php
                                
                                    
                  while ($res4 = mysqli_fetch_array($result4)) {
                
                    echo "<tr>";
                    echo "<td>" . $res4['num_ligne'] . "</td>";
                    echo "<td>" . $res4['pointDepart'] . "</td>";
                    echo "<td>" . $res4['pointArrivee'] . "</td>";
                      
                      echo "<td><a href=\"updateLigne.php?id_ligne=$res4[id_ligne]\">Edit</a> |
                       <a href=\"deleteLigne.php?id_ligne=$res4[id_ligne]
                       \" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                    echo "</tr>";
                  }
                  ?>
                                    
                                </table>

                                <!-- Edit Modal HTML -->
                                <div id="addEmployeeModal" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="ligne.php" method="POST"> 
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Ajouter un ligne</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Num de ligne</label>
                                                        <input type="text" class="form-control" required="required" name="num_ligne">
                                                    </div>


                                                    <div class="form-group">
                                                       <label>Point Depart</label>
                                                             <select name="point_depart" class="form-control">
                                                                <option selected disabled>Choose...</option>
                                                                   <?php echo $option  ?>
                                                                           </select>
                                                                                 </div>
                                                      <div class="form-group">
                                                       <label>Point Arriver</label>
                                                             <select name="point_arrivee" class="form-control">
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
                                                        <label>Num de ligne</label>
                                                        <input type="text" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Point Depart</label>
                                                        <input type="text" class="form-control" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Point Arriver</label>
                                                        <input type="text" class="form-control" required="required">
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