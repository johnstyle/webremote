<?php

use Webremote\Core\Remote;
use Webremote\Core\Website;

define('ROOT', realpath(__DIR__) . '/..');

/** Settings */
include ROOT . '/settings.php';
include '../src/johnstyle/webremote/bootstrap.php';

$remote = new Remote();

Website::listenEvent(array(
    'home', 'intro', 'info', 'forkme'
));

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WebRemote</title>
    <link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Open+Sans:400,700" rel="stylesheet" type="text/css">
    <link href="css/common.css" rel="stylesheet" type="text/css">
    <?php if($remote->isRemote()): ?>
        <link href="css/remote.css" rel="stylesheet" type="text/css">
    <?php else: ?>
        <link href="css/website.css" rel="stylesheet" type="text/css">
    <?php endif; ?>
</head>
<body>

    <?php if($remote->isRemote()): ?>
        <header id="header" class="clearfix">
            <div class="container">
                <h1>WEB<span>REMOTE</span></h1>
            </div>
        </header>
        <section id="remote">
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="<?php echo BASEHREF; ?>?event=home" class="home"></a></li>
                        <li>
                            <?php if(Website::getPrevEvent()): ?>
                                <a href="<?php echo BASEHREF; ?>?event=<?php echo Website::getPrevEvent(); ?>" class="up"></a>
                            <?php else: ?>
                                <span class="up"></span>
                            <?php endif; ?>
                        </li>
                        <li>
                            <?php if(Website::getNextEvent()): ?>
                                <a href="<?php echo BASEHREF; ?>?event=<?php echo Website::getNextEvent(); ?>" class="down"></a>
                            <?php else: ?>
                                <span class="down"></span>
                            <?php endif; ?>
                        </li>
                        <li><a href="<?php echo BASEHREF; ?>?event=forkme" class="info"></a></li>
                    </ul>
                </nav>
            </div>
        </section>
    <?php else: ?>
        <header id="header" class="clearfix">
            <div class="container">
                <h1><a href="#home">WEB<span>REMOTE</span></a></h1>
                <nav>
                    <ul>
                        <li class="active"><a href="#home">Acceuil</a></li>
                        <li><a href="#intro">Introduction</a></li>
                        <li><a href="#info">Explication</a></li>
                        <li><a href="#forkme">Fork me!</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="home" class="page">
            <div class="container">
                <h2>Une nouvelle expérience...</h2>
                <p>Munissez-vous de votre smartphone et scannez<br />le QR code ci-dessous pour commencer la navigation sur le site !</p>
                <div class="qrcode" data-url="<?php echo BASEHREF; ?>?token=<?php echo Remote::getToken(); ?>"></div>
            </div>
        </section>
        <section id="intro" class="page">
            <div class="container">
                <h2>Bienvenue !</h2>
                <p>Vous naviguez à présent sur le site avec votre smartphone.</p>
                <p>L'exemple que vous verrez ici se contente d'intéractions basiques mais les possibilitées sont infinies !</p>
            </div>
        </section>
        <section id="info" class="page">
            <div class="container">
                <h2>Comment ça marche ?</h2>
                <p>Contrairement aux apparences, la mise en place de ce système est très simple.</p>
                <p>Il suffit je jouer avec les <strong>sessions</strong> PHP et d'utiliser le header <strong>event-stream</strong> pour la réactivité de l'interaction entre le mobile et le site internet.</p>
            </div>
        </section>
        <section id="forkme" class="page">
            <div class="container">
                <h2>Fork me!</h2>
                <p>Ce projet est OpenSource, comme la majorités des projets que je réalise !</p>
                <p>N'hésitez donc pas à participer à son développement.</p>
                <div class="author clearfix">
                    <img src="https://0.gravatar.com/avatar/3c0b897723fdd76d4eca546d32f34180?d=https%3A%2F%2Fidenticons.github.com%2F68ee3ff9d8b866cd11e155da3538b064.png&r=x&s=170">
                    <p>Auteur : Jonathan Sahm</p>
                    <p>Mon GitHub : <a href="https://github.com/johnstyle" target="_blank">JohnStyle</a></p>
                    <p>Le projet : <a href="https://github.com/johnstyle/webremote" target="_blank">WebRemote</a></p>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
    <?php if($remote->isRemote()): ?>
        <script type="text/javascript" src="js/remote.js"></script>
    <?php else: ?>
        <script type="text/javascript" src="bower_components/jquery.qrcode/src/qrcode.js"></script>
        <script type="text/javascript" src="bower_components/jquery.qrcode/src/jquery.qrcode.js"></script>
        <script type="text/javascript" src="js/website.js"></script>
    <?php endif; ?>
    <?php if(defined('GOOGLE_ANALYTICS')): ?>
        <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', '<?php echo GOOGLE_ANALYTICS; ?>', '<?php echo $_SERVER['REMOTE_HOST']; ?>');
            ga('send', 'pageview');
        </script>
    <?php endif; ?>
</body>
</html>
