<?php /**
 * Template Name: EREKSHE — Услуги
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('servicesTitle','Комплексный спектр реабилитационных и коррекционных услуг'),'badge'=>erekshe_t('p_servicesBannerBadge'),'icon'=>'Activity','cta_action'=>'inforequest','cta_label'=>erekshe_t('f_infoBtn'),'desc'=>erekshe_t('servicesDesc','Получите информацию о программе реабилитации, услугах специалистов, расписании и динамике развития ребёнка.')]); ?>
<?php get_template_part('template-parts/section-services'); ?>
<?php get_template_part('template-parts/section-process'); ?>
<?php get_footer();
