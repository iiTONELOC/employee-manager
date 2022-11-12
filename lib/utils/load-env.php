<?php
// Env file location
const ENV_FILE = __DIR__ . '/../../.env';

// read our file as an array
$envFile = file(ENV_FILE);

// loop through the array and store the key value pairs in our environment variables
foreach ($envFile as $line) {
    // trim off whitespace
    $line = trim($line);

    // skip empty lines and comments
    if (strpos($line, '#') !== 0 && strpos($line, '=') !== false) {
        $line = explode('=', $line);
        $key = trim($line[0]);
        $value = trim($line[1]);
        putenv("$key=$value");
    }
}
