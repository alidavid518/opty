<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
  public const STATUS_ACTIVE = 1;
  public const STATUS_INACTIVE = 0;

  /**
   * The attributes that are mass assignable.
   * @var array
   */
  protected $fillable = [
    'name_first', 'name_last', 'furi_first', 'furi_last', 'email', 'password', 'nickname', 'rank_id', 'note', 'status'
  ];

  protected $appends = ['status_label'];

  public function rank() {
    return $this->belongsTo('App\Models\Rank');
  }

  public function getStatusOptions() {
    return [
      static::STATUS_ACTIVE => '確認済み',
      static::STATUS_INACTIVE => '登録済み'
    ];
  }

  public function getStatusLabelAttribute()
  {
    return $this->getStatusOptions()[$this->status];
  }

}
