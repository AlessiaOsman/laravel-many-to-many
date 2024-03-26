<?php

use App\Models\Type;
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
            //Creo colonna e relazione
            $table->foreignIdFor(Type::class)->after('id')->nullable()->constrained()->nullOnDelete();

            //Potevo farlo separatamente
             //creazione colonna $table->unsignedBigInteger('type_id')->nullable()->after('id)
             //creazione relazione $table->foreign('type_id')->references('id')->on('types')->nullOnDelete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //Smonto per prima cosa la relazione
            $table->dropForeignIdFor(Type::class);
            //Cancello la relazione
            $table->dropColumn('type_id');
        });
    }
};
