<?php
if (!defined('ABSPATH')) exit;
// Заголовки групп реестра команды (по должности) + метки
add_filter('erekshe_tr_extra', function ($arr, $L) {
    $m = [
        'ru' => [
            'team_grp_logoped'    => 'Логопеды',
            'team_grp_defectolog' => 'Дефектологи',
            'team_grp_psycholog'  => 'Психологи',
            'team_grp_afk'        => 'Инструкторы АФК',
            'team_grp_pool'       => 'Инструктор по бассейну',
            'team_grp_social'     => 'Социальные работники',
            'team_grp_nurse'      => 'Медицинские сёстры',
            'team_eduLabel'       => 'Образование',
        ],
        'kk' => [
            'team_grp_logoped'    => 'Логопедтер',
            'team_grp_defectolog' => 'Дефектологтар',
            'team_grp_psycholog'  => 'Психологтар',
            'team_grp_afk'        => 'ЕАФК нұсқаушылары',
            'team_grp_pool'       => 'Бассейн нұсқаушысы',
            'team_grp_social'     => 'Әлеуметтік қызметкерлер',
            'team_grp_nurse'      => 'Медбикелер',
            'team_eduLabel'       => 'Білімі',
        ],
    ];
    return array_merge($arr, isset($m[$L]) ? $m[$L] : $m['ru']);
}, 10, 2);
