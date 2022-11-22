<?php
try {
    $host="mysql:host=localhost;dbname=phpdemo1;";
    $pass="";
    $user="root";
    $conn = new PDO($host,$user,$pass);

}catch (PDOException $th) {
    //throw $th;
    $th->getMessage();
}
include 'crud.php';
$obj=new crud($conn);

?>