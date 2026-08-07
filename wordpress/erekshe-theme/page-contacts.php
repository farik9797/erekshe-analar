<?php /**
 * Template Name: EREKSHE — Контакты
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('contactTitle','Свяжитесь с нами или запишитесь на прием'),'badge'=>erekshe_t('p_contactsBannerBadge'),'icon'=>'PhoneCall','desc'=>erekshe_t('p_contactsBannerDesc')]); ?>
<?php get_template_part('template-parts/section-branches'); ?>
<?php get_template_part('template-parts/section-contact'); ?>
<?php get_footer();
