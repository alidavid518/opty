<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $fillable = ['name_last','name_first','furi_last','furi_first','email','password','permission'];
}
