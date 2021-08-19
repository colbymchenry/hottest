<?php

namespace App\Http;


use Illuminate\Support\Facades\Session;

class AlertHelper {

    public static function alertSuccess($msg) {
        $array = array();
        if(Session::has('alerts')) $array = Session::get('alerts');
        $array['success'] = $msg;
        Session::put('alerts', $array);
    }

    public static function alertWarning($msg) {
        $array = array();
        if(Session::has('alerts')) $array = Session::get('alerts');
        $array['warning'] = $msg;
        Session::put('alerts', $array);
    }

    public static function alertDanger($msg) {
        $array = array();
        if(Session::has('alerts')) $array = Session::get('alerts');
        $array['danger'] = $msg;
        Session::put('alerts', $array);
    }

    public static function alertInfo($msg) {
        $array = array();
        if(Session::has('alerts')) $array = Session::get('alerts');
        $array['info'] = $msg;
        Session::put('alerts', $array);
    }

    public static function getAlerts() {
        return Session::has('alerts') ? Session::get('alerts') : array();
    }

    public static function clearAlerts() {
        Session::remove('alerts');
    }
}