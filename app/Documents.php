<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected  $fillable=['module','class','title','description','file'];
}