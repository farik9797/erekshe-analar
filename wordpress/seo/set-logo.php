<?php
/**
 * Логотип организации для Yoast SEO (схема Organization): загружает логотип из шапки сайта в медиатеку
 * и указывает его в настройках Yoast. Повторный запуск не создаёт дубль (ищет вложение по метке _erekshe_logo).
 * Запуск в LocalWP: wp eval-file wordpress/seo/set-logo.php
 */
if (!defined('ABSPATH')) exit;

function erekshe_set_yoast_logo() {
    if (!class_exists('WPSEO_Options') || !function_exists('YoastSEO')) return 'Yoast не загружен';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $existing = get_posts(['post_type' => 'attachment', 'post_status' => 'inherit', 'meta_key' => '_erekshe_logo',
        'fields' => 'ids', 'numberposts' => 1, 'lang' => '']);
    if ($existing) {
        $id = (int) $existing[0];
    } else {
        $src = get_template_directory() . '/assets/images/regenerated_image_1785993330916.png'; // логотип из шапки
        if (!is_readable($src)) return 'нет файла логотипа';
        $up = wp_upload_bits('erekshe-analar-logo.png', null, file_get_contents($src));
        if (!empty($up['error'])) return 'ошибка загрузки: ' . $up['error'];
        $id = wp_insert_attachment([
            'post_mime_type' => 'image/png',
            'post_title'     => 'EREKSHE ANALAR — логотип',
            'post_status'    => 'inherit',
        ], $up['file']);
        if (is_wp_error($id) || !$id) return 'ошибка вложения';
        wp_update_attachment_metadata($id, wp_generate_attachment_metadata($id, $up['file']));
        update_post_meta($id, '_wp_attachment_image_alt', 'EREKSHE ANALAR');
        update_post_meta($id, '_erekshe_logo', 1);
    }

    WPSEO_Options::set('company_logo', wp_get_attachment_url($id));
    WPSEO_Options::set('company_logo_id', $id);
    WPSEO_Options::set('company_logo_meta', false);
    $meta = YoastSEO()->helpers->image->get_attachment_meta_from_settings('company_logo');
    return 'ok id=' . $id . ' url=' . wp_get_attachment_url($id) . ' meta=' . ($meta ? $meta['width'] . 'x' . $meta['height'] : 'нет');
}

if (defined('WP_CLI') && WP_CLI) WP_CLI::log(erekshe_set_yoast_logo());
