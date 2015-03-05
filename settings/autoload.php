<?php

function __autoload($class){

    $levels = ['/','/../','/../../','/../../../'];
    $paths = ['/','/controllers/','/classes/','/models/','/views/','/views/news/','/functions/','/settings/'];

    foreach ($levels as $level):
        foreach ($paths as $path):
            if (file_exists(__DIR__ . $level . $path . $class .'.php')):
                require_once __DIR__ . $level . $path . $class.'.php';
                break 2;
            endif;
        endforeach;
    endforeach;
}