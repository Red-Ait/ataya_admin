<?php 

require 'auth.php';

if(isset($_GET['id'])) {
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ataya';

$bdd = new PDO('mysql:host='.$host.';dbname='.$db.'', $user, $pass);
        $req = $bdd->prepare('UPDATE message SET vu = 1 WHERE id = :id');
            $req->execute(array(
            'id' => $_GET['id']
            ));

    
}
echo '<script>
window.location.replace("message.php");
</script>';
?>