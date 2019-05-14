<?php

session_start();
include 'dbConnection.php';
$dbConn = getDatabaseConnection('final');

if(isset($_GET['date'])){
    $date = $_GET['date'];
    $start = $_GET['start'];
    $end = $_GET['end'];
    

    $sql = "insert into timeslot (id, date, start, end, booked) VALUES ('','$date', '$start', '$end', 'Not Booked')";
    $stmt = $dbConn->prepare($sql);
    $results = $stmt->execute(); 
    
    echo json_encode($results);
}

?>