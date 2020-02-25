<?php

unset($argv[0]);

if ($argv[1] == $argv[2]) {
    echo "In balans";
    exit;
}

$numbers = [];
foreach ($argv as $key => $argument) {
    if (strpos($argument, ',')) {
        $weights = array_map('intval', explode(",", $argument));
    } else {
        $numbers[$key] = $argument;
    }
}

rsort($weights);

$difference = abs($numbers[2] - $numbers[1]);
$result = [];
foreach ($weights as $weight) {
    if ($difference >= $weight) {
        $difference = $difference - $weight;
        array_push($result, $weight);
    }
}
if ($difference != 0) {
    echo "Niet in balans te brengen" . PHP_EOL;
};

print implode(",", $result) . PHP_EOL;
