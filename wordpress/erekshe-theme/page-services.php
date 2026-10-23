<?php /**
 * Template Name: EREKSHE — Услуги
 * 1:1 с src/pages/ServicesPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header(); $kk = erekshe_lang() === 'kk'; ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-br from-teal-800 via-emerald-800 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl relative overflow-hidden">
        <div class="relative z-10 max-w-3xl">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
            <?php echo erekshe_icon('Activity', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', $kk ? 'Сауықтыру және түзету қызметтерінің каталогы' : 'Каталог оздоровительных и коррекционных услуг')); ?>
          </span>
          <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', erekshe_t('servicesTitle'))); ?></h1>
          <p class="text-slate-200 text-base md:text-lg leading-relaxed mb-6"><?php echo esc_html(erekshe_field('banner_desc', erekshe_t('servicesDesc'))); ?></p>
          <button type="button" data-inforequest-open class="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer">
            <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html($kk ? 'Қызметтер туралы білу' : 'Узнать об услугах'); ?></span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="fade-in"><?php get_template_part('template-parts/section-services', null, ['hide_header' => true]); ?></div>
  <div class="fade-in"><?php get_template_part('template-parts/section-process'); ?></div>
</div>
<?php get_footer();
