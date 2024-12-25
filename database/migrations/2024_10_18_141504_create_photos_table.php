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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId( 'user_id')->constrained()->onDelete('cascade');
            $table->string( 'name');
            $table->text( 'details');
            $table->string( 'image');
            $table->unsignedBigInteger( 'approve_by')->nullable();
            $table->dateTime( 'approve_date')->nullable();
            $table->unsignedBigInteger( 'buyout_by')->nullable();
            $table->dateTime( 'buyout_date')->nullable();
            $table->decimal( 'rate', 8, 2)->nullable();
            $table->enum( 'status',['pending','approved','declined','selling','buy-out','approve_unsellable'])->default('pending');
            $table->timestamps();

            //MANUAL FOREIGN KEY SETUPS
            $table->foreign( 'approve_by')->on('admins')->references( 'id')->onDelete('cascade');
            $table->foreign( 'buyout_by')->on('admins')->references( 'id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};
