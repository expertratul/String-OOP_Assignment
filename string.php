<?php

$strings = ["Hello", "World", "PHP", "Programming"];

// count vowels in a string

function countVowels($string) {
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $count = 0;
    for ($i = 0; $i < strlen($string); $i++) {
        if (in_array($string[$i], $vowels)) {
            $count++;
        }
    }
    return $count;
}

foreach ($strings as $string) {
    $vowelCount = countVowels($string);
    $reversedString = strrev($string);

    print_r("original string: $string\n");
    print_r("Vowel Count: $vowelCount\n");
    print_r("Reversed String: $reversedString\n");
}
