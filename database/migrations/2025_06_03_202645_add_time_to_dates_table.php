<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('dates', function (Blueprint $table) {
            $table->time('time')->nullable()->after('date');
        });
    }

    public function down(): void
    {
        Schema::table('dates', function (Blueprint $table) {
            $table->dropColumn('time');
        });
    }
};
