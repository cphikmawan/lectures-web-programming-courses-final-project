<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Jobs extends Model
{
	use Notifiable;
    /**
     * The function set to this model.
     * Adding Mutators
     * @var void
     */
    // public function setNameAttribute($value){
    //     return $this->attributes['name'] = ucfirst($value);
    // }

    // public function setAddressAttribute($value){
    //     return $this->attributes['address'] = ucfirst($value);
    // }

    // public function setBioAttribute($value){
    //     return $this->attributes['bio'] = ucfirst($value);
    // }

    //  public function setMottoAttribute($value){
    //     return $this->attributes['motto'] = ucfirst($value);
    // }
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

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
        'category_id',
        'company_id',
        'title',
        'desc',
        'type',
        'salary',
        'deadline',
        'position',
        'city',
    ];

    public function company()
    {
    	return $this->belongsTo('App\Companies');
    }

    public function category()
    {
    	return $this->belongsTo('App\Categories');
    }
    
    public function simpan()
    {
        return $this->hasMany('App\Save', 'jobs_id');
    }
}
