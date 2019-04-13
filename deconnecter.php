<?php
session_start();


    if (isset($_SESSION['login']))
    {
		$_SESSION = array();
		session_unset();
		session_destroy();
        echo '<script>
        window.location.replace("login.php");
        </script>';
	}
	else
	{
        echo '<script>
        window.location.replace("login.php");
        </script>';
	}
?>