<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('sumas', 'calculations');

        Schema::table('calculations', function (Blueprint $table) {
            $table->string('operation')->default('+');
            // Change integer to double/float to support division
            $table->float('numero1')->change();
            $table->float('numero2')->change();
            $table->float('resultado')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calculations', function (Blueprint $table) {
            $table->dropColumn('operation');
            $table->integer('numero1')->change();
            $table->integer('numero2')->change();
            $table->integer('resultado')->change();
        });

        Schema::rename('calculations', 'sumas');
    }
};
