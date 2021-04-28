<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $fillable = [
        'student_id','level_id','lesson_number','status','score_1','score_2','score_3','score_4','score_5'
    ];
}
