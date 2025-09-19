<?php

declare(strict_types=1);

require_once "./functions.php";

$APCsList = require_once "./data/algeria_cities.php";

$wilayas = getWilayas($APCsList);

$APCsList = getWilayaApcs($APCsList, $wilayas);

$json = json_encode($APCsList, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

file_put_contents('./algeria_wilayas_apcs.json', $json);

# Exporting to a PHP file:
//$APCsList = var_export($APCsList, true);
//file_put_contents('algeria_wilayas_apcs.php', "<?php\nreturn " . $APCsList . ";\n");


