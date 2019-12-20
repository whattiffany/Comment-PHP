<?php

namespace App\Service;

use App\User;
use Illuminate\Support\Facades\Hash;

class CommentService{
    public function Comment($data){
       $newComment = Comment::create($data);
       return Comment::make('comments.*','name')
        ->join('users','users.account','comments.account')
        ->find($newComment->comment_id);
    }
}