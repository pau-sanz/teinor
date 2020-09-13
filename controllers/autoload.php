<?php

function __autoload($class_name) {
    $root = $_SERVER['DOCUMENT_ROOT'];
    $curdir = getcwd();

    
    chdir("$root/teinor_technical_test/teinor/");

    $fileName = "class_" . $class_name . ".php";
    $persistenceFile = "models/persistence/" . $fileName;
    $businessFile = "models/business/" . $fileName;

    if (file_exists($persistenceFile)) {
        require_once $persistenceFile;
    } else {
        if (file_exists($businessFile)) {
            require_once $businessFile;
        }
    }
    chdir($curdir);
}

?>