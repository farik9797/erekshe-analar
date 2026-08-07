<?php if (!defined('ABSPATH')) exit; ?>
<div data-a11y-bar class="hidden bg-emerald-900 text-white px-4 py-3 border-b-2 border-emerald-500 shadow-md text-sm font-medium z-50 sticky top-0">
  <div class="max-w-7xl mx-auto flex flex-wrap md:flex-nowrap items-center justify-start md:justify-between gap-x-4 gap-y-3 md:overflow-x-auto">
    <div class="flex shrink-0 items-center gap-2 text-emerald-200">
      <?php echo erekshe_icon('Eye', 'w-5 h-5 text-emerald-400'); ?>
      <span class="font-bold text-base whitespace-nowrap"><?php echo esc_html(erekshe_t('accessibilityTitle')); ?></span>
    </div>

    <!-- Размер шрифта -->
    <div class="flex shrink-0 items-center gap-2">
      <span class="text-emerald-300 text-xs uppercase tracking-wider whitespace-nowrap"><?php echo esc_html(erekshe_t('fontSizeLabel')); ?></span>
      <div class="flex items-center bg-emerald-800 rounded-lg p-1 border border-emerald-700">
        <button type="button" data-font="dec" aria-label="<?php echo esc_attr(erekshe_t('d_fontDecreaseLabel')); ?>" class="px-2.5 py-1 rounded font-bold leading-none text-emerald-100 transition hover:bg-emerald-600 hover:text-white"><span class="text-xs">A</span>&#8722;</button>
        <span data-font-label class="px-2 text-xs tabular-nums text-center text-emerald-100 min-w-[3rem]">100%</span>
        <button type="button" data-font="inc" aria-label="<?php echo esc_attr(erekshe_t('d_fontIncreaseLabel')); ?>" class="px-2.5 py-1 rounded font-bold leading-none text-emerald-100 transition hover:bg-emerald-600 hover:text-white"><span class="text-base">A</span>+</button>
      </div>
    </div>

    <!-- Цветовая схема -->
    <div class="flex w-full md:w-auto md:shrink-0 items-center gap-2">
      <span class="text-emerald-300 text-xs uppercase tracking-wider whitespace-nowrap"><?php echo esc_html(erekshe_t('contrastLabel')); ?></span>
      <div class="flex flex-wrap md:flex-nowrap gap-1.5 md:shrink-0">
        <button type="button" data-contrast="normal" class="px-2.5 py-1 rounded text-xs border whitespace-nowrap bg-white text-emerald-950 font-bold border-white"><?php echo esc_html(erekshe_t('d_contrastNormalShort')); ?></button>
        <button type="button" data-contrast="contrast-dark" class="px-2.5 py-1 rounded text-xs border whitespace-nowrap bg-black text-white border-emerald-700"><?php echo esc_html(erekshe_t('d_contrastDarkShort')); ?></button>
        <button type="button" data-contrast="contrast-yellow" class="px-2.5 py-1 rounded text-xs border whitespace-nowrap bg-black text-yellow-400 border-emerald-700"><?php echo esc_html(erekshe_t('d_contrastYellowShort')); ?></button>
        <button type="button" data-contrast="contrast-blue" class="px-2.5 py-1 rounded text-xs border whitespace-nowrap bg-sky-900 text-sky-200 border-emerald-700"><?php echo esc_html(erekshe_t('d_contrastBlueShort')); ?></button>
      </div>
    </div>

    <!-- Скрыть изображения + закрыть -->
    <div class="flex shrink-0 items-center gap-3">
      <button type="button" data-hide-images class="flex items-center gap-1.5 px-3 py-1 rounded text-xs transition border whitespace-nowrap bg-emerald-800 text-emerald-200 border-emerald-700">
        <?php echo erekshe_icon('Image', 'w-4 h-4'); ?><?php echo esc_html(erekshe_t('hideImagesLabel')); ?>
      </button>
      <button type="button" data-a11y-close class="p-1 rounded-full bg-emerald-800 text-emerald-200 hover:text-white hover:bg-emerald-700 transition ml-2" title="<?php echo esc_attr(erekshe_t('d_closeA11yPanel')); ?>">
        <?php echo erekshe_icon('X', 'w-5 h-5'); ?>
      </button>
    </div>
  </div>
</div>
