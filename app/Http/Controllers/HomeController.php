<?php

namespace App\Http\Controllers;

use App\Event;
use App\Group;
use App\Http\Requests\InstallRequest;
use App\Http\Requests\SearchRequest;
use App\Notification;
use App\Message;
use App\User;
use http\Env\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //IF !INSTALL
        try {
            $install = Setting('openmeet.install');
        } catch (\Exception $e) {
            $install = null;
        }

        if ($install != null && $install) {
            return $this->Home();
        }

        return $this->Install();
    }

    public function install()
    {
        Artisan::call('key:generate');
        return view('install.form');
    }

    public function installPost(InstallRequest $request)
    {
        $post = $request->input();
        try {
            Setting(['openmeet.install' => true]);
            Setting(['openmeet.name' => $post['iName']]);
            Setting(['openmeet.slogan' => $post['iSlogan']]);
            Setting(['openmeet.color' => $post['iColor']]);

            Setting(['openmeet.theme' => 'day']);
            Setting(['openmeet.robots' => true]);

            Setting()->save();



            /*Setting(['database.host' => $post['iDBHost']]);
            Setting(['database.user' => $post['iDBUser']]);
            Setting(['database.pass' => $post['iDBPass']]);*/

            self::changeEnvironmentVariable('APP_NAME', $post['iName']);

            /*self::changeEnvironmentVariable('DB_HOST', $post['iDBHost']);
            self::changeEnvironmentVariable('DB_DATABASE', $post['iDBName']);
            self::changeEnvironmentVariable('DB_USERNAME', $post['iDBUser']);
            $pass = isset($post['iDBPass']) ? $post['iDBPass'] : '';
            self::changeEnvironmentVariable('DB_PASSWORD', $pass);



            if(isset($post['iDBMigrate']) && $post['iDBMigrate'] == 'on') {
                DB::purge();
                DB::connection();
                Artisan::call('cache:clear');
                Artisan::call('migrate:fresh');
            }*/

            $user = new User();
            $user->fname = $post['fname'];
            $user->lname = $post['lname'];
            $user->email = $post['email'];
            $user->bdate = $post['bdate'];
            $user->password = $post['password'];
            $user->isadmin = 1;
            $user->push();
            config(['APP_NAME' => $post['iName']]);
        } catch (\Exception $e) {
            var_dump($e);
        }

        return view('install.done');
    }

    public function home()
    {


        return view('home');
    }

    public function search(SearchRequest $request)
    {
        $post = $request->input();

        $listGroup = (new Group)->getLike($post['search']);
        $listEvent = (new Event)->getLike($post['search']);

        $searchResult = [];

        foreach ($listGroup as $g) {
            $searchResult[] = ['content' => $g, 'type' => 'group'];
        }
        foreach ($listEvent as $e) {
            $searchResult[] = ['content' => $e, 'type' => 'event'];
        }

        return view('search', [
            's' => $post['search'],
            'search' => $searchResult
        ]);
    }

    public static function changeEnvironmentVariable($key,$value)
    {
        $path = base_path('.env');

        if(is_bool(env($key)))
        {
            $old = env($key)? 'true' : 'false';
        }
        elseif(env($key)===null){
            $old = 'null';
        }
        else{
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=".$old, "$key=".$value, file_get_contents($path)
            ));
        }
    }
}
