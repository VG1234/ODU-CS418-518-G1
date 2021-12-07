<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Elasticsearch\ClientBuilder; 
use Carbon\Carbon;


use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index() {
        $token_id = Auth::user()->token;
        // print_r($token_id);
        return $token_id;
    }

    public function getResults(Request $request) {
        $client = ClientBuilder::create()->build();
        $currentUrl = url()->full();
        $current_date_time = Carbon::now()->toDateTimeString();
        $firsth = explode('search=', $currentUrl);
        $search = $firsth[1];
        $firstn = explode('size=', $currentUrl);
        // dd($firstn);
        $firstn1 = explode('&', $firstn[1]);
        $params = [
            'index' => 'articles1',
            'size' => (int)$firstn1[0],
            'explain' => true,
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'query' => $search,
                        'fuzziness' => 'AUTO',
                        'fields' => ['title^5', 'descritpion'],
                    ],
                    ],
            ]
        ];
        $results = $client->search($params);
        $count = $results['hits']['total']['value'];
        $final_json = [];
        $obj = [];
        $response = $results['hits']['hits'];
        $count = 0;
        foreach ($response as $p) {
            $count = $count + 1;
            $obj = [
                'rank'=> $count,
                'title'=> $p['_source']['title'],
                'subtitle'=> $p['_source']['subtitle'],
                'description'=> $p['_source']['description'],
                'timestamp'=> $current_date_time 
            ];
            array_push($final_json,$obj);
        
        }
        return $final_json;        
    }
}
