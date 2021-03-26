<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Suppliers = [
            'Araco admixture and construction materials',
            'Cementre National',
            'Holcim',
            'Sika',
            'Grace',
            'Dahr el baidar Crusher A',
            'Dahr el baidar Crusher B',
            'Ali bdeir - Sibline',
            'Ali bdeir - Airport',

        ];

        foreach ($Suppliers as $Supplier) {
            Supplier::create(['name' => $Supplier]);
        }
    }
}
