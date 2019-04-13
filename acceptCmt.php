<?php 
require 'auth.php';
if(isset($_POST['opt']) && $_POST['opt'] == 'approb') {
    if(isset($_POST['id'])){
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ataya';

$bdd = new PDO('mysql:host='.$host.';dbname='.$db.'', $user, $pass);
        $req = $bdd->prepare('UPDATE comments SET approbation = 1 WHERE id = :id');
            $req->execute(array(
            'id' => $_POST['id']
            ));
            echo '<script>
            window.location.replace("commentaires.php?approbation=ok");
            </script>';

    }
}
echo '<script>
window.location.replace("galeri.php");
</script>';
?>