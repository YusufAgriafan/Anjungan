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
                'codeLoket' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A2',
                'codeLoket' => 'A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'B1',
                'codeLoket' => 'B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'B2',
                'codeLoket' => 'B',
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

        DB::table('pasiens')->insert([
            [
                'no_rkm_medis' => 'RM001',
                'nm_pasien' => 'John Doe',
                'alamat' => '123 Main St',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_rkm_medis' => 'RM002',
                'nm_pasien' => 'Jane Doe',
                'alamat' => '456 Oak St',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $johnDoeId = DB::table('pasiens')->where('no_rkm_medis', 'RM001')->value('id');
        $janeDoeId = DB::table('pasiens')->where('no_rkm_medis', 'RM002')->value('id');

        DB::table('kartu_berobats')->insert([
            [
                'no_kartu_berobat' => 'KB001',
                'pasien_id' => $johnDoeId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'no_kartu_berobat' => 'KB002',
                'pasien_id' => $janeDoeId,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('daftars')->insert([
            [
                'pasien_id' => $johnDoeId,
                'metode_pembayaran' => 'BPJS',
                'tanggal_kunjungan' => '2024-06-26',
                'kd_poli' => 'U0001',
                'kd_dokter' => 'dr_andi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'pasien_id' => $janeDoeId,
                'metode_pembayaran' => 'Umum',
                'tanggal_kunjungan' => '2024-06-27',
                'kd_poli' => 'U0002',
                'kd_dokter' => 'dr_sri',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
