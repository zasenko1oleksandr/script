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
        Schema::table('filter', function (Blueprint $table) {
            $table->text('filter_description')->nullable()->after('filter_name');
        });
    }

    public function down(): void
    {
        Schema::table('filter', function (Blueprint $table) {
            $table->dropColumn('filter_description');
        });
    }
};
