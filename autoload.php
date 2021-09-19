<?php

spl_autoload_register(
    function (string $namespace): void
    {
        $namespace = str_replace("\\", DIRECTORY_SEPARATOR, $namespace);
        $cwd = str_replace('Public', '', getcwd());
        $path = $cwd . 'Source' . DIRECTORY_SEPARATOR . $namespace . '.php';

        include_once $path;
    }
);
