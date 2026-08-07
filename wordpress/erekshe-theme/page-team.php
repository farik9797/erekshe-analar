<?php /**
 * Template Name: EREKSHE — Команда
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('teamTitle','Руководство и междисциплинарная команда фонда'),'badge'=>erekshe_t('p_teamBannerBadge'),'icon'=>'Users','desc'=>erekshe_t('teamDesc','Логопеды, дефектологи, психологи, инструкторы АФК/ЛФК и педагоги.')]); ?>
<?php get_template_part('template-parts/section-team'); ?>
<?php get_footer();
