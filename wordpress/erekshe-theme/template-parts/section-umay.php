<?php
if (!defined('ABSPATH')) exit;
$fallback = [
  ['Heart',erekshe_t('b_UmayDir1Title'),erekshe_t('b_UmayDir1Text')],
  ['Sparkles',erekshe_t('b_UmayDir2Title'),erekshe_t('b_UmayDir2Text')],
  ['Users',erekshe_t('b_UmayDir3Title'),erekshe_t('b_UmayDir3Text')],
  ['Shield',erekshe_t('b_UmayDir4Title'),erekshe_t('b_UmayDir4Text')],
  ['BookOpen',erekshe_t('b_UmayDir5Title'),erekshe_t('b_UmayDir5Text')],
  ['MessageSquare',erekshe_t('b_UmayDir6Title'),erekshe_t('b_UmayDir6Text')],
];
$acf = erekshe_get_rows('directions', []);
$dirs = $acf ? array_map(function($d){ return [$d['icon'] ?: 'Heart', $d['title'], $d['text']]; }, $acf) : $fallback;
?>
<section class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-2xl mx-auto mb-10">
      <h2 class="text-[1.2rem] sm:text-3xl font-extrabold text-slate-900 mb-3"><?php echo esc_html(erekshe_t('b_UmayDirectionsTitle')); ?></h2>
      <p class="text-slate-600 text-sm"><?php echo esc_html(erekshe_t('b_UmayDirectionsDesc')); ?></p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <?php foreach ($dirs as $d): ?>
        <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition">
          <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center mb-4"><?php echo erekshe_icon($d[0], 'w-5 h-5'); ?></div>
          <h3 class="font-bold text-slate-900 text-lg mb-2"><?php echo esc_html($d[1]); ?></h3>
          <p class="text-xs text-slate-600 leading-relaxed"><?php echo esc_html($d[2]); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
