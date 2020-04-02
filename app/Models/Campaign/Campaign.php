<?php

namespace App\Models\Campaign;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'advertiser', 'title', 'image',
        'youtube_url',  // Youtube予告URL
        'statement',    // アフィリエイター向け PR文
        'mail_redirect_url',    // 成約除外メアドリダイレクトURL
        'date_start',
        'date_end',     // キャンペーン期間
        'detail_pdf',   // 詳細PDF
        'opt_in_method',    // オプトイン方式
        'notes',        // 注意事項
        'content_type', // コンテンツタイプ
        'company_show', // 会社名表示
        'show_seting',  // 表示設定
        'always_posting',       // 常時掲載案件化
        'campaign_summary',     // キャンペーン概要
        'deposit_amount',     // デポジット金額
        'contracts_limit',     // 成約上限数
        'remarks',      // 備考
    ];
}
