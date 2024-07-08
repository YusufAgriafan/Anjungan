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
            ['no_rkm_medis' => 'RM001', 'nm_pasien' => 'John Doe', 'alamat' => '123 Main St', 'created_at' => now(), 'updated_at' => now()],
            ['no_rkm_medis' => 'RM002', 'nm_pasien' => 'Jane Doe', 'alamat' => '456 Oak St', 'created_at' => now(), 'updated_at' => now()],
            ['no_rkm_medis' => 'RM003', 'nm_pasien' => 'Alice Smith', 'alamat' => '789 Pine St', 'created_at' => now(), 'updated_at' => now()],
            ['no_rkm_medis' => 'RM004', 'nm_pasien' => 'Bob Johnson', 'alamat' => '321 Maple St', 'created_at' => now(), 'updated_at' => now()],
            ['no_rkm_medis' => 'RM005', 'nm_pasien' => 'Charlie Brown', 'alamat' => '654 Elm St', 'created_at' => now(), 'updated_at' => now()],
            ['no_rkm_medis' => 'RM006', 'nm_pasien' => 'Diana Prince', 'alamat' => '987 Birch St', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $johnDoeId = DB::table('pasiens')->where('no_rkm_medis', 'RM001')->value('id');
        $janeDoeId = DB::table('pasiens')->where('no_rkm_medis', 'RM002')->value('id');
        $aliceSmithId = DB::table('pasiens')->where('no_rkm_medis', 'RM003')->value('id');
        $bobJohnsonId = DB::table('pasiens')->where('no_rkm_medis', 'RM004')->value('id');
        $charlieBrownId = DB::table('pasiens')->where('no_rkm_medis', 'RM005')->value('id');
        $dianaPrinceId = DB::table('pasiens')->where('no_rkm_medis', 'RM006')->value('id');

        // Seed data for dokters
        DB::table('dokters')->insert([
            ['nama' => 'Dr. Andi', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dr. Sri', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dr. Lisa', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dr. Mike', 'created_at' => now(), 'updated_at' => now()],
        ]);

        $drAndiId = DB::table('dokters')->where('nama', 'Dr. Andi')->value('id');
        $drSriId = DB::table('dokters')->where('nama', 'Dr. Sri')->value('id');
        $drLisaId = DB::table('dokters')->where('nama', 'Dr. Lisa')->value('id');
        $drMikeId = DB::table('dokters')->where('nama', 'Dr. Mike')->value('id');

        // Seed data for kartu_berobats
        DB::table('kartu_berobats')->insert([
            ['no_kartu_berobat' => 'KB001', 'pasien_id' => $johnDoeId, 'created_at' => now(), 'updated_at' => now()],
            ['no_kartu_berobat' => 'KB002', 'pasien_id' => $janeDoeId, 'created_at' => now(), 'updated_at' => now()],
            ['no_kartu_berobat' => 'KB003', 'pasien_id' => $aliceSmithId, 'created_at' => now(), 'updated_at' => now()],
            ['no_kartu_berobat' => 'KB004', 'pasien_id' => $bobJohnsonId, 'created_at' => now(), 'updated_at' => now()],
            ['no_kartu_berobat' => 'KB005', 'pasien_id' => $charlieBrownId, 'created_at' => now(), 'updated_at' => now()],
            ['no_kartu_berobat' => 'KB006', 'pasien_id' => $dianaPrinceId, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Seed data for daftars
        DB::table('daftars')->insert([
            ['pasien_id' => $johnDoeId, 'metode_pembayaran' => 'BPJS', 'tanggal_kunjungan' => '2024-06-26', 'kd_poli' => 'U0001', 'dokter_id' => $drAndiId, 'created_at' => now(), 'updated_at' => now()],
            ['pasien_id' => $janeDoeId, 'metode_pembayaran' => 'Umum', 'tanggal_kunjungan' => '2024-06-27', 'kd_poli' => 'U0002', 'dokter_id' => $drSriId, 'created_at' => now(), 'updated_at' => now()],
            ['pasien_id' => $aliceSmithId, 'metode_pembayaran' => 'Asuransi', 'tanggal_kunjungan' => '2024-06-28', 'kd_poli' => 'U0003', 'dokter_id' => $drLisaId, 'created_at' => now(), 'updated_at' => now()],
            ['pasien_id' => $bobJohnsonId, 'metode_pembayaran' => 'BPJS', 'tanggal_kunjungan' => '2024-06-29', 'kd_poli' => 'U0001', 'dokter_id' => $drMikeId, 'created_at' => now(), 'updated_at' => now()],
            ['pasien_id' => $charlieBrownId, 'metode_pembayaran' => 'Umum', 'tanggal_kunjungan' => '2024-07-01', 'kd_poli' => 'U0002', 'dokter_id' => $drAndiId, 'created_at' => now(), 'updated_at' => now()],
            ['pasien_id' => $dianaPrinceId, 'metode_pembayaran' => 'Asuransi', 'tanggal_kunjungan' => '2024-07-02', 'kd_poli' => 'U0003', 'dokter_id' => $drSriId, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
