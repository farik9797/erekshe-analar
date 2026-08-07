<?php
if (!defined('ABSPATH')) exit;
// Доп. строки навигации, отсутствующие в translations.ts
add_filter('erekshe_tr_extra', function ($arr, $L) {
    $m = [
        'ru' => [
            'navHome' => 'Главная',
        ],
        'kk' => [
            'navHome' => 'Басты бет',
        ],
    ];
    return array_merge($arr, isset($m[$L]) ? $m[$L] : $m['ru']);
}, 10, 2);
