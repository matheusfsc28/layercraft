<?php

if (!function_exists('colorDump')) {
    function colorDump($text, $color = 'green')
    {
        $colors = [
            'black'  => '0;30',
            'red'    => '0;31',
            'green'  => '0;32',
            'yellow' => '0;33',
            'blue'   => '0;34',
            'purple' => '0;35',
            'cyan'   => '0;36',
            'white'  => '0;37',
        ];

        $colorCode = $colors[$color] ?? '0;37';

        echo "\033[" . $colorCode . "m";

        print_r($text);
        print_r("\n");

        echo "\033[0m";
    }
}
