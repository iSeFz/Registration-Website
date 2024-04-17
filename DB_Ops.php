<?php

$conn = dbConnection("localhost","root", "","Registeration");

function dbConnection($servername, $username, $password, $database){

    $connection = mysqli_connect($servername, $username,$password);
    $createDB = "create database if not exists $database";
    mysqli_query($connection, $createDB); //excute the query
    mysqli_change_user($connection, $username, $password, $database);

    
    // if connection failed
    if (!$connection) {
      die("Connection failed: " . mysqli_connect_error())."<br>";
    }
    else {
        echo "Connected successfully";
    }

    
    return $connection;
}


function createTable(){
    global $conn;
    
    //DATE - format: YYYY-MM-DD
    $tableUser = "create table if not exists User(
        username varchar(40) primary key,
        email varchar(40) ,
        firstName varchar(20) ,
        lastName varchar(20) ,
        password varchar(40),
        address varchar(40) ,
        phone varchar(15),
        imageName varchar(40),
        bithdate Date)" ;

        if(!mysqli_query($conn, $tableUser)) {
            echo "Error creating table: " . $conn->error."<br>";
        } 
}


function insert($username, $email ,$firstName ,$lastName ,$password ,$address ,
$phone, $imageName, $birthdate){
    global $conn;

    //the form alerts the user to choose another username
    if(select("*","username = '$username' ")===true){
        echo "<br>username can't be repeated"; //done later in front end 
        return false;
    }
    else{
        if(!mysqli_query($conn, "insert into User values('$username', '$email', '$firstName', 
        '$lastName', '$password', '$address', '$phone', '$imageName', '$birthdate')") ){
            
            echo $conn->error."<br>";
            return false;
        }
        return true;
    }
}



function select($selection, $condition=""){
    global $conn;
    $query = "Select $selection from User";
    $result = mysqli_query($conn, $query);
    if($condition !=""){
        $query.=" where $condition";
    }

    // echo $query;

    if (mysqli_num_rows($result) > 0) {

        //printing query result
        while($row = mysqli_fetch_assoc($result)) {
            echo  "<br>"."username: " . $row["username"];
        }
        return true;
    } 
    else {
        // echo "<br> 0 results";
        return false;
    }

}

createTable();
insert("usersr2w1", "user@email.com", "nour", "tarek", "1234", "faisal", "image.jpg", "01234567890", 
"02-01-2003");
// select("username");


mysqli_close($conn);



?>
