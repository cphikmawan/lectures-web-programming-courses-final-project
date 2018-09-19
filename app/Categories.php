<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function job()
    {
    	return $this->hasMany('App\Jobs','category_id');
    }
}
