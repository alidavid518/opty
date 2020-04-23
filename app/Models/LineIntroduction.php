<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineIntroduction extends Model
{
    protected $fillable = ['campaign_id', 'title', 'title'];

    public function campaign() {
      return $this->belongsTo('App\Models\Campaign');
    }
}
