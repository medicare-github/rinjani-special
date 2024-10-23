<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtToVerificationCodes extends Migration
{
    public function up()
    {
        Schema::table('verification_codes', function (Blueprint $table) {
            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::table('verification_codes', function (Blueprint $table) {
            $table->dropColumn('created_at');
        });
    }
}
