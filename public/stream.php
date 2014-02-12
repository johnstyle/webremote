<?php

include '../src/johnstyle/webremote/bootstrap.php';

session_start();
session_write_close();

$stream = new \Webremote\Core\Stream();
$stream->listen('../sessions/' . session_id() . '.txt');
