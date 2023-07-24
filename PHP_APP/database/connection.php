<?php 
$connection = new mysqli("localhost","Aditya","123456","user_curd");
$user_details;
if(!$connection){
    die(mysqli_error($connection));
}
?>