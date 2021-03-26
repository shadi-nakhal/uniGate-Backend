<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Head of lab',
            'Qc manager',
            'Plant manager',
            'Technician',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
