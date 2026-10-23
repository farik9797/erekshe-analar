<?php
/**
 * Мета Yoast SEO для 13 страниц × 2 языка (RU / KK) — EREKSHE ANALAR.
 * Тексты — wordpress/seo/meta.json (slug => [ru => [title, desc], kk => [title, desc]]).
 * Запуск в LocalWP: wp eval-file wordpress/seo/apply-seo.php
 * На хостинге — тот же код через одноразовый скрипт (WP загружен, Yoast уже активирован).
 */
if (!defined('ABSPATH')) exit;

function erekshe_apply_seo(array $meta) {
    if (!class_exists('WPSEO_Meta') || !class_exists('WPSEO_Options')) return ["Yoast не загружен"];
    $log = [];

    // Организация для разметки Schema и название сайта
    WPSEO_Options::set('company_or_person', 'company');
    WPSEO_Options::set('company_name', 'EREKSHE ANALAR');
    WPSEO_Options::set('website_name', 'EREKSHE ANALAR');
    // Без блога: архивы авторов (раскрывают логин admin в карте сайта), дат и рубрик — не индексировать
    WPSEO_Options::set('disable-author', true);
    WPSEO_Options::set('disable-date', true);
    WPSEO_Options::set('noindex-tax-category', true);
    WPSEO_Options::set('noindex-tax-post_tag', true);
    WPSEO_Options::set('noindex-tax-post_format', true);

    foreach ($meta as $slug => $langs) {
        foreach ($langs as $lang => $pair) {
            list($title, $desc) = $pair;
            // get_posts() глушит фильтр языка Polylang — берём все страницы со slug и выбираем по языку
            $all = get_posts([
                'post_type' => 'page', 'name' => $slug, 'post_status' => 'publish',
                'fields' => 'ids', 'numberposts' => 10, 'lang' => '',
            ]);
            $ids = array_values(array_filter($all, function ($pid) use ($lang) {
                return pll_get_post_language($pid) === $lang;
            }));
            if (count($ids) !== 1) { $log[] = "НЕ НАЙДЕНО: $slug/$lang (" . count($ids) . ")"; continue; }
            $id = (int) $ids[0];
            WPSEO_Meta::set_value('title', $title, $id);
            WPSEO_Meta::set_value('metadesc', $desc, $id);
            wp_update_post(['ID' => $id]); // пересобрать индексируемую запись Yoast
            $log[] = "ok $slug/$lang id=$id";
        }
    }
    return $log;
}

// Запуск через wp eval-file
if (defined('WP_CLI') && WP_CLI) {
    $meta = json_decode(file_get_contents(__DIR__ . '/meta.json'), true);
    foreach (erekshe_apply_seo($meta) as $line) WP_CLI::log($line);
}
