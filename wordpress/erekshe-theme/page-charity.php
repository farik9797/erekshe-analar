<?php /**
 * Template Name: EREKSHE — Благотворительность
 * 1:1 с src/pages/CharityPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-emerald-900 via-teal-900 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon('HeartHandshake', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', erekshe_t('charityBadge'))); ?>
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', erekshe_t('charityTitle'))); ?></h1>
        <p class="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6"><?php echo esc_html(erekshe_field('banner_desc', erekshe_t('charityDesc'))); ?></p>
        <button type="button" data-donation-open class="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer">
          <?php echo erekshe_icon('Heart', 'w-4 h-4 fill-slate-950'); ?><span><?php echo esc_html(erekshe_t('btnSupport')); ?></span>
        </button>
      </div>
    </div>
  </div>
  <div class="fade-in"><?php get_template_part('template-parts/section-charity', null, ['hide_header' => true]); ?></div>
  <div class="fade-in"><?php get_template_part('template-parts/section-documents'); ?></div>
</div>
<?php get_footer();
