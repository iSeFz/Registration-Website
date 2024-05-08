<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    function store(Request $req){
        $user = new Users;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->fullname = $req->fullname;
        $user->password = $req->password;
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->imageName = $this->uploadImage();
        $user->birthdate = $req->birthdate;
        $user->save();
        return redirect('/');
    }

    function show(){
        return Users::all();
    }

    public function validateUsername(Request $request)
    {
        $username = $request->get('name');
        Log::info('Request object: ', ['request' => $request->all()]); // Log the $request object        
        $user = Users::where('username', $username)->first();
        Log::info('User object: ', ['user' => $user]); // Log the $user object
        
        if ($user) {
            return response()->json(['valid' => false]);
        }
        
        return response()->json(['valid' => true]);
    }

    public function uploadImage()
    {
        $imagesFolderName = public_path('assets/photos/');
        $check = getimagesize($_FILES['photo']['tmp_name']);
        if ($check === false) {
            echo "not an Image";
        } else {
            $image = $_FILES["photo"]["tmp_name"];
            $data = file_get_contents($image);
            $name = $_FILES["photo"]["name"];
            while (file_exists(public_path('assets/photos/') . $name)) {
                $imageName = $this->getNameFromImageName($name);
                $extension = $this->getExtensionFromImageName($name);
                $imageName++;
                $name = $imageName . $extension;
            }
            $temp = $imagesFolderName . $name;
            file_put_contents($temp, $data);
            return $name;
        }
    }

    public function getNameFromImageName($name)
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

    public function getExtensionFromImageName($name)
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

}
