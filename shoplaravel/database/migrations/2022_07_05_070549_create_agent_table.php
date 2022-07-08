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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',100)->unique();
            $table->string('address',255)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('bank_code',50)->nullable();
            $table->string('branch_code',50)->nullable();
            $table->string('normal',200)->nullable();
            $table->string('account_no',50)->nullable();
            $table->string('curator',200)->nullable();
            $table->string('line_url',200)->nullable();
            $table ->double('margin_rate',100)->nullable();
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
        Schema::dropIfExists('agent');
    }
};
