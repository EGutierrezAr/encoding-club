<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'parent_email','parent_name','parent_phone','student_name','student_id','date','time_start','time_end',
        'status','type'
    ];
}
