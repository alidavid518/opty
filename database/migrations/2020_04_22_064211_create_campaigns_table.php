<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('advertiser');
            $table->string('title');
            $table->string('image');
            $table->string('youtube_url');
            $table->string('statement');
            $table->string('mail_redirect_url');
            $table->string('date_start');
            $table->string('date_end');
            $table->string('detail_pdf');
            $table->string('opt_in_method');
            $table->string('notes');
            $table->string('content_type');
            $table->tinyInteger('company_show')->default(1)->comment('0:hide,1:show');
            $table->string('show_setting')->default(1)->comment('0:hide,1:show');
            $table->string('always_posting')->default(1)->comment('0:hide,1:show');
            $table->string('campaign_summary');
            $table->integer('deposit_amount');
            $table->integer('contracts_limit');
            $table->string('remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaigns');
    }
}
