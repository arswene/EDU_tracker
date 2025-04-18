<?php
$servername="localhost";
$user="root";
$password='';
$database="edu_tracker";

$conn=mysqli_connect($servername,$user,$password,$database) or die('connection failed '.mysqli_connect_error());
echo"CONNECTION ESTABLISHED";




?>