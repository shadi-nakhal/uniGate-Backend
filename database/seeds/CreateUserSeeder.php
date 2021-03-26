<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'firstname' => 'rabih',
            'lastname' => 'nakhal',
            'email' => 'rabih@rabih.com',
            'mobile' => '+9613666555',
            'ext' => '666',
            'role' => 'Head of lab',
            'status' => 1,
            'image' => 'avatar',
            'password' => '123123'
        ]);

        $user1->assignRole('Head of lab');


        $user2 = User::create([
            'firstname' => 'shadi',
            'lastname' => 'nakhal',
            'email' => 'shadi@shadi.com',
            'mobile' => '+9613666555',
            'ext' => '666',
            'role' => 'Qc manager',
            'status' => 1,
            'image' => 'avatar',
            'password' => '123123'
        ]);
        $user2->assignRole('Qc manager');


        $user3 = User::create([
            'firstname' => 'sam',
            'lastname' => 'sammy',
            'email' => 'sam@sam.com',
            'mobile' => '+9613666555',
            'ext' => '666',
            'role' => 'Plant manager',
            'status' => 1,
            'image' => 'avatar',
            'password' => '123123'
        ]);
        $user3->assignRole('Plant manager');

        $user4 = User::create([
            'firstname' => 'ramy',
            'lastname' => 'ramy',
            'email' => 'ramy@ramy.com',
            'mobile' => '+9613666555',
            'ext' => '666',
            'role' => 'Technician',
            'status' => 1,
            'image' => 'avatar',
            'password' => '123123'
        ]);
        $user4->assignRole('Technician');
    }
}
