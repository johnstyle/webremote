<?php

namespace Webremote\Core;

class Website
{
    private static $curentEvent;
    private static $nextEvent;
    private static $prevEvent;
    private static $events;

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
        self::$curentEvent = null;

        session_start();
        self::$curentEvent = $_SESSION['event'];
        session_write_close();

        return self::$curentEvent;
    }

    public static function getPrevEvent()
    {
        return self::$prevEvent;
    }

    public static function getNextEvent()
    {
        return self::$nextEvent;
    }

    public static function listenEvent(array $events = array())
    {
        self::$events = $events;

        if(isset($_GET['event'])
            && !empty($_GET['event'])
            && in_array($_GET['event'], self::$events)) {
            self::setEvent($_GET['event']);
        }

        if (self::getEvent()) {
            $eventsKeys = array_flip(self::$events);
            if(isset(self::$events[$eventsKeys[self::$curentEvent] + 1])) {
                self::$nextEvent = self::$events[$eventsKeys[self::$curentEvent] + 1];
            } else {
                self::$nextEvent = null;
            }

            if(isset(self::$events[$eventsKeys[self::$curentEvent] - 1])) {
                self::$prevEvent = self::$events[$eventsKeys[self::$curentEvent] - 1];
            } else {
                self::$prevEvent = null;
            }
        }
    }
}
