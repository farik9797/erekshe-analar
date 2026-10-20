<?php /**
 * Template Name: EREKSHE — Контакты
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['cta'=>false,'title'=>erekshe_t('p_contactsBannerTitle','Свяжитесь с нами'),'badge'=>erekshe_t('p_contactsBannerBadge'),'icon'=>'PhoneCall','desc'=>erekshe_t('p_contactsBannerDesc')]); ?>
<?php get_template_part('template-parts/section-branches'); ?>
<?php get_template_part('template-parts/section-contact'); ?>
<?php get_footer();
