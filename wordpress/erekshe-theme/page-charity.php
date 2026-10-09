<?php /**
 * Template Name: EREKSHE — Благотворительность
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<?php get_template_part('template-parts/page-banner', null, ['cta'=>false,'title'=>erekshe_t('charityTitle','Социальные проекты и инициативы фонда'),'badge'=>erekshe_t('p_charityBannerBadge'),'icon'=>'ShieldCheck','desc'=>erekshe_t('p_charityBannerDesc')]); ?>
<?php get_template_part('template-parts/section-charity', null, ['hide_header' => true]); ?>
<?php get_template_part('template-parts/section-documents'); ?>
<?php get_footer();
