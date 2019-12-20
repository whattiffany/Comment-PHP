<?php

namespace App\Service;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService{
    public function register($data){
        $data['password']=bcrypt($data['password']);
        User::create($data);
    }
    public function login($data){
        $user = User::where('account',$data['account'])->first();
        if($user){
            if(Hash::check($data['password'],$user->password))
                return $user;
            else
                return '密碼錯誤';
        }
        return '無此用戶';
    }
}