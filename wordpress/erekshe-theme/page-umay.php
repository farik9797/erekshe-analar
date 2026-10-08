<?php /**
 * Template Name: EREKSHE — Центр UMAY
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('p_umayBannerTitle'),'badge'=>erekshe_t('p_umayBannerBadge'),'icon'=>'Heart','gradient'=>'from-rose-900 via-teal-900 to-slate-900','cta_action'=>'umay','cta_label'=>erekshe_t('umayEnrollBtn','Записаться в Центр UMAY'),'desc'=>erekshe_t('p_umayBannerDesc')]); ?>
<?php get_template_part('template-parts/section-umay'); ?>
<?php get_footer();
