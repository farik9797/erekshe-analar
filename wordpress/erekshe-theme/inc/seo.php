<?php
if (!defined('ABSPATH')) exit;
/**
 * Yoast SEO: локаль Open Graph для казахской версии.
 * В Polylang у казахского языка локаль «kk», Yoast её не знает и пишет en_US — отдаём kk_KZ.
 */
add_filter('wpseo_og_locale', function ($locale) {
    if (function_exists('pll_current_language') && pll_current_language() === 'kk') return 'kk_KZ';
    return $locale;
});
