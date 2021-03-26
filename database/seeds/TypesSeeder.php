<?php

use App\Type;
use App\TypeDescription;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['type' => 'Natural Sand', 'belongs' => 'Materials'],
            ['type' => 'Crushed Sand', 'belongs' => 'Materials'],
            ['type' => 'Medium Aggregate', 'belongs' => 'Materials'],
            ['type' => 'Coarse Aggregate', 'belongs' => 'Materials'],
            ['type' => 'Admixture', 'belongs' => 'Materials'],
            ['type' => 'Microsilica', 'belongs' => 'Materials'],
            ['type' => 'Cement', 'belongs' => 'Materials'],
            ['type' => 'Water', 'belongs' => 'Materials'],
            ['type' => 'Water Proof', 'belongs' => 'Materials'],
            ['type' => 'Cylinder', 'belongs' => 'Concrete'],
            ['type' => 'Core', 'belongs' => 'Concrete'],
            ['type' => 'Fresh Concrete', 'belongs' => 'Concrete'],
        ];

        $description = [
            ['type' => 'Natural Sand', 'description' => 'Sea Sand'],
            ['type' => 'Crushed Sand', 'description' => '0.600mm'],
            ['type' => 'Medium Aggregate', 'description' => '10mm'],
            ['type' => 'Medium Aggregate', 'description' => 'Basalt'],
            ['type' => 'Coarse Aggregate', 'description' => '20mm'],
            ['type' => 'Coarse Aggregate', 'description' => '25mm'],
            ['type' => 'Admixture', 'description' => 'Sp10 Araco'],
            ['type' => 'Admixture', 'description' => 'Sp100 Sika'],
            ['type' => 'MicroSilica', 'description' => 'China-dense'],
            ['type' => 'Cement', 'description' => 'Type 1 / Silo'],
            ['type' => 'Cement', 'description' => 'Type 2 / Ticket# 145'],
            ['type' => 'Water', 'description' => 'Batch plant tank'],
            ['type' => 'Water', 'description' => 'Well # 1'],
            ['type' => 'Water Proof', 'description' => 'WA 10 Araco'],
            ['type' => 'Cylinder', 'description' => 'Trail Mix 1'],
            ['type' => 'Cylinder', 'description' => 'Type 2 Cement-Mockup'],
            ['type' => 'Cylinder', 'description' => 'After 1hr Trail Mix'],
            ['type' => 'Fresh Concrete', 'description' => 'Temperature Monitor'],
            ['type' => 'Fresh Concrete', 'description' => 'Trail Mix 2'],
            ['type' => 'Fresh Concrete', 'description' => 'Trail Mix 2 previous'],
        ];
        $loops = 0;
        foreach ($types as $type) {
            $loops += 1;
            Type::create(['type' => $type['type'], 'belongs' => $type['belongs']]);
            foreach ($description as $desc) {
                if ($desc['type'] == $type['type']) {
                    TypeDescription::create([
                        'type' => $type['type'], 'type_id' => $loops,
                        'description' => $desc['description']
                    ]);
                }
            }
        }
    }
}
