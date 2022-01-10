<?php

$host = "localhost";
$username = "119019";
$password = "saltaire";
$dbname = "119019";

$dsn = "mysql:host=$host;dbname=$dbname"; 
// get all users
$sql = "SELECT * FROM psw_main";
try{
  $pdo = new PDO($dsn, $username, $password);
  $stmt = $pdo->query($sql);
   
  if($stmt === false){
   die("Error");
  }
   
}catch (PDOException $e){
  echo $e->getMessage();
}

?>
