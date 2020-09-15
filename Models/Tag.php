<?php

namespace Modules\Tags\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name','menu_id','slug'];
}