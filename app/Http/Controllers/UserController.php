<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\UserService;
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
        $userService = new UserService();
        $userService->register($postData);
        return response()->json("註冊成功",200);
    }
    public function login(Request $request){
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,[
                'account'=>[
                    'required',
                ],
                'password'=>[
                    'required',
                ]
            ],[
                'account.required'=>'請輸入帳號',
                'password.required'=>'請輸入密碼',
            ]
        );
        if($objValidator->fails())
            return response()->json($objValidator->errors()->all(),400);
        $userService = new UserService();
        $result = $userService->login($postData);
        if(!is_string($request)){
            return response()->json($result,200);
        }else{
            return response()->json([$result],400);
        }
    }
}
