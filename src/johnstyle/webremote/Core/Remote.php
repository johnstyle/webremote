<?php

namespace Webremote\Core;

class Remote
{
    private $is;
    private static $token;

    public function __construct()
    {
        if(isset($_GET['token']) && !empty($_GET['token'])) {
            setcookie('is', 'remote');
            self::setToken($_GET['token']);
            Website::setEvent('start');
        } else {
            if(isset($_COOKIE['is'])) {
                $this->is = $_COOKIE['is'];
            } else {
                setcookie('is', 'website');
            }
            self::setToken();
        }
    }

    public function isRemote()
    {
        return $this->is == 'remote';
    }

    public function isWebsite()
    {
        return $this->is == 'website';
    }

    public static function setToken($token = null)
    {
        if($token) {
            session_id($token);
            self::$token = $token;
        }

        session_start();

        if(!$token) {
            self::$token = session_id();
        }

        session_write_close();
    }

    public static function getToken()
    {
        return self::$token;
    }
}
