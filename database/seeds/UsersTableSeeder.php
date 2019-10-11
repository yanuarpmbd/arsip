<?php

use Illuminate\Database\Seeder;
use App\Models\SKPD\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satpol = User::create([
            'name' => 'Satuan Polisi Pamong Praja',
            'username' => 'satpol',
            'password' => bcrypt('satpol123'),
        ]);
        $satpol->roles()->attach(1);

        $dkp= User::create([
            'name' => 'Kelautan dan Perikanan',
            'username' => 'dkp',
            'password' => bcrypt('dkp123'),
            'sektor' => '2',
        ]);
        $dkp->roles()->attach(2);

        $kehutanan= User::create([
            'name' => 'Kehutanan',
            'username' => 'dishut',
            'password' => bcrypt('dishut123'),
            'sektor' => '3',
        ]);
        $dkp->roles()->attach(3);

        $perhubungan= User::create([
            'name' => 'Perhubungan',
            'username' => 'dishub',
            'password' => bcrypt('dishub123'),
            'sektor' => '4',
        ]);
        $perhubungan->roles()->attach(4);

        $kesehatan= User::create([
            'name' => 'Kesehatan',
            'username' => 'dinkes',
            'password' => bcrypt('dinkes123'),
            'sektor' => '5',
        ]);
        $kesehatan->roles()->attach(5);

        $dlhk= User::create([
            'name' => 'Lingkungan Hidup',
            'username' => 'dlhk',
            'password' => bcrypt('dlhk123'),
            'sektor' => '6',
        ]);
        $dlhk->roles()->attach(6);

        $disdikbud= User::create([
            'name' => 'Pendidikan',
            'username' => 'disdikbud',
            'password' => bcrypt('disdikbud123'),
            'sektor' => '7',
        ]);
        $disdikbud->roles()->attach(7);

        $disperindag= User::create([
            'name' => 'Perindustrian dan Perdagangan',
            'username' => 'disperindag',
            'password' => bcrypt('disperindag123'),
            'sektor' => '8',
        ]);
        $disperindag->roles()->attach(8);

        $disbun= User::create([
            'name' => 'Perkebunan',
            'username' => 'disbun',
            'password' => bcrypt('disbun123'),
            'sektor' => '9',
        ]);
        $disbun->roles()->attach(9);

        $disnaker= User::create([
            'name' => 'Ketenagakerjaan dan Transmigrasi',
            'username' => 'disnaker',
            'password' => bcrypt('disnaker123'),
            'sektor' => '10',
        ]);
        $disnaker->roles()->attach(10);

        $dinkop= User::create([
            'name' => 'Koperasi dan UKM',
            'username' => 'dinkop',
            'password' => bcrypt('dinkop123'),
            'sektor' => '11',
        ]);
        $dinkop->roles()->attach(11);

        $kesbangpol= User::create([
            'name' => 'Kesbangpol',
            'username' => 'kesbangpol',
            'password' => bcrypt('kesbangpol123'),
            'sektor' => '12',
        ]);
        $kesbangpol->roles()->attach(12);

        $dinsos= User::create([
            'name' => 'Sosial',
            'username' => 'dinsos',
            'password' => bcrypt('dinsos123'),
            'sektor' => '13',
        ]);
        $dinsos->roles()->attach(13);

        $pusdataru= User::create([
            'name' => 'Pengelolaan Sumber Daya Air',
            'username' => 'pusdataru',
            'password' => bcrypt('pusdataru123'),
            'sektor' => '14',
        ]);
        $pusdataru->roles()->attach(14);

        $dpu= User::create([
            'name' => 'Pekerjaan Umum / Bina Marga',
            'username' => 'dpu',
            'password' => bcrypt('dpu123'),
            'sektor' => '15',
        ]);
        $dpu->roles()->attach(15);

        $disnakkeswan= User::create([
            'name' => 'Peternakan dan Kesehatan Hewan',
            'username' => 'disnakkeswan',
            'password' => bcrypt('disnakkeswan123'),
            'sektor' => '16',
        ]);
        $disnakkeswan->roles()->attach(16);

        $esdm= User::create([
            'name' => 'Energi dan Sumber Daya Mineral',
            'username' => 'esdm',
            'password' => bcrypt('esdm123'),
            'sektor' => '17',
        ]);
        $esdm->roles()->attach(17);

        $bppd= User::create([
            'name' => 'BPPD',
            'username' => 'bppd',
            'password' => bcrypt('bppd123'),
            'sektor' => '17',
        ]);
        $bppd->roles()->attach(18);

        $admin= User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
        ]);
        $admin->roles()->attach(19);
    }
}
