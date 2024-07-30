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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title', 50)->change(); //lunghezza caratteri titolo
            $table->string('description', 150)->nullable()->change(); //lunghezza caratteri descrizione-da 
            $table->string('languages')->nullable()->change();
            $table->text('url')->after('id');
            $table->text('image')->after('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->string('title')->change();
            $table->text('description')->nullable()->change();
            $table->string('languages')->change();
            $table->dropColumn('url');
            $table->dropColumn('image');
        });
    }
};
