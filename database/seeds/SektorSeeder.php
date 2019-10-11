<?php

use App\Models\Yanjin\SektorModel;
use Illuminate\Database\Seeder;

class SektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = SektorModel::create([
            'nama_sektor' => 'Tenaga Kerja dan Transmigrasi',
            'kode_sektor' => 'A',
        ]);
        $admin = SektorModel::create([
            'nama_sektor' => 'Koperasi dan Usaha Mikro, Kecil, dan Menengah',
            'kode_sektor' => 'B',
        ]);
        $admin = SektorModel::create([
            'nama_sektor' => 'Kesatuan Bangsa, Politik dan Perlindungan Masyarakat',
            'kode_sektor' => 'C',
        ]);
        $admin = SektorModel::create([
            'nama_sektor' => 'Sosial',
            'kode_sektor' => 'D',
        ]);
        $admin = SektorModel::create([
            'nama_sektor' => 'Pekerjaan Umum Sumber Daya Air dan Penataan Ruang',
            'kode_sektor' => 'E',
        ]);
    }
}
