<?php

namespace Webremote\Core;

class Remote
{
    private $token;
    private $is;

    public function __construct()
    {
        if(isset($_GET['token']) && !empty($_GET['token'])) {
            $this->token = $_GET['token'];
            session_id($this->token);
            session_start();
            setcookie('is', 'remote');
            $this->setEvent('start');
        } else {
            if(isset($_COOKIE['is'])) {
                $this->is = $_COOKIE['is'];
            } else {
                setcookie('is', 'website');
            }
            session_start();
            $this->token = session_id();
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

    public function getToken()
    {
        return $this->token;
    }

    public function setEvent($event)
    {
        file_put_contents('../sessions/' . $this->token . '.txt', $event);
        header('Location:' . BASEHREF);
        exit;
    }

    public function listenEvent()
    {
        if(isset($_GET['event']) && !empty($_GET['event'])) {
            $this->setEvent($_GET['event']);
        }
    }
}
