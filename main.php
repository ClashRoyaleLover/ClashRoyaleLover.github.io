<?php

use Gerbreder\Autoload\AutoloadHandler as Autoloader;
use Gerbreder\Gateway\Processor as Processor;

require_once 'src/Gerbreder/Autoload/AutoloadHandler.php';

Autoloader::autoload();
$processor = new Processor($_POST);
?>