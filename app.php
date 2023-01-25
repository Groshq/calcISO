<?php

require_once 'vendor/autoload.php';

use lib\Count;

require_once 'lib/Count.php';
require_once 'lib/Operations.php';

if (!empty($_GET['math'])) {
    $math = base64_decode($_GET['math']);
} else {
    $math = 0;
}

try {
    die((new Count())->count($math));
} catch (Exception $e) {
    echo 'wystapil blad, sory';
}