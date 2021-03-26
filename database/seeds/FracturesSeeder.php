<?php

use Illuminate\Database\Seeder;
use App\Fracture;

class FracturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Fractures = [
            '1a',
            '1b',
            '2a',
            '2b',
            '3',
            '4',
            '5a',
            '5b',
            '6'

        ];

        foreach ($Fractures as $Fracture) {
            Fracture::create(['type' => $Fracture]);
        }
    }
}
