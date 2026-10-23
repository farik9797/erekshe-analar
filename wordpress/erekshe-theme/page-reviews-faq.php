<?php /**
 * Template Name: EREKSHE — Отзывы и FAQ
 * 1:1 с src/pages/FaqReviewsPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header(); $kk = erekshe_lang() === 'kk'; ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-teal-900 via-emerald-900 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon('MessageSquare', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', $kk ? 'Отбасылар тарихы' : 'Истории семей')); ?>
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', $kk ? 'Ата-аналардың пікірлері және сұрақтарға жауаптар' : 'Отзывы родителей и ответы на вопросы')); ?></h1>
        <p class="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6"><?php echo esc_html(erekshe_field('banner_desc', $kk
          ? 'Оңалтудың нақты нәтижелері және ата-аналардың жиі қойылатын сұрақтарына жауаптары.'
          : 'Реальные результаты реабилитации и ответы на частые вопросы родителей.')); ?></p>
      </div>
    </div>
  </div>
  <div class="fade-in"><?php get_template_part('template-parts/section-reviews'); ?></div>
  <div class="fade-in"><?php get_template_part('template-parts/section-faq'); ?></div>
</div>
<?php get_footer();
