<?php
if(isset($_POST['save']))
include 'connection.php';

$Username =$_POST['username'];
$Password =$_POST['password']; password_hash('password', PASSWORD_DEFAULT);

mysqli_query($conn, "INSERT INTO users (Username, Password) VALUES ('$username', '$password')")or die('failed to insert the staff  '.mysqli_error($conn));
echo "User added!";
mysqli_close($conn);
?>
