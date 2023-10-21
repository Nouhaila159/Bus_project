<?php
session_start();
 include 'config.php';
 $pointDepart=$_GET['point_arret'];
 $pointArrivee=$_GET['point_arret2'];
$sql=mysqli_query($mysqli,"SELECT nom_point FROM point_arret where id_point='$pointDepart'");
$sql1=mysqli_query($mysqli,"SELECT nom_point FROM point_arret where id_point='$pointArrivee'");
$sql2=mysqli_query($mysqli, "SELECT num_ligne FROM ligne WHERE point_depart='$pointDepart' AND point_arrivee='$pointArrivee'");
    

if (mysqli_num_rows($sql) > 0) {


     } 

    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
     
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>MyFUTURE BUS</title>
        <meta name="description" content="Free Bootstrap 4 Theme by ProBootstrap.com">
        <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">

        <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/fonts/ionicons/css/ionicons.min.css">
    
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="assets/fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/select2.css">
    

    <link rel="stylesheet" href="assets/css/helpers.css">
    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    <body>
  
    
    <section class="probootstrap-cover overflow-hidden relative"  style="background-image: url('assets/images/bg_2.jpg');" data-stellar-background-ratio="0.5"  id="section-home">
      <div class="overlay"></div>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md">
            <h2 class="heading mb-2 display-4 font-light probootstrap-animate">Your Future bus in CASABLANCA</h2>
            <p class="lead mb-5 probootstrap-animate">
              
          </div> 
          <div class="col-md probootstrap-animate" >
            <form action="chercher.php" method="post" class="probootstrap-form">
              <div class="form-group" >
                <div class="row mb-3" >
                  <div class="col-md">
                    <div class="form-group">
                      <label for="id_label_single">From</label>

                      <label for="id_label_single" style="width: 100%;">
                      <?php while($row = mysqli_fetch_assoc($sql)) { ?>
                         <input type="text" name="point_arret" class="form-control" readonly placeholder= <?php echo $row["nom_point"]?>>
                        <?php } ?>
                      </label>
                    </div>
                  </div>
                  
                  <div class="col-md">
                    <div class="form-group">
                      <label for="id_label_single2">To</label>
                      
                        <label for="id_label_single2" style="width: 100%;">
                        <?php while($row = mysqli_fetch_assoc($sql1)) { ?>
                         <input type="text" name="point_arret" class="form-control" readonly placeholder= <?php echo $row["nom_point"]?>>
                        <?php } ?>
                        </label>

                      </label>
                    </div>

                  </div>
                  </div>
                  <div class="col-md">
                    <div class="form-group">
                      <?php  while($row = mysqli_fetch_assoc($sql2)) {  $ligne=$row["num_ligne"]?>
                        <input type="text" name="ligne" class="form-control" readonly placeholder="<?php  echo "ligne: ".$row["num_ligne"] ?>" style="width:50%; margin:15px auto ;">
                      <?php } ?>
                      </div>
                  </div>
                

              <div class="col-md">
                <table class="table" >
                        <thead>
                          <tr>
                            <th scope="col">Point Arret</th>
                            <th scope="col">Heure</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                              $sql3 = mysqli_query($mysqli, "SELECT heure, nom_point 
                              FROM ligne l JOIN avoir a JOIN point_arret pa JOIN horaire h 
                              ON l.id_ligne=a.ligne AND pa.id_point=a.point_arret AND a.horaire=h.id_heure 
                              WHERE  num_ligne=$ligne order by heure ASC");


                              while ($row = mysqli_fetch_assoc($sql3)) {
                            ?>
                          <tr>
                            <td><?php echo $row["nom_point"] ?></td>
                            <td><?php  echo $row["heure"] ?></td>
                          </tr>   
                          <?php } ?>
                          </tbody>
                 </table>                        
             </div>
                  
             
            </form>
            <div class="col-md">
                    <div class="form-group">
                    <label >Bus
                      <?php 
                        $sql5 = mysqli_query($mysqli, "SELECT immatriculation FROM ligne l JOIN bus b ON l.id_ligne=b.ligne WHERE num_ligne=$ligne");

                        while($row = mysqli_fetch_assoc($sql5)) {
                      ?>
                        <input type="text" name="point_arret2" class="form-control" style=" width:70%; " placeholder="<?php echo $row["immatriculation"] ?>" readonly>
                        <?php  } ?>
                        </label> 
                        
                        <a 
                        href="index.php" class="btn" style="float:right; margin-top:20px; background:#00CA4C; color:white; 
                        box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );">Go back</a>
                      </div>
                  </div>
          </div>
        </div>
      </div>

    
    </section>
    <!-- END section -->
    
   

    
    <script src="assets/js/jquery.min.js"></script>
    
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>

    <script src="assets/js/bootstrap-datepicker.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.easing.1.3.js"></script>

    <script src="assets/js/select2.min.js"></script>

    <script src="assets/js/main.js"></script>
    </body>
</html>