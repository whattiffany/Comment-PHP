<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
class UserController extends Controller
{
    public function register(Request $request){
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,[
                'account'=>[
                    'required',
                    'between:6,20',
                    'unique:users'
                ],
                'password'=>[
                    'required',
                    'between:6,20',
                    
                ],
                'name'=>[
                    'required',
                    'max:20',
                ],
            ],[

            ]
        );
        if($objValidator->fails())
            return response()->json($objValidator->errors()->all(),400);
        // $userService = new UserService();
        // $userService->register($postData);
        return response()->json("註冊成功",200);
    }
}
