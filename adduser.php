<?php
if(isset($_POST['SAVE']));
include('connection.php');
// include('coonection2.php');
$username=$_POST['username'];
$password=$_POST['password'];
$pass_encrypted=password_hash($password,PASSWORD_DEFAULT);
// mysqli_query($conn, "insert into users(username,password) VALUES('$username','$password')") or die('Faled to save' .mysqli_error($conn));
$stmt=$db->prepare('insert into users(username,password,role) values(:username,:password,)');
//$stmt->bindParam('ss',$username,$password);
$stmt->execute(['username'=>$username,'password'=>$pass_encrypted,]);

?>
