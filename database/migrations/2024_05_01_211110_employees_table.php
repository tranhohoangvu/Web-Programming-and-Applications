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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('hotendaydu');
            $table->text('avatar')->nullable();
            $table->string('sodienthoai')->nullable(false);
            $table->string('diachi')->nullable();
            $table->date('ngayvaolam')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->date('ngaysinh')->nullable();
            $table->string('trinhdo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('employees');
    }
};
