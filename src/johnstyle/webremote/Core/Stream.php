<?php

namespace Webremote\Core;

class Stream
{
    public function __construct()
    {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
    }

    public function listen($file)
    {
        $lastModified = null;
        while (1) {
            $time = filemtime($file);
            if ($lastModified != $time) {
                $lastModified = $time;
                echo 'data: ' . file_get_contents($file) . "\n\n";
            }
            ob_flush();
            flush();
            sleep(1);
        }
    }
}
