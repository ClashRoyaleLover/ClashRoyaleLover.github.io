<?php

    namespace Gerbreder\Autoload;

    class AutoloadHandler {
        
        public static function autoload() {
            spl_autoload_register(function ($className) {
                $filepath = 'src/' . str_replace('\\', '/', $className) . '.php';
                require($filepath);
            });
        }
    }

?>