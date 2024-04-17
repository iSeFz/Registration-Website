<?php
uploadImage();
function uploadImage(){
    if(isset($_POST['submit']))
    {
        $check = getimagesize($_FILES['photo']['tmp_name']);
        if($check === false){
            echo "not an Image";
        }
        else{
            $image = $_FILES["photo"]["tmp_name"];
            $data = file_get_contents($image);
            $name = $_FILES["photo"]["name"];
            file_put_contents("photos/".$name, $data);
            header('Location: '."./");
            // updateDataBase($name);
        }
    }
    else
    {
        echo"Error";
    }
}

function updateDataBase($name){

}
?>