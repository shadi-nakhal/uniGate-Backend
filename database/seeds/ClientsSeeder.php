<?php

use Illuminate\Database\Seeder;
use App\Client;
use App\Project;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects =  [
            'Rabih Nakhal' => [
                'name' => 'UniGate',
                'location' => 'Beirut - Hamra near zaza building',
                'engineer_firstname' => 'shadi',
                'engineer_lastname' => 'nakhal',
                'engineer_phone' => '+9613636255',
                'engineer_email' => 'shadi@shadi.com',
                'contact_firstname' => 'abbas',
                'contact_lastname' => 'abbas',
                'contact_email' => 'abbas@abbas.com',
                'contact_phone' => '+9613736235',
            ],
            'Shadi Nakhal' => [
                'name' => 'Mega center',
                'location' => 'Beirut - Downtown near batata building',
                'engineer_firstname' => 'jamal',
                'engineer_lastname' => 'jamal',
                'engineer_phone' => '+9613136155',
                'engineer_email' => 'jamal@jamal.com',
                'contact_firstname' => 'abbas',
                'contact_lastname' => 'abbas',
                'contact_email' => 'abbas@abbas.com',
                'contact_phone' => '+9613732235',
            ],
            'Kamal Nakhal' => [
                'name' => 'Walt Disney',
                'location' => 'khalda - Main road',
                'engineer_firstname' => 'jamal',
                'engineer_lastname' => 'jamal',
                'engineer_phone' => '+9613136155',
                'engineer_email' => 'jamal@jamal.com',
                'contact_firstname' => 'abbas',
                'contact_lastname' => 'abbas',
                'contact_email' => 'abbas@abbas.com',
                'contact_phone' => '+9613732235',
            ],
        ];

        $clients = [
            [
                'name' => 'Rabih Nakhal',
                'email' => 'rabih@rabih.com',
                'phone' => '+9613666555',
                'address' => 'Beirut Downtown - arze building - 1st floor',

            ],
            [
                'name' => 'Shadi Nakhal',
                'email' => 'shadi@shadi.com',
                'phone' => '+9613666222',
                'address' => 'Beirut hamra - kaza building - 1st floor',
            ],
            [
                'name' => 'Kamal Nakhal',
                'email' => 'kamal@Kamal.com',
                'phone' => '+9613666333',
                'address' => 'Beirut main - main building - 1st floor',
            ]
        ];
        $total = 0;
        foreach ($clients as $client) {
            $total += 1;
            $user = Client::create([
                'name' => $client['name'],
                'email' => $client['email'],
                'phone' => $client['phone'],
                'address' => $client['address'],
            ]);
            $name = ['name' => $client['name']];
            if (array_key_exists($name['name'], $projects)) {
                $pro = $projects[$name['name']];
                Project::create([
                    'name' => $pro['name'],
                    'location' => $pro['location'],
                    'engineer_firstname' => $pro['engineer_firstname'],
                    'engineer_lastname' => $pro['engineer_lastname'],
                    'engineer_phone' => $pro['engineer_phone'],
                    'engineer_email' => $pro['engineer_email'],
                    'contact_firstname' => $pro['contact_firstname'],
                    'contact_lastname' => $pro['contact_lastname'],
                    'contact_email' => $pro['contact_email'],
                    'contact_phone' => $pro['contact_phone'],
                    'client_id' => $total,
                ]);
            }
        }
    }
}
