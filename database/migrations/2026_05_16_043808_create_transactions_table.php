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
        // create_transactions_table.php

Schema::create('transactions', function (Blueprint $table) {
    $table->id();

    $table->string('kode_transaksi')->unique();

    $table->foreignId('user_id')
        ->constrained('users')
        ->onDelete('cascade');

    $table->foreignId('branch_id')
        ->constrained('branches')
        ->onDelete('cascade');

    $table->decimal('total', 12, 2);

    $table->dateTime('tanggal');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
