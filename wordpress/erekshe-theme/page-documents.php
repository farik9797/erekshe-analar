<?php /**
 * Template Name: EREKSHE — Документы
 * 1:1 с src/pages/DocumentsPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-slate-900 via-emerald-950 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon('ShieldCheck', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', erekshe_t('documentsBadge'))); ?>
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', erekshe_t('documentsTitle'))); ?></h1>
        <p class="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl"><?php echo esc_html(erekshe_field('banner_desc', erekshe_t('documentsDesc'))); ?></p>
      </div>
    </div>
  </div>
  <div class="fade-in"><?php get_template_part('template-parts/section-documents', null, ['hide_header' => true]); ?></div>
  <div class="fade-in"></div>
</div>
<?php get_footer();
