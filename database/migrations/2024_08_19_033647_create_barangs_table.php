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
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string("kode")->nullable(false);
            $table->string('namaBarang')->nullable(false);
            $table->string("kategory")->nullable(false);
            $table->integer("harga")->nullable(false);
            $table->integer("stok")->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
