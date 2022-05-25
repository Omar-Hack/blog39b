<?php

use App\Models\Cata;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catas', function (Blueprint $table) {
            $table->id();
            $table->enum('status', [Cata::published, Cata::draft])->default(Cata::draft);
            $table->string('title', 50)->unique();
            $table->string('slug', 70);
            $table->string('icon', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catas');
    }
};
