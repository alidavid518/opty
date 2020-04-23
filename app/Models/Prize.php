<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    protected $fillable = ['campaign_id','contract_rank','name','image'];

    public function campaign() {
      return $this->belongsTo('App\Models\Campaign');
    }
}
