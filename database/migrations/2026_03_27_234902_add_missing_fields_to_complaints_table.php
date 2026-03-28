<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('type')->nullable()->after('title');
            $table->string('attachment')->nullable()->after('description');
            $table->string('status')->default('new')->after('user_id');
            $table->text('admin_note')->nullable()->after('status');
        });
    }

    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn(['type', 'attachment', 'status', 'admin_note']);
        });
    }
};