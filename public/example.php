<?php

    define('BASEHREF', 'http://www.webremote.dev/example.php');

    include '../src/johnstyle/webremote/bootstrap.php';
    $remote = new \Webremote\Core\Remote();
    $remote->listenEvent();

?><!doctype html>
<html>
<head>
    <link href="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

    <?php if($remote->isRemote()): ?>
        <a href="<?php echo BASEHREF; ?>?event=home">Page home</a>
        <a href="<?php echo BASEHREF; ?>?event=start">Page start</a>
        <a href="<?php echo BASEHREF; ?>?event=contact">Page contact</a>
    <?php else: ?>
        <div id="home" class="step">
            <h1>WebRemote</h1>
            <p>Scanez le QRCode pour continuer la navigation sur le site</p>
            <div class="qrcode" data-url="<?php echo BASEHREF; ?>?token=<?php echo $remote->getToken(); ?>"></div>
        </div>
        <div id="start" class="step">
            <h1>Bienvenue !</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut neque orci, congue eu nisl id, elementum congue nisl. Cras faucibus sollicitudin turpis, non vulputate lacus sodales a. Fusce ut velit neque. Suspendisse porta et orci in vestibulum. Nulla dui orci, laoreet sit amet rhoncus sed, dignissim sit amet elit. Proin auctor consequat pellentesque. Cras dictum, dolor pellentesque pretium porta, metus magna bibendum ante, at imperdiet neque purus sed leo. Nam diam mauris, egestas vitae vestibulum a, elementum a tortor. Nam ullamcorper est id aliquam scelerisque. Suspendisse sit amet est nisi. Nulla eu tristique odio. Aliquam nec lorem eleifend, auctor justo ac, vestibulum arcu.</p>
        </div>
        <div id="contact" class="step">
            <h1>Contact</h1>
            <p>Integer lorem massa, vulputate quis luctus ac, pharetra a orci. Vivamus pellentesque, dolor nec aliquet rhoncus, nisl ipsum dictum tellus, non varius odio risus non tortor. Suspendisse dapibus luctus lorem, quis cursus enim placerat id. Etiam ultrices, felis at semper tincidunt, nibh odio dictum eros, vulputate bibendum metus arcu a lacus. Vivamus iaculis placerat consectetur. Proin id tincidunt dolor, a consectetur felis. Cras convallis posuere libero, ac hendrerit ante cursus sit amet. Cras at elementum ipsum. Maecenas tempor, velit eu malesuada accumsan, velit sem consequat libero, vel pellentesque mauris nisi et risus.</p>
        </div>
        <script type="text/javascript">
            if (!!window.EventSource) {
                var source = new EventSource('stream.php');
                source.addEventListener('message', function(e) {
                    jQuery('.step').hide();
                    jQuery('#' + e.data).show('slow');
                }, false);
            }
        </script>
    <?php endif; ?>

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/mobile/1.4.0/jquery.mobile-1.4.0.min.js"></script>
    <script type="text/javascript" src="https://raw.github.com/jeromeetienne/jquery-qrcode/master/src/qrcode.js"></script>
    <script type="text/javascript" src="https://raw.github.com/jeromeetienne/jquery-qrcode/master/src/jquery.qrcode.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>