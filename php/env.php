<?php
$env = parse_ini_file('/www/.env');

if ($env === false) {
    die("Failed to load the .env file");
}

foreach ($env as $key => $value) {
    putenv("$key=$value");
}
