<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LP extends Model
{
    protected $fillable = ['campaign_id', 'title', 'url', 'banner', 'is_public', 'redirect_url_pc', 'redirect_url_mobile', 'show_type'];

    public function campaign() {
      return $this->belongsTo('App\Models\Campaign');
    }
}
