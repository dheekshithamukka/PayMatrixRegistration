<?php
$con = mysqli_connect('localhost','pay_matrix','PayMatrix','payMatrixRegistration');
if(mysqli_connect_errno()){
    echo "Failed to connect ".mysqli_connect_error();
}
session_start();
?>

