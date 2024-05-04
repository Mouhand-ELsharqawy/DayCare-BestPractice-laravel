<?php
namespace App\Traits;

trait GeneralTrait {

    public function AuthData($user,$token){
        return response()->json([
            'User' => $user,
            'Token' => $token
        ]);
    }


    public function getData($key,$data){
        return response()->json([
            'status' => true,
            'msg' => 'Success',
            $key => $data
        ]);
    }

    public function deleteData(){
        return response()->json([
            'status' => true,
            'msg' => 'Success',
            'Culomn Data Removed'
        ]);
    }

    public function getError($errorcode,$errormessage){
        return response()->json([
            'status' => false,
            'errcode' => $errorcode,
            'msg' => 'Faild',
            'errors' => $errormessage
        ]);
    }
    
}