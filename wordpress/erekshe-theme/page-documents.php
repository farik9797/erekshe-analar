<?php /**
 * Template Name: EREKSHE — Документы
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('documentsTitle','Уставные документы и прозрачная отчётность'),'badge'=>erekshe_t('p_docsBannerBadge'),'icon'=>'FileText','desc'=>erekshe_t('p_docsBannerDesc')]); ?>
<?php get_template_part('template-parts/section-documents'); ?>
<?php get_template_part('template-parts/section-partners'); ?>
<?php get_footer();
