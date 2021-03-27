<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(GradesSeeder::class);
        $this->call(FracturesSeeder::class);
        $this->call(SuppliersSeeder::class);
        $this->call(ClientsSeeder::class);
        $this->call(TypesSeeder::class);
        $this->call(TestslistTableSeeder::class);
    }
}
