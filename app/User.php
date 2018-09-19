<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Traits\CanFollow;

class User extends Authenticatable
{
    use Notifiable;
    use CanFollow;
    /**
     * The function set to this model.
     * Adding Mutators
     * @var void
     */
    public function setFirstNameAttribute($value){
        return $this->attributes['firstname'] = ucfirst($value);
    }

    public function setLastNameAttribute($value){
        return $this->attributes['lastname'] = ucfirst($value);
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
    protected $table = 'users';

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
        'firstname',
        'lastname',
        'phonenumber',
        'email',
        'password',
        'permission',
        'photo_path',
        'address',
        'bio',
        'motto',
        'activated',
        'token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'activated',
        'token',
    ];

    public function company()
    {
        return $this->hasOne('App\Companies');
    }

    public function follow()
    {
        return $this->belongsTo('App\Companies');
    }

    public function simpan()
    {
        return $this->hasMany('App\Save', 'user_id');
    }
}

