<?php
    include "DB_Ops.php";
    include "Upload.php";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['function']) && isset($_POST['params'])) {
        global $conn;
        // Retrieve function name and parameters from uniqueUsername
        $functionName = $_POST['function'];
        $params = $_POST['params'];
    
        // Call isRepeated function
        $result = call_user_func($functionName, $params);
        echo $result;
    }



    else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if (isset($_POST['username'])) {
            insert(
                $_POST["username"],
                $_POST["email"],
                $_POST["fullname"],
                $_POST["password"],
                $_POST["address"],
                $_POST["phone"],
                uploadImage(),
                $_POST["birthdate"]
            );
            // echo "Data inserted successfully"; // Optional success message
        } 
    }


    mysqli_close($conn);


?>