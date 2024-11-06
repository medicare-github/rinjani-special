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
        Schema::table('paket_wisatas', function (Blueprint $table) {
            $table->string('difficulty_level')->enum(['Beginner', 'Moderate', 'Advanced'])->default('Beginner')->after('thumbnail');
            $table->string('trekking_experience')->nullable()->after('difficulty_level');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('paket_wisatas', function (Blueprint $table) {
            $table->dropColumn('difficulty_level');
            $table->dropColumn('trekking_experience');
        });
    }
};
