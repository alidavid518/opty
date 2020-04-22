<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  /**
   * The attributes that are mass assignable.
   * @var array
   */
  protected $fillable = ['affiliate_id', 'title', 'content'];

  public function affiliate()
  {
    return $this->belongsTo('App\Models\Affiliate');
  }
}
