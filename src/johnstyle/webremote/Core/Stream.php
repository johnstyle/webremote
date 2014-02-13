<?php

namespace Webremote\Core;

class Stream
{
    public function __construct()
    {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
    }

    public function listen()
    {
        while (1) {
            echo 'event: ping' ."\n";
            echo 'data: ' . Website::getEvent() . "\n\n";
            ob_flush();
            flush();
            usleep(100000);
        }
    }
}
