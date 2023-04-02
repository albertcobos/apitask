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
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id'); //primary key
           // $table->foreignId('user_id')->constrained();
            $table->string('title', 30);
            $table->text('content');//
            $table->date('date');//date of delivery
            $table->string('state')->comment('assigned,completed,error')->default("assigned");
            $table->timestamps(); //created_at, update_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
