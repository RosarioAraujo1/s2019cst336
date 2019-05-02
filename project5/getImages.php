<?php

session_start();
   include 'dbConnection.php';
   $conn = getDatabaseConnection("project5");

    // sql query to select all the media files from the database 
       $sql = "SELECT media FROM project5;";
    // preparing the sql query
       $stmt = $conn->prepare($sql);
    // executing the query 
       $stmt->execute();
    // fetch all is used with SELECT and not Insert, Delete or Update, it is used to fetch the data 
       $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // this for loop is to loop through what we got and stored in the $response
       foreach($response as $key => $value){
           // getting and saving the media from database 
           $blob = $response[$key]['media']; 
           // html tag made to use to display the images 
           $res = '<img src="data:image/jpeg;base64,'.base64_encode($blob).'"/>';
           // basically printing the images 
           echo $res;
       }

?>
