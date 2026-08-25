<?php
if (!defined('ABSPATH')) exit;
// Лейблы детального вида услуги (модалка)
add_filter('erekshe_tr_extra', function ($arr, $L) {
    $m = [
        'ru' => [
            'svc_details'     => 'Подробнее',
            'svc_indications' => 'Показания',
            'svc_results'     => 'Ожидаемые результаты',
            'svc_duration'    => 'Продолжительность',
            'svc_age'         => 'Возраст',
        ],
        'kk' => [
            'svc_details'     => 'Толығырақ',
            'svc_indications' => 'Көрсетілімдер',
            'svc_results'     => 'Күтілетін нәтижелер',
            'svc_duration'    => 'Ұзақтығы',
            'svc_age'         => 'Жасы',
        ],
    ];
    return array_merge($arr, isset($m[$L]) ? $m[$L] : $m['ru']);
}, 10, 2);
