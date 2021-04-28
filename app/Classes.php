<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = [
        'student_id','level_id','lesson_id','status','score_1','score_2','score_3','score_4','score_5',
        'url_homework','file_homework','status_homework'
    ];
}
