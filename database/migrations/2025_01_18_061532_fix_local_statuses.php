<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('statuses')
            ->leftJoin('profiles', 'statuses.profile_id', '=', 'profiles.id')
            ->leftJoin('users', 'users.profile_id', '=', 'profiles.id')
            ->whereNull('users.id')
            ->update(['local' => false]);
    }

    public function down(): void
    {
        // No down migration needed since this is a data fix
    }
};
