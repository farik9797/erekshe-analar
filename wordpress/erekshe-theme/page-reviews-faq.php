<?php /**
 * Template Name: EREKSHE — Отзывы и FAQ
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('p_reviewsBannerTitle'),'badge'=>erekshe_t('p_reviewsBannerBadge'),'icon'=>'Quote','desc'=>erekshe_t('p_reviewsBannerDesc')]); ?>
<?php get_template_part('template-parts/section-faq'); ?>
<?php get_template_part('template-parts/section-reviews'); ?>
<?php get_footer();
