<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('keycloak_auth_id')->nullable();
            $table->string('keycloak_access_token')->nullable();
            $table->string('keycloak_refresh_token')->nullable();
            $table->string('password')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['keycloak_auth_id', 'keycloak_access_token', 'keycloak_refresh_token']);
            $table->string('password')->change();
        });
    }
};
