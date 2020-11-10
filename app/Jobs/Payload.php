<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

use App\Models\Microservice;
use App\Models\Campaign;

use Log;

class Payload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info($this->request);

        $campaignId = $this->request['campaign']['id'];
        $queryTypeId = $this->request['query_type']['id'];

        $microservices = Microservice::whereJsonDoesntContain('blocked_campaigns', $campaignId)
            ->where(function($query) use($campaignId) {
                $query->where('campaign_id', $campaignId)
                    ->orWhere('campaign_id', '*');
            })
            ->where(function($query) use($queryTypeId) {
                $query->where('query_type', $queryTypeId)
                    ->orWhere('query_type', '*');
            })
            ->get();

        foreach ($microservices as $index => $microservice) {
            $microservice->send($this->request);
        }
    }
}
