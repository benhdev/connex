<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Microservice;

class MicroserviceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Microservice::insert([
            [
                'name' => 'Microservice A',
                'slug' => 'microservice-a',
                'campaign_id' => '*',
                'blocked_campaigns' => json_encode([1516]),
                'query_type' => '*',
                'api_url' => 'https://a.microservice.com/api/payload'
            ],
            [
                'name' => 'Microservice B',
                'slug' => 'microservice-b',
                'campaign_id' => '*',
                'blocked_campaigns' => json_encode([]),
                'query_type' => 1234,
                'api_url' => 'https://b.microservice.com/api/payload'
            ],
            [
                'name' => 'Microservice C',
                'slug' => 'microservice-c',
                'campaign_id' => '*',
                'blocked_campaigns' => json_encode([]),
                'query_type' => '*',
                'api_url' => 'https://c.microservice.com/api/payload'
            ]
        ]);
    }
}
