<?php /**
 * Template Name: EREKSHE — О фонде
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('p_aboutBannerTitle'),'badge'=>erekshe_t('p_aboutBannerBadge'),'icon'=>'Award','desc'=>erekshe_t('p_aboutBannerDesc')]); ?>
<?php get_template_part('template-parts/section-about'); ?>
<?php get_template_part('template-parts/section-documents'); ?>
<?php get_template_part('template-parts/section-partners'); ?>
<?php get_footer();
