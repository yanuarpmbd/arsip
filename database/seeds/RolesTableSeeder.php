<?php

use Illuminate\Database\Seeder;
use App\Models\SKPD\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = Role::create([
            'name' => 'Superadmin',
            'slug' => 'superadmin',
        ]);

        $dkp= Role::create([
            'name' => 'DKP',
            'slug' => 'dkp',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $dishut = Role::create([
            'name' => 'DISHUT',
            'slug' => 'dishut',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $dishut = Role::create([
            'name' => 'DISHUB',
            'slug' => 'dishub',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $dinkes= Role::create([
            'name' => 'DINKES',
            'slug' => 'dinkes',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $dlhk= Role::create([
            'name' => 'DLHK',
            'slug' => 'dlhk',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $disdikbud= Role::create([
            'name' => 'DISDIKBUD',
            'slug' => 'disdikbud',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $disperindag= Role::create([
            'name' => 'DISPERINDAG',
            'slug' => 'disperindag',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $disbun= Role::create([
            'name' => 'DISBUN',
            'slug' => 'disbun',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $disnaker= Role::create([
            'name' => 'DISNAKER',
            'slug' => 'disnaker',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $dinkop= Role::create([
            'name' => 'DINKOP',
            'slug' => 'dinkop',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $kesbangpol= Role::create([
            'name' => 'KESBANGPOL',
            'slug' => 'kesbangpol',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $dinsos= Role::create([
            'name' => 'DINSOS',
            'slug' => 'dinsos',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $pusdataru= Role::create([
            'name' => 'PUSDATARU',
            'slug' => 'pusdataru',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $dpu= Role::create([
            'name' => 'DPU',
            'slug' => 'dpu',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $disnakkeswan= Role::create([
            'name' => 'DISNAKKESWAN',
            'slug' => 'disnakkeswan',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $esdm= Role::create([
            'name' => 'ESDM',
            'slug' => 'esdm',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
        $satpol= Role::create([
            'name' => 'SATPOL',
            'slug' => 'satpol',
            'permissions' => [
                'user-manager' => false,
            ],
        ]);
    }
}
