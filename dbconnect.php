<?php

$servername='localhost';
$username='root';
$password='';
$database='pulse';


$con=mysqli_connect($servername,$username,$password,$database);

if(!$con){
    echo "database connection failed due to ".mysqli_connect_error();
}

?>