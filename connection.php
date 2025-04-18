<?php
$dbs="mysql:host=localhost;dbname=edu_tracker";
$user='root';
$pwd='';
$db=new PDO($dbs,$user,$pwd,[PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION]);

?>
