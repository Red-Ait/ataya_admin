<?php
    session_start();
    if(isset($_SESSION['login'])) {
                       echo '<script>
                            window.location.replace("dashboard.php");
                            </script>';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>ATAYA Club Coworking</title>
  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
  <link rel="stylesheet" href="fluid-gallery.css">
  <!-- Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" />
  <!-- Squad theme CSS -->
  <link href="css/style.css" rel="stylesheet">
  <link href="color/default.css" rel="stylesheet">
  <link rel="stylesheet" href="csss/owl.carousel.css">
  <link rel="stylesheet" href="csss/owl.theme.css">
  <link rel="stylesheet" href="style.css">
<!--Hover-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Preloader -->
  <div id="preloader">
    <div id="load"></div>
  </div>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
      </div>
    </div>
    <!-- /.container -->
  </nav>
  <!-- Section: intro -->
  <section id="intro" class="intro">
		<title>Connecter</title>
	 		<div class="loginBox" >
                    <h2>Connexion</h2>
	 			    <form action="connexion.php" method="post">
	 				<p>Login</p>
	 				<input type="text" name="pseudo" placeholder="Entrez votre login ">
	 				<p>Mot de passe </p>
	 				<input type="password" name="mdp" placeholder="Mot de passe ">
           <?php
           if(isset($_GET['err'])) {
             switch ($_GET['err']) {
               case 'login_vide':
               case 'mdp_vide':
                echo '
                  <div style="text-align: center; width: 100%;  margin: 15px">
                    <span style="color: red; ">Veuillez remplire tous les champs !</span>
                  </div>
                ';
               break;
               case 'err';
                echo '
                    <div style="text-align: center; width: 100%;  margin: 15px">
                      <span style="color: red; ">Login ou mot de passe incorrecte !</span>
                    </div>
                ';
               break;
             }
           }

           ?>
	 				<input type="submit" name="connexion" value="Connexion">
	 			</form>
	 		</div>
  </section>
  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/wow.min.js"></script>
  <script src="jss/jquery.js"></script>
<script src="jss/bootstrap.min.js"></script>
<script src="jss/jquery.parallax.js"></script>
<script src="jss/owl.carousel.min.js"></script>
<script src="jss/smoothscroll.js"></script>
<script src="jss/wow.min.js"></script>
<script src="jss/custom.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>