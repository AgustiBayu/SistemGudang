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
        Schema::create('mutasis', function (Blueprint $table) {
            $table->increments('id');
            $table->date("tanggal")->nullable(false);
            $table->string("jenisMutasi")->nullable(false);
            $table->integer("jumlah")->nullable(false);
            $table->integer("totalHarga")->nullable(false);
            $table->unsignedInteger('userId')->nullable(false);
            $table->unsignedInteger('barangId')->nullable(false);
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('barangId')->references('id')->on('barangs')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasis');
    }
};
