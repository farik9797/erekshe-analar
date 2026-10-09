<?php /**
 * Template Name: EREKSHE — Филиалы
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['cta_action'=>'wa-list','cta_label'=>erekshe_t('btnEnroll'),'title'=>erekshe_t('branchesTitle','3 современных филиала для удобства семей'),'badge'=>erekshe_t('p_branchesBannerBadge'),'icon'=>'MapPin','desc'=>erekshe_t('branchesDesc','Все филиалы оборудованы с учётом требований доступной среды.')]); ?>
<?php get_template_part('template-parts/section-branches', null, ['hide_header' => true]); ?>
<?php get_footer();
