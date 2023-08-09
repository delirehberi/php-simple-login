#!/usr/bin/env php
<?php

require 'functions.php';

if ($argc < 3) {
    echo "Usage: php console.php run:query:from_file <filename>\n";
    exit(1);
}

$command = $argv[1];
$filename = $argv[2];

if ($command === 'run:query:from_file') {
    $pdo = database_connect();
    run_query_from_file($filename, $pdo);
} else {
    echo "Unknown command: $command\n";
    exit(1);
}
