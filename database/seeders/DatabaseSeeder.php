<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'testing@gmail.com',
            'password' => Hash::make('testing'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('antreans')->insert([
            [
                'code' => 'A1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'B1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'B2',
                'created_at' => now(),
                'updated_at' => now(),
            ]
            
        ]);

        DB::table('lokets')->insert([
            ['codeLoket' => 'A',
            'created_at' => now(),
            'updated_at' => now(),],
            ['codeLoket' => 'B',
            'created_at' => now(),
            'updated_at' => now(),],
            ['codeLoket' => 'C',
            'created_at' => now(),
            'updated_at' => now(),]
        ]);
    }
}
