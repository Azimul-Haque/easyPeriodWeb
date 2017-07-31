<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
	/**
     * Get the user that owns the period.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
