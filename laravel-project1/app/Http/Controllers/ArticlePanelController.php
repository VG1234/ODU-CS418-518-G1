<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\ClientBuilder; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Http\Request;

class ArticlePanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'articles1',
            'id'    => $id
        ];
        $response = $client->get($params);
        $source = $response['_source']['relevantpapers'];
        $surveyDetails = '';
        return view('dashboard',compact('id', 'source', 'surveyDetails'));
    }

    public function dashboard($id) {
        $client = ClientBuilder::create()->build();
        $user_id = Auth::user()->id;
        $params = [
            'index' => 'articles1',
            'id'    => $id
        ];
        $response = $client->get($params);
        $source = $response['_source']['relevantpapers'];
        // dd($source);
        
        $surveyDetails = DB::select('select * from articles_survey where user_id = "'.$user_id.'" and elasticsearch_article_id = "'.$id.'"') ?? '';
        // dd($surveyDetails[0]->q1_res);
        return view('dashboard',compact('id', 'source', 'surveyDetails'));
    }

    /**
     * Create or update the existing survey details
     */
    public function updateSurveyDetails($id)
    {
        $currentURL = url()->full();

        $firstHalf = explode('article/',$currentURL);

        $user_id = Auth::user()->id;
        // dd($_GET['question_1']);
        $question_1_answer = $_GET['question_1'];
        $question_2_answer = $_GET['question_2'];
        $question_3_answer = $_GET['question_3'];
        $question_4_answer = $_GET['question_4'];
        $question_5_answer = $_GET['question_5'];
        // dd(Input::get('question_1'));
        // $id = trim(explode('/',$firstHalf[1])[0]);

        $response = DB::insert("insert into articles_survey (user_id, elasticsearch_article_id,q1_res, q2_res, q3_res, q4_res, q5_res) values ('".$user_id."','".$id."','".$question_1_answer."','".$question_2_answer."','".$question_3_answer."','".$question_4_answer."','".$question_5_answer."')");

        // $article_raws = DB::select('select * from article_raws');

        // $response = DB::select('select * from article_raws where kibana_id = "'.$id.'"');

        $surveyDetails = DB::select('select * from articles_survey where user_id = "'.$user_id.'" and elasticsearch_article_id = "'.$id.'"');
        // dd($surveyResponses);
      
        // $response = $response[0];

        return view('dashboard',compact('id', 'response', 'surveyDetails'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'articles1',
            'id'    => $id,
            'body' => [
                
            ]
        ];
        $response = $client->update($params);
        $source = $response['_source']['relevantpapers'];
        return view('dashboard',compact('id', 'source'));
        $params = [
            'index' => 'my_index',
            'id'    => 'my_id',
            'body'  => [
                'doc' => [
                    'new_field' => 'abc'
                ]
            ]
        ];
        
        // Update doc at /my_index/_doc/my_id
        $response = $client->update($params);
        // Users update
        $user->name = $request->name;
        $user->verified_user = $request->verified_user;
        // $user->email = $request->email;
        $user->role = $request->role;
        $user->update();
        // echo "User Object after setting";
        // echo "</br>";
        // echo $user;
        return redirect()->route('users.index');
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
