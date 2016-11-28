<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pet extends Model
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
        'name', 'gender', 'born', 'owner', 'phone'
    ];

    /**
     * Get the owners associated with a given pet.
     *
     * @return \Ilunimate\Database\Eloquent\Relations\BelongsToMany
     */
    public function owners()
    {
    	return $this->belongsToMany('App\Owner')->withTimestamps();
    }
}
