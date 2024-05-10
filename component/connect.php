<?php

$username="root";
$password="";
$database="idiscuss";
$servername="localhost";
$conn = mysqli_connect($servername,$username,$password,$database);

if($conn){
    echo"connection established with databases";
}


?>
