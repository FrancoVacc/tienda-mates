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
            $table->string('order_number');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->json('items')->nullable();
            $table->unsignedBigInteger('id_delivery')->default(1);
            $table->foreign('id_delivery')->references('id')->on('deliveries')->onDelete('cascade');
            $table->dateTime('delivery_date');
            $table->string('track_link')->nullable();
            $table->unsignedBigInteger('id_status')->default(1);
            $table->foreign('id_status')->references('id')->on('statuses')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['id_user']);
            $table->dropColumn('id_user');
        });

        Schema::dropIfExists('orders');
    }
};
