<?php

session_start();
include 'dbConnection.php';
$dbConn = getDatabaseConnection('final');

    $sql = "SELECT * FROM timeslot";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($response);

?>