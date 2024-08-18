<?php

// connect to database
$conn = mysqli_connect('localhost','zany', 'zany', 'zanysCompany');

// check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
?>