<?php
if(isset($_POST['SAVE']));
include('pdoconnection.php');
// include('coonection2.php');
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];
$pass_encrypted=password_hash($password,PASSWORD_DEFAULT);
// mysqli_query($conn, "insert into registration(username,password) VALUES('$username','$password')") or die('Faled to save' .mysqli_error($conn));
$stmt=$db->prepare('insert into registration(username,password,role) values(:username,:password,:role)');
//$stmt->bindParam('ss',$username,$password);
$stmt->execute(['username'=>$username,'password'=>$pass_encrypted,'role'=>$role]);
header("location:index2.php");
?>
