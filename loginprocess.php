<?php
session_start();
include('connection.php');
$username=$_POST['username'];
$password=$_POST['password'];

$stmt=$db->prepare("SELECT * FROM users where username=:username");
$stmt->execute(['username'=>$username]);
$rowCount = $stmt->rowCount();
if($rowCount>0){
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($users as $row){
        $storedPassword=$row['password'];
        $role=$row['role'];
    }
    if($role=='Admin' && password_verify($password,$storedPwd)){
        $_SESSION['username']=$username;
        header("location:login.php");
    }
    if($role=='Editor' && password_verify($password,$storedPassword)){
        $_SESSION['username']=$username;
        header("location:dashboard.php");
    }
    else{echo"Access Denied You wrote wrong password";}
}
else{echo"Access Denied User not found";}
?>