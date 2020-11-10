<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Log;

class Microservice extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'api_url', 'campaign_id', 'blocked_campaigns', 'query_type'];

    protected $casts = [
        'blocked_campaigns' => 'array'
    ];

    public function send($payload)
    {
        Log::info('Sending payload to: ' . $this->api_url);
    }
}
