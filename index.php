<?php

declare(strict_types = 1);

use App\Strategies\SimpleSpaceStrategy;
use App\TextHelper;

require_once "vendor/autoload.php";

$simpleStrategy = new SimpleSpaceStrategy();
$helper = new TextHelper($simpleStrategy);

$testCases = [
    '' => '',
    ' ' => '',
    'a' => 'a',
    ' a' => 'a',
    'a ' => 'a',
    'aa' => 'aa',
    '  ' => '',
    ' aa' => 'aa',
    'a a' => 'a a',
    'aa ' => 'aa',
    '  a' => 'a',
    ' a ' => 'a',
    'a  ' => 'a',
    '  aa  aa     a   a    a    ' => 'aa aa a a a'
];


foreach ($testCases as $text => $expectedText) {
    $filteredText = $helper->removeExtraSpaces($text);

    if ($filteredText === $expectedText) {
        echo "$text - filtered correctly".PHP_EOL;
    }else{
        echo "$text - filtered incorrectly".PHP_EOL;
    }
}