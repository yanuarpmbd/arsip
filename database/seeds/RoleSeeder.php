<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Superadmin',
            'DKP',
            'DISHUT',
            'DISHUB',
            'DINKES',
            'DLHK',
            'DISDIKBUD',
            'DISPERINDAG',
            'DISBUN',
            'DISNAKER',
            'DINKOP',
            'KESBANGPOL',
            'PUSDATARU',
            'DPU',
            'DISNAKKESWAN',
            'ESDM',
            'SATPOL',
        ];


        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
