
<?php

session_start();
    session_destroy();
    header("location:index.php");
    echo"logout successfully";
    exit(); 


?>