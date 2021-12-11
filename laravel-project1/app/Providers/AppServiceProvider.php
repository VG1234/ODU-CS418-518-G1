<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(\Illuminate\Http\Request $request)
    {
        $random = Str::random(40);
        DB::table('users')->where('id', Auth::user()->id)->update(['token' => $random]);
        // $response = DB::insert("insert into users (user_id, elasticsearch_article_id,q1_res, q2_res, q3_res, q4_res, q5_res) values ('".$user_id."','".$id."','".$question_1_answer."','".$question_2_answer."','".$question_3_answer."','".$question_4_answer."','".$question_5_answer."')");
        \URL::forceScheme('https');
        if (!empty( env('NGROK_URL'))) {
            $this->app['url']->forceRootUrl(env('NGROK_URL'));
        }
    }
}
