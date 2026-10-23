<?php
/**
 * Template Name: Главная
 * front-page.php — главная страница EREKSHE ANALAR
 */
if (!defined('ABSPATH')) exit;
get_header();

$hero_img = erekshe_field('hero_image', erekshe_img('regenerated_image_1785993681411.webp'));
?>
<div class="space-y-0 overflow-hidden">

<!-- ==================== HERO (1:1 с Hero.tsx) ==================== -->
<section class="relative overflow-hidden bg-gradient-to-b from-emerald-50/70 via-white to-slate-50 py-5 md:py-20 border-b border-slate-100">
  <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-200/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute bottom-0 left-0 w-80 h-80 bg-teal-200/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-[15px] sm:px-4 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      <div class="lg:col-span-7 flex flex-col gap-6 text-center lg:text-left">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100/90 text-emerald-900 border border-emerald-200 text-xs font-bold w-fit mx-auto lg:mx-0">
          <?php echo erekshe_icon('ShieldCheck', 'w-4 h-4 text-emerald-600'); ?>
          <span><?php echo esc_html(erekshe_field('hero_badge', erekshe_t('heroBadge'))); ?></span>
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
        </div>
        <h1 class="text-[1.9rem] sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight tracking-tight">
          <?php echo esc_html(erekshe_field('hero_title', erekshe_t('heroTitle'))); ?>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 font-normal leading-relaxed">
          <?php echo esc_html(erekshe_field('hero_desc', erekshe_t('heroDescription'))); ?>
        </p>
        <div class="flex flex-col items-center sm:flex-row sm:flex-wrap sm:items-center gap-3.5 pt-2">
          <button type="button" data-consult-open class="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-6 py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg shadow-emerald-600/25 transition cursor-pointer">
            <?php echo erekshe_icon('Sparkles', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_lang() === 'kk' ? 'Орталық бойынша кеңес' : 'Консультация по центру'); ?></span>
          </button>
          <a href="#branches" class="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-5 py-3.5 rounded-xl text-sm font-bold text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 transition shadow-xs">
            <?php echo erekshe_icon('MapPin', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('heroCtaBranches')); ?></span>
          </a>
          <a href="#umay" class="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-5 py-3.5 rounded-xl text-sm font-bold text-amber-900 bg-amber-50 hover:bg-amber-100/80 border border-amber-200 transition">
            <?php echo erekshe_icon('Heart', 'w-4 h-4 text-amber-600 fill-amber-500'); ?><span><?php echo esc_html(erekshe_t('heroCtaUmay')); ?></span>
          </a>
        </div>
      </div>
      <div class="lg:col-span-5 relative">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100">
          <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr(erekshe_t('heroImgAlt')); ?>" class="w-full h-[260px] sm:h-[360px] md:h-[420px] object-cover" />
          <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md rounded-2xl p-4 shadow-lg border border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold"><?php echo erekshe_icon('Award', 'w-5 h-5'); ?></div>
              <div><p class="text-xs font-bold text-slate-900"><?php echo esc_html(erekshe_t('astanaCity')); ?></p><p class="text-[11px] text-slate-500 font-medium"><?php echo esc_html(erekshe_t('heroBranchesSocial')); ?></p></div>
            </div>
            <a href="#branches" class="p-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 transition"><?php echo erekshe_icon('ArrowRight', 'w-4 h-4'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 1:1 с src/pages/HomePage.tsx: те же секции, что на внутренних страницах -->
<div class="fade-in"><?php get_template_part('template-parts/section-about'); ?></div>
<div class="fade-in"><?php get_template_part('template-parts/section-services'); ?></div>
<div class="fade-in"><?php get_template_part('template-parts/section-process'); ?></div>
<div class="fade-in"><?php get_template_part('template-parts/section-branches'); ?></div>
<div class="fade-in"><?php get_template_part('template-parts/section-team', null, ['with_heading' => true]); ?></div>
<div class="fade-in"><?php get_template_part('template-parts/section-charity'); ?></div>
<div class="fade-in"><?php get_template_part('template-parts/section-news'); ?></div>
<div class="fade-in"><?php get_template_part('template-parts/section-reviews'); ?></div>
<div class="fade-in"><?php get_template_part('template-parts/section-faq'); ?></div>
<div class="fade-in"></div>
<div class="fade-in"><?php get_template_part('template-parts/section-contact'); ?></div>
</div>

<?php get_footer(); ?>
