<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $table = 'comment';
    protected $primaryKey = 'comment_id';
    const UPDATED_AT = null;
    protected $filable = [
        'account','content'
    ];
}
