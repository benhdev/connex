<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Campaign;

class CampaignSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaign::insert([
            ['id' => 1011, 'name' => 'Campaign A', 'slug' => 'campaign-a'],
            ['id' => 1516, 'name' => 'Campaign B', 'slug' => 'campaign-b']
        ]);
    }
}
