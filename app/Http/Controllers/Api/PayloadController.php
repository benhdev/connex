<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Jobs\Payload;

class PayloadController extends Controller
{
    /**
     * Recieve a payload and send to correct microservice
     * @author Ben Hirst
     *
     * @param Request $request
     *
     * @return Json
     */
    public function payload(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email:rfc,dns,filter',

            'query_type' => 'required',
            'query_type.id' => 'required',
            'query_type.title' => 'required',

            'call_stats' => 'required',
            'call_stats.id' => 'required',
            'call_stats.length' => 'required',
            'call_stats.recording_url' => 'required',

            'campaign' => 'required',
            'campaign.id' => 'required',
            'campaign.name' => 'required',
            'campaign.description' => 'required'
        ]);

        Payload::dispatch($request->all());

        return response()->json([
            'status' => 'success'
        ]);
    }
}
