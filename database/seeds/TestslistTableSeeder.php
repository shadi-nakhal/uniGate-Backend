<?php

use Illuminate\Database\Seeder;
use App\TestsList;

class TestslistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $TestsList = [
            ['test_name' => 'Compressive Strength', 'belongs' => 'Concrete', 'test_route' => 'compressive'],
            ['test_name' => 'Sand Equivalent', 'belongs' => 'Materials', 'test_route' => 'sand'],


        ];

        foreach ($TestsList as $test) {
            TestsList::create([
                'test_name' => $test['test_name'],
                'belongs' => $test['belongs'],
                'test_route' => $test['test_route']
            ]);
        }
    }
}
