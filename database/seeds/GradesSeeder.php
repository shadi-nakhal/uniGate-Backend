<?php

use Illuminate\Database\Seeder;
use App\Grade;
use App\MixDescription;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grade_name = [
            'B8', 'B10', 'B15', 'B25',
            'B28', 'B30', 'B35', 'B40',
            'B45', 'B45', 'B50', 'B55',
            'B60', 'B70',

        ];
        $grade_number = [
            '8', '10', '15', '25',
            '28', '30', '35', '40',
            '45', '45', '50', '55',
            '60', '70',
        ];

        $descriptions = [
            'B30' => [
                'B30 Normal 19.5mm',
                'B30 screed 10mm',
                'B30 Columns & Walls'
            ],

            'B35' =>  ['B35 Columns & Walls'],
            'B25' =>  [
                'B25 Slab',
                'B25 Columns'
            ],
            'B15' => ['B15 Blinding'],
            'B40' =>  [
                'B40 Normal',
                'B40 Columns & Walls',
                'B40 +Microsilica'
            ],
            'B45' =>   [
                'B45 Flowable',
                'B45 Water Proof'
            ],

            $loop = 0

        ];

        foreach (array_combine($grade_name, $grade_number) as $name  => $number) {
            $loop += 1;
            if (array_key_exists($name, $descriptions)) {

                foreach ($descriptions[$name] as $key => $desc) {
                    MixDescription::create(['description' => $desc, 'grade_name' => $name, 'grade_id' => $loop]);
                }
            }
            Grade::create(['name' => $name, 'grade_number' => $number]);
        }
    }
}
