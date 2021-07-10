<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('asset_id')->nullable()->onDelete('cascade');
            $table->foreignId('suggestion_id')->nullable()->onDelete('cascade');
            $table->foreignId('comment_id')->nullable()->onDelete('cascade');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**q p-'_   asd  bnzu
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
