<?php
/**
 * Навигация сайта — единый источник для шапки, футера и мобильного меню.
 * Метки двуязычны (erekshe_t по nav-ключам), URL ведут на перевод страницы
 * в текущем языке Polylang.
 */
if (!defined('ABSPATH')) exit;

function erekshe_nav_items() {
    $items = [
        ['slug' => '',            'key' => 'navHome'],
        ['slug' => 'about',       'key' => 'navAbout'],
        ['slug' => 'services',    'key' => 'navServices'],
        ['slug' => 'process',     'key' => 'navProcess'],
        ['slug' => 'branches',    'key' => 'navBranches'],
        ['slug' => 'team',        'key' => 'navTeam'],
        ['slug' => 'umay',        'key' => 'navUmay'],
        ['slug' => 'charity',     'key' => 'navCharity'],
        ['slug' => 'documents',   'key' => 'navDocuments'],
        ['slug' => 'news',        'key' => 'navNews'],
        ['slug' => 'reviews-faq', 'key' => 'navReviews'],
        ['slug' => 'contacts',    'key' => 'navContacts'],
    ];
    $out = [];
    foreach ($items as $it) {
        $out[] = [
            'slug'  => $it['slug'],
            'label' => erekshe_t($it['key']),
            'url'   => erekshe_nav_url($it['slug']),
        ];
    }
    return $out;
}

/** URL пункта навигации с учётом текущего языка (перевод страницы) */
function erekshe_nav_url($slug) {
    if ($slug === '') {
        return function_exists('pll_home_url') ? pll_home_url() : home_url('/');
    }
    $page = get_page_by_path($slug);
    if (!$page) return home_url('/' . $slug);
    if (function_exists('pll_get_post')) {
        $tr = pll_get_post($page->ID); // перевод в текущем языке
        if ($tr) return get_permalink($tr);
    }
    return get_permalink($page);
}

/** Активен ли пункт навигации для текущей страницы */
function erekshe_nav_is_active($slug) {
    if ($slug === '') return is_front_page();
    return is_page($slug);
}

/**
 * Переключатель языков Polylang (RU / ҚАЗ).
 * Каждая ссылка ведёт на перевод текущей страницы в соответствующем языке.
 */
function erekshe_language_switcher($classes = '') {
    if (!function_exists('pll_the_languages')) return;
    $langs = pll_the_languages(['raw' => 1, 'hide_if_no_translation' => 0]);
    if (empty($langs)) return;
    $labels = ['ru' => 'RU', 'kk' => 'ҚАЗ'];
    echo '<div class="' . esc_attr(trim('order-3 sm:order-2 flex items-center bg-slate-800 rounded p-0.5 border border-slate-700 ' . $classes)) . '">';
    foreach ($langs as $l) {
        $slug   = isset($l['slug']) ? $l['slug'] : '';
        $active = !empty($l['current_lang']);
        $label  = isset($labels[$slug]) ? $labels[$slug] : strtoupper($slug);
        $cls    = 'px-2 py-0.5 rounded text-[11px] font-bold transition cursor-pointer ' .
                  ($active ? 'bg-emerald-600 text-white shadow-xs' : 'text-slate-400 hover:text-white');
        printf(
            '<a href="%s" hreflang="%s" lang="%s" class="%s"%s>%s</a>',
            esc_url($l['url']),
            esc_attr($slug),
            esc_attr($slug),
            esc_attr($cls),
            $active ? ' aria-current="true"' : '',
            esc_html($label)
        );
    }
    echo '</div>';
}
