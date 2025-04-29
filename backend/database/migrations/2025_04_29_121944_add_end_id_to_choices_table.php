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
    Schema::table('choices', function (Blueprint $table) {
        $table->unsignedBigInteger('end_id')->nullable()->after('next_chapter_id');

        $table->foreign('end_id')->references('id')->on('ends')->onDelete('set null');
    });
}

public function down(): void
{
    Schema::table('choices', function (Blueprint $table) {
        $table->dropForeign(['end_id']);
        $table->dropColumn('end_id');
    });
}

};
