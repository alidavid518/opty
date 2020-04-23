<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LpReward extends Model
{
    protected $fillable = ['lp_id', 'amount', 'rank_id', 'date_start', 'time_start', 'date_end', 'time_end'];

    public function lp() {
      return $this->belongsTo('App\Models\Lp');
    }
}
