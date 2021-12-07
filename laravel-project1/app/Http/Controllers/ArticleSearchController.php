<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder; 
use Illuminate\Support\Str;

class ArticleSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $client = ClientBuilder::create()->build();

        $search = $request->input('search');
        // $esearch = htmlspecialchars($search);
        // $esearch = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $search);
        $esearch = strip_tags($search);
        // dd($esearch);
        // dd($search);
        if($esearch === '' || Str::length($esearch) === 0) {
            return redirect()->route('dashboard');
        }
        $params = [
            'index' => 'articles1',
            'explain' => true,
            'body'  => [
                'query' => [
                    'multi_match' => [
                        'query' => $esearch,
                        'fuzziness' => 'AUTO',
                        'fields' => ['title^5', 'descritpion'],
                    ],
                    ],
                    'highlight' => [
                        "pre_tags" => ["<mark>"],
                        "post_tags" => ["</mark>"],
                        "fields" => [
                            "title" => new \stdClass(),
                            "description" => new \stdClass()
                        ],
                        'require_field_match' => false
                    ],
            ]
        ];

        $results = $client->search($params);
        // dd($results['hits']);
        $count = $results['hits']['total']['value'];
        // dd($count);
        $response = $results['hits']['hits'];
        // dd($response[0]['highlight']['description'][0]);
        // dd($response);
        return view('search.maindashboard' ,compact('response','count','esearch'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
