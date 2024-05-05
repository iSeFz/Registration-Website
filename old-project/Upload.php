<?php
function uploadImage()
{
    $imagesFolderName = "./photos/";
    $check = getimagesize($_FILES['photo']['tmp_name']);
    if ($check === false) {
        echo "not an Image";
    } else {
        $image = $_FILES["photo"]["tmp_name"];
        $data = file_get_contents($image);
        $name = $_FILES["photo"]["name"];
        while (file_exists("photos/" . $name)) {
            $imageName = getNameFromImageName($name);
            $extension = getExtensionFromImageName($name);
            $imageName++;
            $name = $imageName . $extension;
        }
        $name = $imagesFolderName . $name;
        file_put_contents($name, $data);
        return $name;
    }
}

function getNameFromImageName($name)
{
    $newName = "";
    for ($i = 0; $i < strlen($name); $i++) {
        if ($name[$i] == ".") {
            break;
        }
        $newName .= $name[$i];
    }
    return $newName;
}

function getExtensionFromImageName($name)
{
    $extension = "";
    $found = false;
    for ($i = 0; $i < strlen($name); $i++) {
        if ($name[$i] == '.') {
            $found = true;
        }
        if ($found) {
            $extension .= $name[$i];
        }
    }
    return $extension;
}
