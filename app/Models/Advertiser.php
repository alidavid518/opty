<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
    protected $fillable = [
      'name_last','name_first','furi_last','furi_first','email'
      ,'password','rank','company','company_furi','zipcode','address','phone'
    ];
}
