<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateStoredSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stored_sessions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->json('identifier');
            $table->text('payload');
            $table->string('authcode')->nullable();
            $table->string('authcode_expiration')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->timestamps();
        });

        $driver = config('database.connections.' . env('DB_CONNECTION') . '.driver');

        if ($driver == 'pgsql') {
            DB::statement('CREATE EXTENSION IF NOT EXISTS "uuid-ossp"');
            DB::statement('ALTER TABLE stored_sessions ALTER COLUMN id SET DEFAULT uuid_generate_v4();');
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stored_sessions');
    }
}
