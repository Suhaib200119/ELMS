<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("roles")->insert([
            "role_name" => "view requests"
        ]);
        DB::table("roles")->insert([
            "role_name" => "approve request"
        ]);
        DB::table("roles")->insert([
            "role_name" => "deny request"
        ]);
    }
}
