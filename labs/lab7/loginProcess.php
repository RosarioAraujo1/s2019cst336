<?php
session_start();//starts session

//print_r($_POST); // fro debugging 
include'../../databaseConnection/dbConnection.php';

$conn = getDatabaseConnection("ottermart");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM om_admin WHERE username= :username AND password = :password";
$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$stml = $conn->prepare($sql);
$stml->execute($namedParameters);
$record = $stml->fetch(PDO::FETCH_ASSOC); // 
    if(empty($record)){
        echo "Username or Password are incorrect!";
    }
    else{
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        header('location: admin.php');//redirecting to a new file
    }
?>