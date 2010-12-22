<?php // http://pastebin.com/mbf2agCi

foreach(range(1,10000) as $number) {
    //echo "$number => ".toWord($number)."\n";
    echo toWord($number)."\n";
}

function toWord($number, $zehnerstelle = false) {
    //var_dump($number);
    if($number > 999) {
        return toWord((int)($number / 1000))."tausend".toWord($number % 1000);
    }
    if($number > 99) {
        return toWord((int)($number / 100))."hundert".toWord($number % 100);
    }
    if($number > 19) {
        if($number % 10) {
            return toWord($number % 10)."und".toWord((int)($number / 10), true)."zig";
        }
        return toWord((int)($number / 10), true)."zig";
    }
    switch($number) {
        case 0: return "";
        case 1: return "ein";
        case 2: return $zehnerstelle ? "zwan" : "zwei";
        case 3: return $zehnerstelle ? "dreiß" : "drei";
        case 4: return "vier";
        case 5: return "fünf";
        case 6: return "sechs";
        case 7: return "sieben";
        case 8: return "acht";
        case 9: return "neun";
        case 10: return "zehn";
        case 11: return "elf";
        case 12: return "zwoelf";
        default: return toWord($number - 10)."zehn";
    }
}

