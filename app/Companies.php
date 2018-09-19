<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;

class Companies extends Model
{
    use Notifiable;
    use CanBeFollowed;

    /**
     * The function set to this model.
     * Adding Mutators
     * @var void
     */
    public function setNameAttribute($value){
        return $this->attributes['name'] = ucfirst($value);
    }

    public function setAddressAttribute($value){
        return $this->attributes['address'] = ucfirst($value);
    }

    public function setBioAttribute($value){
        return $this->attributes['bio'] = ucfirst($value);
    }

     public function setMottoAttribute($value){
        return $this->attributes['motto'] = ucfirst($value);
    }
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'phonenumber',
        'email',
        'photo_path',
        'address',
        'bio',
        'motto',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function job()
    {
        return $this->hasMany('App\Jobs', 'company_id');
    }

    public function follower()
    {
        return $this->hasMany('App\User', 'followers');
    }
}
