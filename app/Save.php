<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Save extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function job()
    {
    	return $this->belongsTo('App\Jobs', 'jobs_id');
    }
}
