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
        Schema::create('include_excludes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_wisata_id')->constrained()->onDelete('cascade');
            $table->enum('tipe', ['include', 'exclude'])->default('include');
            $table->text('barang_bawaan')->nullable();
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
        Schema::dropIfExists('include_excludes');
    }
};
