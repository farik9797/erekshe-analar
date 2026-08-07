<?php /**
 * Template Name: EREKSHE — Маршрут
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('stepsTitle','9 этапов реабилитационного маршрута'),'badge'=>erekshe_t('stepsBadge','Как проходит реабилитация'),'icon'=>'ClipboardList','desc'=>erekshe_t('stepsSubtitle','Прозрачный путь от первого обращения до результата.')]); ?>
<?php get_template_part('template-parts/section-process'); ?>
<?php get_footer();
