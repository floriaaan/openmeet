<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstallRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        //IF !INSTALL
        if(File::exists('../storage/app/conf/install.cnf') && Storage::get('/conf/install.cnf') == 'install=true') {
            return $this->Home();
        }
        return $this->Install();
    }

    public function install() {
        return view('install.form');
    }

    public function installPost(InstallRequest $request){
        $post = $request->input();

        /*file_put_contents('./css/custom.css',
            ".openmeet-color{color:". $post['iColor']  .";}");*/

        Storage::disk('local')->put('/conf/install.cnf', 'install=true');

        return view('install.done', ['name' => $post['iName']]);
    }

    public function home()
    {
        return view('home');
    }
}
