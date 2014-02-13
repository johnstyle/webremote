<?php

use Webremote\Core\Remote;
use Webremote\Core\Website;

define('BASEHREF', 'http://johnstyle.github.io/webremote/public/');

include '../src/johnstyle/webremote/bootstrap.php';

$remote = new Remote();

Website::listenEvent();

?><!doctype html>
<html>
<head>
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Open+Sans:400,700" rel="stylesheet" type="text/css">
    <?php if($remote->isRemote()): ?>
        <link href="css/remote.css" rel="stylesheet" type="text/css">
    <?php else: ?>
        <link href="css/website.css" rel="stylesheet" type="text/css">
    <?php endif; ?>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
</head>
<body>

    <?php if($remote->isRemote()): ?>
        <section id="remote">
            <a href="<?php echo BASEHREF; ?>?event=home">Page home</a>
            <a href="<?php echo BASEHREF; ?>?event=start">Page start</a>
            <a href="<?php echo BASEHREF; ?>?event=contact">Page contact</a>
        </section>
    <?php else: ?>
        <header id="header" class="clearfix">
            <div class="container">
                <h1><a href="#">WEB<span>REMOTE</span></a></h1>
                <nav>
                    <ul>
                        <li class="active"><a href="#home">Home</a></li>
                        <li><a href="#start">start</a></li>
                        <li><a href="#contact">contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="home" class="page">
            <div class="container">
                <h2>WebRemote</h2>
                <p>Munissez-vous de votre smartphone et scannez le QR code<br />pour commencer la navigation sur le site !</p>
                <div class="qrcode" data-url="<?php echo BASEHREF; ?>?token=<?php echo Remote::getToken(); ?>"></div>
            </div>
        </section>
        <section id="start" class="page">
            <div class="container">
                <h2>Bienvenue !</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut neque orci, congue eu nisl id, elementum congue nisl. Cras faucibus sollicitudin turpis, non vulputate lacus sodales a. Fusce ut velit neque. Suspendisse porta et orci in vestibulum. Nulla dui orci, laoreet sit amet rhoncus sed, dignissim sit amet elit. Proin auctor consequat pellentesque. Cras dictum, dolor pellentesque pretium porta, metus magna bibendum ante, at imperdiet neque purus sed leo. Nam diam mauris, egestas vitae vestibulum a, elementum a tortor. Nam ullamcorper est id aliquam scelerisque. Suspendisse sit amet est nisi. Nulla eu tristique odio. Aliquam nec lorem eleifend, auctor justo ac, vestibulum arcu.</p>
            </div>
        </section>
        <section id="contact" class="page">
            <div class="container">
                <h2>Contact</h2>
                <p>Integer lorem massa, vulputate quis luctus ac, pharetra a orci. Vivamus pellentesque, dolor nec aliquet rhoncus, nisl ipsum dictum tellus, non varius odio risus non tortor. Suspendisse dapibus luctus lorem, quis cursus enim placerat id. Etiam ultrices, felis at semper tincidunt, nibh odio dictum eros, vulputate bibendum metus arcu a lacus. Vivamus iaculis placerat consectetur. Proin id tincidunt dolor, a consectetur felis. Cras convallis posuere libero, ac hendrerit ante cursus sit amet. Cras at elementum ipsum. Maecenas tempor, velit eu malesuada accumsan, velit sem consequat libero, vel pellentesque mauris nisi et risus.</p>
            </div>
        </section>
    <?php endif; ?>
    <?php if($remote->isRemote()): ?>
        <script type="text/javascript" src="js/remote.js"></script>
    <?php else: ?>
        <script type="text/javascript" src="https://raw.github.com/jeromeetienne/jquery-qrcode/master/src/qrcode.js"></script>
        <script type="text/javascript" src="https://raw.github.com/jeromeetienne/jquery-qrcode/master/src/jquery.qrcode.js"></script>
        <script type="text/javascript" src="js/website.js"></script>
    <?php endif; ?>
</body>
</html>