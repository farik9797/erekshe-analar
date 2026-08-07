<?php
/**
 * EREKSHE ANALAR theme functions
 */

if (!defined('ABSPATH')) exit;

define('EREKSHE_VER', '1.0.0');
define('EREKSHE_DIR', get_template_directory());
define('EREKSHE_URI', get_template_directory_uri());

require_once EREKSHE_DIR . '/inc/icons.php';
require_once EREKSHE_DIR . '/inc/nav.php';
require_once EREKSHE_DIR . '/inc/data.php';
require_once EREKSHE_DIR . '/inc/strings.php';
require_once EREKSHE_DIR . '/inc/acf-fields.php';

// Доп. переводы строк шаблонов (регистрируют фильтр erekshe_tr_extra)
foreach (glob(EREKSHE_DIR . '/inc/i18n-extra-*.php') as $__f) require_once $__f;

/* ---------- Язык (Polylang) ----------
   Текущий язык интерфейса: 'ru' (по умолчанию) или 'kk'.
   Используется в data.php / strings.php для выбора локализованного контента. */
function erekshe_lang() {
    if (function_exists('pll_current_language')) {
        $l = pll_current_language('slug');
        // Нормализуем любой казахский слаг (kz/kaz) к 'kk' — под ключи контента
        if ($l === 'kz' || $l === 'kaz') return 'kk';
        if ($l) return $l;
    }
    return 'ru';
}

/* ---------- Theme setup ---------- */
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    register_nav_menus([
        'primary' => 'Главное меню',
    ]);
});

/* ---------- Assets ---------- */
add_action('wp_enqueue_scripts', function () {
    // Собранный Tailwind CSS (визуал 1:1 с исходным сайтом)
    wp_enqueue_style('erekshe-tailwind', EREKSHE_URI . '/assets/css/tailwind.css', [], EREKSHE_VER);
    // Заголовок темы + кастомные стили (доступность, скроллбар)
    wp_enqueue_style('erekshe-style', get_stylesheet_uri(), ['erekshe-tailwind'], EREKSHE_VER);
    // Интерактив: слайдеры, модалки, доступность, поиск
    wp_enqueue_script('erekshe-main', EREKSHE_URI . '/assets/js/main.js', [], EREKSHE_VER, true);
});

/* ---------- ACF field helper ----------
   Возвращает значение поля ACF или дефолт (совпадающий с исходной вёрсткой),
   чтобы страница рендерилась корректно даже до заполнения полей. */
function erekshe_field($key, $default = '', $post_id = false) {
    if (function_exists('get_field')) {
        $val = get_field($key, $post_id);
        if ($val !== null && $val !== '' && $val !== false) return $val;
    }
    return $default;
}

/* Значение из Options Page (глобальные настройки сайта) */
function erekshe_opt($key, $default = '') {
    return erekshe_field($key, $default, 'option');
}

/* ---------- Русская плюрализация ---------- */
function erekshe_plural($n, $one, $few, $many) {
    $n = abs((int) $n);
    $t = $n % 100;
    if ($t > 10 && $t < 20) return $many;
    $u = $n % 10;
    if ($u === 1) return $one;
    if ($u >= 2 && $u <= 4) return $few;
    return $many;
}

/* ---------- Список карточек из ACF-репитера или дефолт из data.php ----------
   Если ACF-репитер заполнен на текущей записи — вернуть его, иначе fallback. */
function erekshe_get_rows($key, $fallback = [], $post_id = false) {
    if (function_exists('get_field')) {
        $val = get_field($key, $post_id);
        if (is_array($val) && count($val)) return $val;
    }
    return $fallback;
}
