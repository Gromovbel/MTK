<?php

session_start();

    if(isset($_POST['closeAdmin'])) 
    {
        session_destroy();
        header("Location: index.php");
        exit();
    }

?>