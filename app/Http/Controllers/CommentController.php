<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CommentService;
use Validator;

class CommentController extends Controller
{
    public function comment(Request $request){
        $postData = $request->all();
        $objValidator = Validator::make(
            $postData,[
              
                'content'=>[
                    'required',
                    'between:5,60'
                ]
            ],[
                
                'content.required'=>'請輸入留言內容',
                'content.between'=>'請輸入5~60字內容',
            ]
        );
        if($objValidator->fails())
            return response()->json($objValidator->errors()->all(),400);
        $commentService = new CommentService();
        $newComment = $commentService->Comment($postData);
        return response()->json($newComment,200); 
    }
    public function getComments(Request $request){
        $commentService = new CommentService();
        $result = $commentService->getComments($request);
        return response()->json($result,200); 
    }
}