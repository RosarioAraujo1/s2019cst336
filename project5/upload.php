<?php

session_start();
// connecting to the database
   include 'dbConnection.php';
   $conn = getDatabaseConnection("project5");
   
   // getting the information sent from the ajax call 
   $email = $_POST['email'];
   $caption = $_POST['caption'];

   // logic to handle BLOB (Binary Large Object)
   if(count($_FILES)> 0){
       if(is_uploaded_file($_FILES['fileName']['tmp_name'])){
           $imgData = addslashes(file_get_contents($_FILES['fileName']['tmp_name']));
           $imageProperties = getimagesize($_FILES['fileName']['tmp_name']);
           
         // Query to insert the data into the database 
           $sql = "INSERT INTO project5 (email, caption, media, timestamp) VALUES ('$email', '$caption', '{$imgData}', '');";

           $stmt = $conn->prepare($sql);
           $response = $stmt->execute();

           echo json_encode($response);

       }
   }

?>

<!--here create the html snippet -->
<!DOCTYPE html>
<html>

<head>
    <title>Project 5 </title>
    <style type="text/css">
       img {
          border-radius: 4px;  
          padding: 5px; 
          width: 150px; 
          height: 106px;
        }
        img:hover {
          box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        }
    </style>
</head>

<body>

    <h1> Event picture Sharing </h1>
    
    <h1> Thank you for sharing these pictures with us! </h1>

    <button id="test"> Click me </button>
    
    <div id="results"></div>
    
    
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script type="text/javascript" src="javascript.js"></script>

</body>

</html>
