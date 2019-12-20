<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Service\CommentService;
class CommentController extends Controller
{
    public function comment(Request $request){
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,[
                'account'=>[
                    'required',
                ],
                'content'=>[
                    'required',
                    'between:5,60'
                ]
            ],[
                'account.required'=>'請輸入帳號',
                'content.required'=>'請輸入留言內容',
                'content.between'=>'請輸入5~60字內容',
            ]
        );
        if($objValidator->fails())
            return response()->json($objValidator->errors()->all(),400);
        $commentService = new CommentService();
        $newComment = $commentService->comment($postData);
        return response()->json($newComment,200); 
    }
}