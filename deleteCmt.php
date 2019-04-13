<?php

require 'auth.php';

if(isset($_POST['opt']) && $_POST['opt'] == 'delete') {
    if(isset($_POST['id'])){
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ataya';

$bdd = new PDO('mysql:host='.$host.';dbname='.$db.'', $user, $pass);
        $req = $bdd->prepare('DELETE FROM comments WHERE id = :id');
            $req->execute(array(
            'id' => $_POST['id']
            ));
            echo '<script>
            window.location.replace("commentaires.php?delete=ok");
            </script>';

    }
}
echo '<script>
window.location.replace("galeri.php");
</script>';
?>