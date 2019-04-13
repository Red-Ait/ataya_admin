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
      <script>
        function posst(id) {
            const Http = new XMLHttpRequest();
            const url='messageVuAction.php?id=' + id;
            Http.open("GET", url);
            Http.send();
            Http.onreadystatechange=(e)=>{
            var x = document.getElementsByName("info" + id);
            x.forEach(function(item){
                item.style.fontWeight = "normal";
             });
            }
        }
      </script>
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
                                            $req = $bdd->query("SELECT * FROM message");
                                            echo $number_of_rows  = 0;

                                            while($ligne = $req ->fetch()) {
                                                $number_of_rows ++;
                                                echo'
                                                        <div class="modal fade" id="msg'.$ligne['id'].'" role="dialog">
                                                            <div class="modal-dialog">
                                                            
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Image.</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <h4>'.$ligne['name'].'</h4>
                                                                    <span style="font-style: italic; font-size: 12px">'.$ligne['date'].'</span>
                                                                    <br>
                                                                    <p>
                                                                        <strong>Objet:</strong> '.$ligne['subject'].'
                                                                    </p>
                                                                    <p>
                                                                        '.$ligne['message'].'
                                                                    </p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer.</button>
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
        $page = 'msg';
        include("sidebar.php");
    ?>

    <div class="main-panel">
		<?php
        include("navbar.php");
        ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Gérer vos messages.</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                            
                                <?php
                                    $req = $bdd->query("SELECT * FROM message ORDER BY id DESC");

                                    if($number_of_rows > 0) {
                                    echo'
                                        <table class="table table-hover table-striped">
                                            <thead>

                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                                <th>Sujet</th>
                                            </thead>
                                            <tbody>
                                            ';

                                        if(!$bdd){

                                        }   
                                        else {
                                            while($ligne = $req ->fetch()) {

                                                if($ligne['vu'] == 1) {
                                                    echo '<tr data-toggle="modal" data-target="#msg'.$ligne['id'].'" style="cursor: pointer;">
                                                    <td>'.$ligne['id'].'</td>
                                                    <td>'.$ligne['name'].'</td>
                                                    <td>'.$ligne['email'].'</td>
                                                    <td>'.$ligne['date'].'</td>
                                                    <td>'.$ligne['subject'].'</td>
                                                    </tr>';
                                                } else {
                                                    echo '<tr onclick="posst('.$ligne['id'].')" data-toggle="modal" data-target="#msg'.$ligne['id'].'" style="cursor: pointer;  ">
                                                    <td name="info'.$ligne['id'].'" style="font-weight: bold;">'.$ligne['id'].'</td>
                                                    <td name="info'.$ligne['id'].'"  style="font-weight: bold;">'.$ligne['name'].'</td>
                                                    <td name="info'.$ligne['id'].'"  style="font-weight: bold;">'.$ligne['email'].'</td>
                                                    <td name="info'.$ligne['id'].'"  style="font-weight: bold;">'.$ligne['date'].'</td>
                                                    <td name="info'.$ligne['id'].'"  style="font-weight: bold;">'.$ligne['subject'].'</td>
                                                    </tr>';
                                                }
                                                
                                            }
                                        }

                                            echo'
                                            </tbody>
                                        </table>';
                                    } else {
                                        echo '<h3 style="width:100%; text-align: center">Aucune message n\'est reçu</h3>';
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
