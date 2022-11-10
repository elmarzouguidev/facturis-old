<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails', function (Blueprint $table) {

            $table->id();
            $table->uuid();

            $table->unsignedBigInteger('emailable_id');
            $table->string('emailable_type');

            $table->string('email')->unique();
            $table->integer('type')->default(1);

            $table->boolean('is_primary')->default(false);
            $table->boolean('active')->default(true);
            
            $table->softDeletes();
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
        Schema::dropIfExists('emails');
    }
};
