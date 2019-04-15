<?php

    include '../database.php';
    $conn = getDatabaseConnection("cinder");
    
    $sql = "SELECT 	user_id, match_user_id, answer_timestamp ,answer_type_id FROM cinder ";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($records);

?>

