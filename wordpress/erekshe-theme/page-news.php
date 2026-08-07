<?php /**
 * Template Name: EREKSHE — Новости
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('newsTitle','Новости, акции и полезные статьи'),'badge'=>erekshe_t('p_newsBannerBadge'),'icon'=>'Newspaper','desc'=>erekshe_t('p_newsBannerDesc')]); ?>
<?php get_template_part('template-parts/section-news'); ?>
<?php get_template_part('template-parts/section-gallery'); ?>
<?php get_footer();
