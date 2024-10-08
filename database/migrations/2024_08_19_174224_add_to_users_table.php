<?php

use App\Models\Role;
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
        Schema::table('users', function (Blueprint $table) {
            $table
                ->unsignedBigInteger('role_id');
            $table
                ->foreign('role_id')
                ->references('id')
                ->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //$table->dropForeign('users_role_id_foreign');
            $table->dropForeign(['role_id']);
            $table->dropColumn('role_id');
            //$table->dropForeignIdFor([Role::class, 'role_id']);
        });
    }
};
