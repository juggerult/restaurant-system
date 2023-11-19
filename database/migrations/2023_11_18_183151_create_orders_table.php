<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('meals');
            $table->integer('price');
            $table->text('adress');

            $table->string('status_oder')->default('В обработке');

            $table->time('timeAcceptCook')->nullable();
            $table->time('timeDoneCook')->nullable();
            $table->foreignId('cook_id')->nullable()
                  ->constrained('users')->onDelete('cascade');

            $table->time('timeAcceptDelivery')->nullable();
            $table->time('timeDoneDeveliry')->nullable();
            $table->foreignId('provider_id')->nullable()
                  ->constrained('users')->onDelete('cascade');


            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
