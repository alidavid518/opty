<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
  /**
   * The attributes that are mass assignable.
   * @var array
   */
  protected $fillable = [
    'name_first', 'name_last', 'furi_first', 'furi_last',
    'email', 'password', 'nickname', 'rank_id', 'note'
  ];

  public function rank() {
    return $this->hasOne('App\Models\Rank');
  }
}
