<?php

function validateKeys(array $get, array $possibleKeys) {
    $validatedKeys = [];
    foreach ($get as $key => $value) {
        if (in_array($key, $possibleKeys) && $value !== "") $validatedKeys[] = $key;
    }
    return $validatedKeys;
}

function precode($content) {
    echo "<pre class='alert alert-warning' role='alert'><code>";
    print_r($content);
    echo "</code></pre>";
}

function showThrowable($throwable)
{
    echo "<pre class='alert alert-warning' role='alert'><code>";
    echo "getFile: " . $throwable->getFile() . PHP_EOL;
    echo "getLine: " . $throwable->getLine() . PHP_EOL;
    echo "getMessage: " . $throwable->getMessage() . PHP_EOL;
    echo "getTraceAsString: " . $throwable->getTraceAsString() . PHP_EOL;
    echo "</code></pre>";
}
