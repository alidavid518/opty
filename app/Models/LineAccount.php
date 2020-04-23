<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineAccount extends Model
{
    protected $fillable = ['campaign_id','channel_url','secret','token','redirect_url','image'];

    public function campaign() {
      return $this->belongsTo('App\Models\Campaign');
    }
}
