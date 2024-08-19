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
        //pivot
        Schema::create('permission_role', function (Blueprint $table) {
            $table->id();
            //Colonne di FK
            $table
                ->unsignedBigInteger('permission_id');
            $table
                ->unsignedBigInteger('role_id');
            //Relazioni
            $table
                ->foreign('permission_id')
                ->references('id')
                ->on('permissions');

            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_role');
    }
};
