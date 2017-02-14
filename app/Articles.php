<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    //

    protected $fillable = [
        'cate_id', 'title', 'body'
    ];
}
