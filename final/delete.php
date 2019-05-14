<?php

session_start();
include 'dbConnection.php';
$dbConn = getDatabaseConnection('final');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM timeslot WHERE id = '$id'";
    $stmt = $dbConn->prepare($sql);
    $results = $stmt->execute(); 
    
    echo json_encode($results);
}

?>