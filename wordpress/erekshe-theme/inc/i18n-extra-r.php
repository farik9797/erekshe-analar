<?php
if (!defined('ABSPATH')) exit;
// Строки страницы «Правила внутреннего распорядка» (page-rules.php / section-rules.php)
add_filter('erekshe_tr_extra', function ($arr, $L) {
    $m = [
        'ru' => [
            'rulesBadge'         => 'Информация для родителей',
            'rulesTitle'         => 'Правила внутреннего распорядка',
            'rulesDesc'          => 'Порядок пребывания детей, права и обязанности родителей, безопасность и организация занятий в центрах Общественного фонда «Erekshe Analar».',
            'rulesFoundation'    => 'Общественный фонд «Erekshe Analar»',
            'rulesExpandAll'     => 'Развернуть всё',
            'rulesCollapseAll'   => 'Свернуть всё',
            'rulesBackToDocs'    => 'Ко всем документам',
            'rulesSectionsLabel' => 'разделов',
            'rulesFootnote'      => 'Ознакомление с Правилами и подтверждение согласия осуществляется при заключении договора в центре фонда.',
        ],
        'kk' => [
            'rulesBadge'         => 'Ата-аналарға арналған ақпарат',
            'rulesTitle'         => 'Ішкі тәртіп қағидалары',
            'rulesDesc'          => '«Erekshe Analar» қоғамдық қорының орталықтарында балалардың болу тәртібі, ата-аналардың құқықтары мен міндеттері, қауіпсіздік және сабақтарды ұйымдастыру.',
            'rulesFoundation'    => '«Erekshe Analar» қоғамдық қоры',
            'rulesExpandAll'     => 'Барлығын ашу',
            'rulesCollapseAll'   => 'Барлығын жию',
            'rulesBackToDocs'    => 'Барлық құжаттарға',
            'rulesSectionsLabel' => 'бөлім',
            'rulesFootnote'      => 'Қағидалармен танысу және келісімді растау орталықта шарт жасасу кезінде жүзеге асырылады.',
        ],
    ];
    $L = ($L === 'kz') ? 'kk' : $L;
    return array_merge($arr, $m[$L] ?? $m['ru']);
}, 10, 2);
