<?php
    include '../database.php';
    $conn = getDatabaseConnection("cinder");
    
    $sql = "SELECT id, name, FROM user ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);
?>