<?php
if (!defined('ABSPATH')) exit;
add_filter('erekshe_tr_extra', function ($arr, $L) {
    $m = [
        'ru' => [
            'c_TeamBadgeSpecialists' => '45+ квалифицированных специалистов',
            'c_CharityBadgeProjects' => 'Социальные проекты',
            'c_StatusCompleted'      => 'Завершён',
            'c_Collected'            => 'Собрано:',
            'c_Goal'                 => 'Цель:',
            'c_ReviewsBadgeFamilies' => 'Истории семей',
            'c_DocumentsBadge'       => 'Документы и отчётность',
            'c_GalleryBadge'         => 'Фотогалерея',
            'c_GalleryTitle'         => 'Моменты из жизни наших центров',
            'c_PartnersBadge'        => 'Нам доверяют',
            'c_ContactAddressLabel'  => 'Адрес головного центра:',
            'c_ContactScheduleLabel' => 'График работы:',
            'c_ContactWhatsappLabel' => 'WhatsApp филиалов:',
            'c_EnrollBadge'          => 'Запись на консультацию',
            'c_ContactAddress'       => 'г. Астана, ул. Аманат, 12/1',
        ],
        'kk' => [
            'c_TeamBadgeSpecialists' => '45+ білікті маман',
            'c_CharityBadgeProjects' => 'Әлеуметтік жобалар',
            'c_StatusCompleted'      => 'Аяқталды',
            'c_Collected'            => 'Жиналды:',
            'c_Goal'                 => 'Мақсат:',
            'c_ReviewsBadgeFamilies' => 'Отбасылар тарихы',
            'c_DocumentsBadge'       => 'Құжаттар мен есептілік',
            'c_GalleryBadge'         => 'Фотогалерея',
            'c_GalleryTitle'         => 'Орталықтарымыз өмірінен сәттер',
            'c_PartnersBadge'        => 'Бізге сенеді',
            'c_ContactAddressLabel'  => 'Бас орталықтың мекенжайы:',
            'c_ContactScheduleLabel' => 'Жұмыс кестесі:',
            'c_ContactWhatsappLabel' => 'Филиалдардың WhatsApp-ы:',
            'c_EnrollBadge'          => 'Кеңеске жазылу',
            'c_ContactAddress'       => 'Астана қ., Аманат көшесі, 12/1',
        ],
    ];
    return array_merge($arr, isset($m[$L]) ? $m[$L] : $m['ru']);
}, 10, 2);
