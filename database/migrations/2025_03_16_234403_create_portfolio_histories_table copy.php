<?php

use App\Models\Portfolio;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('portfolio_histories', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->string('reason');
            $table->string('goal');
            $table->foreignIdFor(Portfolio::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_status');
    }
};
