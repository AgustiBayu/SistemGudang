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
            $table->date("tanggal");
            $table->string("jenisMutasi");
            $table->integer("jumlah");
            $table->integer("totalHarga");
            $table->unsignedInteger('userId');
            $table->unsignedInteger('barangId');
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
