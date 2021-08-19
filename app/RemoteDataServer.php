<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class RemoteDataServer extends Model {
    protected $fillable = ['ip_address', 'username', 'password', 'size_gb'];

    public static function findOptimalServer() {
        $servers = RemoteDataServer::all();

        foreach ($servers as $server) {
            try {
                $ftpObj = new FTPClient();
                $ftpObj->connect($server->ip_address, $server->username, $server->password);
                $serverMB = $ftpObj->getDirSize('files') / 1000000;
                $serverGB = $serverMB / 1000;
                if($serverGB < $server->size_gb) return $server;
            } catch (\Exception $e) {
                Log::error($e);
            }
        }

        return null;
    }

    public function getFTPConnection():FTPClient {
        $ftpObj = new FTPClient();
        $ftpObj->connect($this->ip_address, $this->username, $this->password);
        return $ftpObj;
    }

    public static function getIP($server_id) {
        if(!RemoteDataServer::where('id', $server_id)->exists()) return null;
        return RemoteDataServer::where('id', $server_id)->get()[0]->ip_address;
    }
}
