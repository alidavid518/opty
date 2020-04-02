<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'furi_first_name', 'furi_last_name', 'nick_name'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }
}
