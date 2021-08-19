<?php

namespace App\Http\Controllers;


use App\RemoteDataServer;

class ServerController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function createServer() {
        $server = new RemoteDataServer();
        $server->ip_address = \request('ip_address');
        $server->username = \request('username');
        $server->password = \request('password');
        $server->size_gb = \request('size_gb');
        $server->save();
        return redirect('/add-server');
    }

}