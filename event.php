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
                                            $req = $bdd->query("SELECT * FROM events");
                                            echo $number_of_rows  = 0;

                                            while($ligne = $req ->fetch()) {
                                                $number_of_rows ++;
                                                echo'
                                                        <div class="modal fade" id="img'.$ligne['id'].'" role="dialog">
                                                            <div class="modal-dialog">
                                                            
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Image.</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <img style="width: 100%" src="data:image/jpeg;base64,'.base64_encode( $ligne['image'] ).'"/>                  </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer.</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                
                                                    ';
                                                echo'
                                                        <div class="modal fade" id="deleteEvent'.$ligne['id'].'" role="dialog">
                                                            <div class="modal-dialog">
                                                            
                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Image.</h4>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div style="display: flex">
                                                                        <div style="width: 80%">
                                                                            Voulez-vous supprimer cette photo ?
                                                                        </div>
                                                                        <div style="width: 20%">
                                                                          <img style="width: 100%" src="data:image/jpeg;base64,'.base64_encode( $ligne['image'] ).'"/>
                                                                        </div>
                                                                    </div>



                                                                </div>
                                                                <div class="modal-footer" style="display: flex">
                                                                <div style="width: 50%"></div>
                                                                <button type="button" style="width: 25%;; margin: 15px" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                                <form action="deleteEvent.php" style="width: 25% ; margin: 15px" method="post">
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
<div class="modal fade" id="addEvent" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajouter un événement</h4>
        </div>
        <div class="modal-body">

                                <form action="addEvent.php" method="post" enctype="multipart/form-data">     
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Titre</label>
                                                <input type="text" class="form-control" placeholder="Titre" name="titre">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sous titre</label>
                                                <input type="text" class="form-control" placeholder="Sous titre" name="stitre">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <input type="date" class="form-control" placeholder="Date" name="date">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Contenue</label>
                                                <textarea rows="5" class="form-control" style=" resize : none;" name="contenue" placeholder="Décrire votre événement ici."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input type="file" accept="image/*" class="form-control"  name="userfile">
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-warning btn-fill pull-right">Ajouter</button>
                                    <div class="clearfix"></div>
                                </form>
                                        </div>
        <div class="modal-footer" >
        <button type="button"  class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
    </div>
    </div>
</div>
<div class="wrapper">
    <?php
        $page = 'event';
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
                                    <span>L\'événement a été bien supprimée.</span>
                    </div>
                    ';
            }
            if(isset($_GET['msg'])) {
                switch($_GET['msg']) {
                    case 'data_inv':
                    echo'
                    <div class="alert alert-danger col-lg-10 col-lg-offset-1">
                        <button type="button" aria-hidden="true" class="close">×</button>
                        <span><b> Erreur - </b> Veuiller remplire tous les champs.</span>
                    </div>
                    ';
                    break;
                    case 'UPLOAD_ERR_INI_SIZE':
                    case 'UPLOAD_ERR_FORM_SIZE':
                    echo'
                    <div class="alert alert-danger col-lg-10 col-lg-offset-1">
                        <button type="button" aria-hidden="true" class="close">×</button>
                        <span><b> Erreur - </b> L\'image dépasse la taille autorisé.</span>
                    </div>
                    ';
                    break;
                    break;
                    case 'UPLOAD_ERR_NO_TMP_DIR':
                    case 'UPLOAD_ERR_PARTIAL':
                    case 'UPLOAD_ERR_CANT_WRITE':
                    case 'UPLOAD_ERR_EXTENSION':
                    case 'OTHER_ERR':
                    echo'
                    <div class="alert alert-danger col-lg-10 col-lg-offset-1">
                        <button type="button" aria-hidden="true" class="close">×</button>
                        <span><b> Erreur - </b> Une erreur s\'est produit, reéssayer s\'il vous plaît.</span>
                    </div>
                    ';
                    break;
                    case 'UPLOAD_ERR_NO_FILE':
                    echo'
                    <div class="alert alert-danger col-lg-10 col-lg-offset-1">
                        <button type="button" aria-hidden="true" class="close">×</button>
                        <span><b> Erreur - </b> Aucune image n\'est choisie.</span>
                    </div>
                    ';
                    break;
                    case 'ok':
                    echo'
                    <div class="alert alert-success col-lg-10 col-lg-offset-1">
                                    <button type="button" aria-hidden="true" class="close">×</button>
                                    <span>Votre image a été bien enregistrée.</span>
                    </div>
                    ';

                }
            }
?>



                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Gérer vos événements.</h4>
                                <button data-toggle="modal" data-target="#addEvent"deleteCmt class="btn" style="border: 1px solid green; margin: 15px" class="add">+ Ajouter un événement</button>
                            </div>
                            <div class="content table-responsive table-full-width">
                            
                                <?php
                                    $req = $bdd->query("SELECT * FROM events ORDER BY id DESC");

                                    if($number_of_rows > 0) {
                                    echo'
                                        <table class="table table-hover table-striped">
                                            <thead>

                                                <th>ID</th>
                                                <th>Titre</th>
                                                <th>Sous titre</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Image</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                            ';

                                        if(!$bdd){

                                        }   
                                        else {
                                            while($ligne = $req ->fetch()) {

                                                echo '<tr>
                                                <td>'.$ligne['id'].'</td>
                                                <td>'.$ligne['titre'].'</td>
                                                <td>'.$ligne['sous_titre'].'</td>
                                                <td style="width: 40%">'.$ligne['description'].'</td>
                                                <td>'.$ligne['created'].'</td>
                                                <td data-toggle="modal" data-target="#img'.$ligne['id'].'" style="cursor: pointer;">';
                                                
                                        echo '<img style="width: 50px" src="data:image/jpeg;base64,'.base64_encode( $ligne['image'] ).'"/>';
                                                echo '</td>
                                                <td><button data-toggle="modal" data-target="#deleteEvent'.$ligne['id'].'"  style="color: gray" class="btn">x</button></td>
                                                </tr>';
                                                
                                            }
                                        }

                                            echo'
                                            </tbody>
                                        </table>';
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
