<?php

namespace Webremote\Core;

class Website
{
    public static function setEvent($event)
    {
        session_start();
        $_SESSION['event'] = $event;
        session_write_close();
        header('Location:' . BASEHREF);
        exit;
    }

    public static function getEvent()
    {
        session_start();
        $event = isset($_SESSION['event']) ? $_SESSION['event'] : null;
        session_write_close();
        return $event;
    }

    public static function listenEvent()
    {
        if(isset($_GET['event']) && !empty($_GET['event'])) {
            self::setEvent($_GET['event']);
        }
    }
}