<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('Nama');
            $table->string('BadanHukum');
            $table->string('Alamat');
            $table->string('Kota');
            $table->string('KodePos');
            $table->string('Negara');
            $table->string('Telp');
            $table->string('Fax');
            $table->string('Email');
            $table->string('ContactPerson');
            $table->string('SalesPerson');
            $table->string('GrupPelanggan');
            $table->string('Aktif');
            $table->string('KreditLimit');
            $table->string('CustSince');
            $table->string('Memo');
            $table->string('Asuransi');
            $table->timestamps();
            // $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('dibuat_oleh')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
