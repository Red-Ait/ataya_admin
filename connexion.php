<?php
session_start(); 
if(isset($_POST['connexion'])) { 
    if(empty($_POST['pseudo'])) { 
        
                    echo '<script>
    window.location.replace("login.php?err=login_vide");
    </script>';

        
        } else {
        if(empty($_POST['mdp'])) {
        
                echo '<script>
        window.location.replace("login.php?err=mdp_vide");
        </script>';

             } else {
            $Pseudo = htmlspecialchars($_POST['pseudo']);
            $MotDePasse = htmlspecialchars($_POST['mdp']);

            $bdd = new PDO('mysql:host=localhost;dbname=ataya;charset=utf8', 'root', '');
            if(!$bdd){
                 }   
            else {
                $req = $bdd->query("SELECT * FROM admin WHERE login = '".$Pseudo."'");
                $resultat = $req->fetch();
                if(!$resultat) {
                            echo '<script>
                            window.location.replace("login.php?err=err");
                            </script>';
                    }
                 else {
                        $isPasswordCorrect = password_verify($_POST['mdp'], $resultat['passwd']);

                    if (!$isPasswordCorrect) { 
                            echo '<script>
                            window.location.replace("login.php?err=err");
                            </script>';
                    }
                    else{
                        // Ouvrir la session
                        $_SESSION['login'] = $Pseudo; 
                            echo '<script>
                            window.location.replace("dashboard.php");
                            </script>';
                    }   
                }
            }
        }
    }
}
?>