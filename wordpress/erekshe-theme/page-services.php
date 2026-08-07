<?php /**
 * Template Name: EREKSHE — Услуги
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('servicesTitle','Комплексный спектр реабилитационных и коррекционных услуг'),'badge'=>erekshe_t('p_servicesBannerBadge'),'icon'=>'Activity','desc'=>erekshe_t('servicesDesc','Все занятия проводят сертифицированные специалисты.')]); ?>
<?php get_template_part('template-parts/section-services'); ?>
<?php get_template_part('template-parts/section-process'); ?>
<?php get_footer();
