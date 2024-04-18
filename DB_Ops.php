<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "REGISTERATION_FORM";

$conn = dbConnection($servername,$username, $password,$database);

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
        // echo "Connected successfully";
    }    
    return $connection;
}


function createTable(){
    global $conn;
    
    //DATE - format: YYYY-MM-DD
    $tableUser = "create table if not exists User(
        username varchar(40) primary key,
        email text ,
        fullname text ,
        password text,
        address text ,
        phone text,
        imageName varchar(40),
        birthdate Date)" ; 

        if(!mysqli_query($conn, $tableUser)) {
            echo "Error creating table: " . $conn->error."<br>";
        } 
}

    function insert($username, $email ,$fullname ,$password ,$address ,
        $phone,$imageName, $birthdate ){ //add image to parameters
            global $conn;

            if(isRepeated($username)===true){
                echo "Username cant be repeated";
                return false;
            }
            else{
                if(!mysqli_query($conn, "insert into User (username, email, fullname, password, address,
                phone, imageName, birthdate) values ('$username', '$email', '$fullname'
                , '$password', '$address', '$phone', '$imageName','$birthdate' )") ){//add image to parameters
                    
                    echo $conn->error."<br>k";
                    return false;
                }
            }
            
            return true;
        }




function select($selection, $condition=""){
    global $conn;
    $query = "Select $selection from User";
    if($condition !=""){
        $query.=" where $condition";
    }

    // echo $query;
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        // printing query result

        // while($row = mysqli_fetch_assoc($result)) {
        //     echo  "<br>"."username: " . $row["username"];
        // }
        return 1;
    } 
    else {
        return 0;
    }

}
function isRepeated($name){
    if(select("*","username = '$name'")===1){
        return 1;
    }
    else{
        return 0;
    }

}
createTable();
// insert("ranatarek", "user@email.com", "nour", "tarek", "1234", "faisal",  "01234567890",
// "image.jpg", "02-01-2003");
// select("username");

?>
