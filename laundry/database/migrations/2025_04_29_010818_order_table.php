<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('orders', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('phone');
        $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
        $table->decimal('weight', 5, 2);
        $table->enum('status', ['pending', 'processing', 'done', 'collected'])->default('pending');
        $table->enum('item_type', ['baju', 'kain_besar', 'sepatu', 'lainnya']);
        $table->text('note')->nullable();
        $table->timestamp('transaction_time')->useCurrent();
        $table->string('order_code')->unique();
        $table->decimal('price', 10, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
