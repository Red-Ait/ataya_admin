<?php

require 'auth.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css'>

      <link rel="stylesheet" href="css/style.css">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
                            <?php
                            $bdd = new PDO('mysql:host=localhost;dbname=ataya;charset=utf8', 'root', '');
                                        if(!$bdd){

                                        }   
                                        else {
                                            $reqNew = $bdd->query("SELECT * FROM comments where approbation = 0");
                                            echo $number_of_rowsNew  = 0;

                                            while($ligne = $reqNew ->fetch()) {
                                                $number_of_rowsNew ++;
                                            }
                                            $req = $bdd->query("SELECT * FROM comments");
                                            echo $number_of_rows  = 0;

                                            while($ligne = $req ->fetch()) {
                                                $number_of_rows ++;
                                                echo'
                                                        <div class="modal fade" id="deleteCmt'.$ligne['id'].'" role="dialog">
                                                            <div class="modal-dialog">
                                                            
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Confirmation</h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                            Voulez-vous rejeter ce commentaire ?
                                                                </div>
                                                                <div class="modal-footer" style="display: flex">
                                                                <div style="width: 50%"></div>
                                                                <button type="button" style="width: 25%;; margin: 15px" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                                <form action="deleteCmt.php" style="width: 25% ; margin: 15px" method="post">
                                                                    <input type="hidden" name="opt" value="delete">
                                                                    <input type="hidden" name="id" value="'. $ligne['id'].'">
                                                                <input type="submit" style="width: 100%" class="btn btn-warning" value="Confirmer">
                                                                </form>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                
                                                ';
                                            }
                                        }
                                        ?>
<div class="wrapper">
    <?php
        $page = 'cmt';
        include("sidebar.php");
    ?>

    <div class="main-panel">
		<?php
        include("navbar.php");
        ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <?php
            if(isset($_GET['delete']) && $_GET['delete'] == 'ok') {
                echo'
                    <div class="alert alert-success col-lg-10 col-lg-offset-1">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span>Ce commentaire a été bien supprimée.</span>
                    </div>
                    ';
            }
            if(isset($_GET['approbation']) && $_GET['approbation'] == 'ok') {
                echo'
                    <div class="alert alert-success col-lg-10 col-lg-offset-1">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span>Ce commentaire a été bien accepté.</span>
                    </div>
                    ';
            }
?>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Commentaires sur vos événement.</h4>
                                <p class="category">Accepter ou rejeter les commentaires.</p>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <?php
                                    if($number_of_rowsNew > 0) {
                                        if(!$bdd){
                                        }   
                                        else {
                                            $req = $bdd->query("SELECT * FROM comments where approbation = 0");
                                                echo'
                                            <table class="table table-hover table-striped">
                                                <thead>

                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Prenom</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Contenue</th>
                                                    <th></th>
                                                </thead>
                                                <tbody>';
                                                    

                                            while($ligne = $req ->fetch()) {
                                                echo '
                                                <tr>
                                                    <th>'.$ligne['id'].'</th>
                                                    <th>'.$ligne['nom'].'</th>
                                                    <th>'.$ligne['prenom'].'</th>
                                                    <th>'.$ligne['email'].'</th>
                                                    <th style="font-size:12px">'.$ligne['date'].'</th>
                                                    <th style="width: 30%">'.$ligne['contenue'].'</th>
                                                    <th>
                                                    <form action="acceptCmt.php" method="post">
                                                                    <input type="hidden" name="opt" value="approb">
                                                                    <input type="hidden" name="id" value="'. $ligne['id'].'">
                                                        <button class="btn" style="color: green"><i class="pe-7s-pin" style="color: green" ></i></button>
                                                    </form>
                                                    <button class="btn " style="color: red" data-toggle="modal" data-target="#deleteCmt'.$ligne['id'].'">X</button</th>
                                                </tr>';
                                                                                     }
                                                                                 } 
                                                                                 
                                echo'

                                    </tbody>
                                    </table>';} else {
                                        echo '<h3 style="width:100%; text-align: center">Aucune nouveau commentaire.</h3>';
                                    }
                                            ?>

                            </div>
                        </div><div class="card">
                            <div class="header">
                                <h4 class="title">Commentaires acceptées.</h4>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <?php


                                    if($number_of_rows > 0) {
                                            $req = $bdd->query("SELECT * FROM comments WHERE approbation = 1 ");
                                                echo'
                                            <table class="table table-hover table-striped">
                                                <thead>

                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Prenom</th>
                                                    <th>Email</th>
                                                    <th>Date</th>
                                                    <th>Contenue</th>
                                                    <th></th>
                                                </thead>
                                                <tbody>';
                                                    

                                            while($ligne = $req ->fetch()) {
                                                echo '
                                                <tr>
                                                    <th>'.$ligne['id'].'</th>
                                                    <th>'.$ligne['nom'].'</th>
                                                    <th>'.$ligne['prenom'].'</th>
                                                    <th>'.$ligne['email'].'</th>
                                                    <th style="font-size:12px">'.$ligne['date'].'</th>
                                                    <th style="width: 30%">'.$ligne['contenue'].'</th>
                                                    <th>
                                                    <button class="btn " style="color: red" data-toggle="modal" data-target="#deleteCmt'.$ligne['id'].'">X</button</th>
                                                </tr>';
                                                                                     }
                                                                                 
                                                                                 
                                echo'

                                    </tbody>
                                    </table>';
                                    } else {
                                        echo '<h3 style="width:100%; text-align: center">Aucune nouveau commentaire.</h3>';                                        
                                    }
                                            ?>

                            </div>
                        </div>
                    </div>


                    


                </div>                  
            </div>
        </div>

    	<?php
        include("footer.php");
        ?>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/knockout/3.1.0/knockout-min.js'></script>
<script src='https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.js'></script>

  

    <script  src="js/index.js"></script>

</html>
