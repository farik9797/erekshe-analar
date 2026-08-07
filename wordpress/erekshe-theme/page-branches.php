<?php /**
 * Template Name: EREKSHE — Филиалы
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['title'=>erekshe_t('branchesTitle','4 современных филиала для удобства семей'),'badge'=>erekshe_t('p_branchesBannerBadge'),'icon'=>'MapPin','desc'=>erekshe_t('branchesDesc','Все филиалы оборудованы с учётом требований доступной среды.')]); ?>
<?php get_template_part('template-parts/section-branches'); ?>
<?php get_footer();
