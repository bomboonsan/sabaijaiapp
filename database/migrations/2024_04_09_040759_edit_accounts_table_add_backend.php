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
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('number_installments')->nullable()->after('amount')->default('0');
            $table->string('apply_status')->nullable()->after('documents')->default('0');
            $table->string('normal_interest')->nullable()->after('documents')->default(null);
            $table->string('promotional_interest')->nullable()->after('documents')->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->string('number_installments')->nullable()->after('amount')->default('0');
            $table->string('apply_status')->nullable()->after('documents')->default('0');
            $table->string('normal_interest')->nullable()->after('documents')->default(null);
            $table->string('promotional_interest')->nullable()->after('documents')->default(null);
        });
    }
};
