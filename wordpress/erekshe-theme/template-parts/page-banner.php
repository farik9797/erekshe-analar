<?php
/**
 * Универсальный баннер страницы.
 * Аргументы через get_template_part(..., ['title'=>, 'desc'=>, 'badge'=>, 'icon'=>, 'gradient'=>, 'cta'=>bool]).
 */
if (!defined('ABSPATH')) exit;
$a = $args ?? [];
// Приоритет: ACF-поля баннера страницы → переданные args → заголовок записи
$title    = erekshe_field('banner_title', $a['title'] ?? get_the_title());
$desc     = erekshe_field('banner_desc',  $a['desc']  ?? '');
$badge    = erekshe_field('banner_badge', $a['badge'] ?? '');
$icon     = $a['icon']     ?? 'Sparkles';
$gradient = $a['gradient'] ?? 'from-teal-800 via-emerald-800 to-slate-900';
$cta      = $a['cta']      ?? true;
?>
<div class="max-w-7xl mx-auto px-4 pt-10">
  <div class="bg-gradient-to-br <?php echo esc_attr($gradient); ?> text-white rounded-3xl p-4 md:p-12 shadow-xl relative overflow-hidden">
    <div class="relative z-10 max-w-3xl">
      <?php if ($badge): ?>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon($icon, 'w-4 h-4'); ?><?php echo esc_html($badge); ?>
        </span>
      <?php endif; ?>
      <h1 class="text-[1.4rem] sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html($title); ?></h1>
      <?php if ($desc): ?><p class="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6"><?php echo esc_html($desc); ?></p><?php endif; ?>
      <?php if ($cta): ?>
        <button type="button" data-enroll-open class="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 inline-flex items-center gap-2 cursor-pointer">
          <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('btnEnroll')); ?></span>
        </button>
      <?php endif; ?>
    </div>
  </div>
</div>
