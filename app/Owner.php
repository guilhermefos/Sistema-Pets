<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{

	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'phone', 'pet_id'
    ];

    /**
     * Get the pets associated with a given owner.
     *
     * @return \Ilunimate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pets()
    {
    	$this->belongsToMany('App\Pet')->withTimestamps();
    }
}
