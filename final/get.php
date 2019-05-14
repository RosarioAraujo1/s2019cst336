<?php

session_start();
include 'dbConnection.php';
$dbConn = getDatabaseConnection('final');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DSELECT * FROM timeslot WHERE id = '$id'";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    
    
    echo json_encode($results);
}

?>