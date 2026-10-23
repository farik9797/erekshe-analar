<?php
if (!defined('ABSPATH')) exit;
// 1:1 с src/components/BranchesSection.tsx
// На своей странице тот же заголовок уже выводит баннер — шапку секции скрываем.
$hide_header = !empty($args['hide_header']);
$branches = erekshe_get_rows('branches', erekshe_branches());
// нормализуем: у ACF-строк нет id, features могут прийти строкой (features_text)
foreach ($branches as $i => &$_b) {
    if (empty($_b['id'])) $_b['id'] = 'br' . $i;
    if (empty($_b['features']) || !is_array($_b['features'])) {
        $_b['features'] = !empty($_b['features_text']) ? array_filter(array_map('trim', explode(',', $_b['features_text']))) : [];
    }
}
unset($_b);
$ru_branches = (erekshe_lang() === 'ru') ? $branches : null; // адрес для Google Maps — всегда русский, как в React
if ($ru_branches === null) { $GLOBALS['__erekshe_lang_override'] = 'ru'; $ru_branches = erekshe_branches(); unset($GLOBALS['__erekshe_lang_override']); }
$tab_base = 'flex-shrink-0 w-full sm:w-auto sm:max-w-none snap-center sm:snap-none p-4 rounded-2xl text-center sm:text-left transition border shadow-2xs flex flex-col justify-center sm:justify-between items-center sm:items-start cursor-pointer ';
$tab_on   = 'bg-emerald-700 text-white border-emerald-600 shadow-md shadow-emerald-700/20';
$tab_off  = 'bg-white text-slate-800 hover:bg-slate-100 border-slate-200';
$hq_base  = 'text-[10px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full mb-2 inline-block ';
$addr_base = 'text-[11px] font-medium mt-3 flex items-center gap-1 ';
?>
<section id="branches" class="<?php echo $hide_header ? 'pt-8 pb-16 md:pt-10 md:pb-24' : 'py-16 md:py-24'; ?> bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <?php if (!$hide_header): ?>
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
        <?php echo erekshe_icon('Building2', 'w-4 h-4 text-emerald-600'); ?>
        <span><?php echo esc_html(erekshe_t('branchesBadge')); ?></span>
      </div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('branchesTitle')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('branchesSubtitle')); ?></p>
    </div>
    <?php endif; ?>

    <div class="flex overflow-x-auto snap-x snap-mandatory gap-3 pb-3 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-4 sm:overflow-visible sm:pb-0 scrollbar-none mb-8">
      <?php foreach ($branches as $i => $b): $on = $i === 0; ?>
        <button type="button" data-branch-btn="<?php echo esc_attr($b['id']); ?>" data-cls-base="<?php echo esc_attr($tab_base); ?>" data-cls-on="<?php echo esc_attr($tab_on); ?>" data-cls-off="<?php echo esc_attr($tab_off); ?>" class="<?php echo esc_attr($tab_base . ($on ? $tab_on : $tab_off)); ?>">
          <div>
            <?php if (!empty($b['isHeadquarters'])): ?>
              <span data-cls-base="<?php echo esc_attr($hq_base); ?>" data-cls-on="bg-emerald-500 text-white" data-cls-off="bg-emerald-100 text-emerald-800" class="<?php echo esc_attr($hq_base . ($on ? 'bg-emerald-500 text-white' : 'bg-emerald-100 text-emerald-800')); ?>"><?php echo esc_html(erekshe_t('headquartersTag')); ?></span>
            <?php endif; ?>
            <p class="font-bold text-xs sm:text-sm leading-tight"><?php echo esc_html($b['name']); ?></p>
          </div>
          <p data-cls-base="<?php echo esc_attr($addr_base); ?>" data-cls-on="text-emerald-100" data-cls-off="text-slate-500" class="<?php echo esc_attr($addr_base . ($on ? 'text-emerald-100' : 'text-slate-500')); ?>">
            <?php echo erekshe_icon('MapPin', 'w-3 h-3 flex-shrink-0'); ?>
            <span class="truncate"><?php echo esc_html($b['address']); ?></span>
          </p>
        </button>
      <?php endforeach; ?>
    </div>

    <?php foreach ($branches as $i => $b):
      $route = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($ru_branches[$i]['address'] ?? $b['address']);
      $info = [
        ['MapPin', erekshe_t('branchAddressLabel'), $b['address'], ''],
        ['Clock', erekshe_t('branchHoursLabel'), $b['workHours'], ''],
        ['Phone', $b['methodistName'], $b['methodistPhone'], 'wa'],
        ['MessageCircle', $b['contactName'], $b['whatsapp'], 'wa'],
      ]; ?>
      <div data-branch-detail="<?php echo esc_attr($b['id']); ?>" class="<?php echo $i === 0 ? '' : 'hidden '; ?>bg-white rounded-3xl border border-slate-200 p-6 md:p-4 shadow-xl grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
        <div class="lg:col-span-7 flex flex-col gap-6">
          <div>
            <div class="flex items-center gap-2 mb-2">
              <?php if (!empty($b['isHeadquarters'])): ?><span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold"><?php echo esc_html(erekshe_t('headquartersTag')); ?></span><?php endif; ?>
              <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold"><?php echo esc_html($b['district']); ?></span>
            </div>
            <h3 class="text-[1.4rem] sm:text-3xl font-extrabold text-slate-900"><?php echo esc_html($b['name']); ?></h3>
          </div>

          <div class="grid grid-cols-2 gap-3 sm:gap-4">
            <?php foreach ($info as $c): ?>
              <div class="flex items-start gap-2 sm:gap-3 bg-slate-50 py-5 px-2.5 rounded-2xl border border-slate-100">
                <?php echo erekshe_icon($c[0], 'w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5'); ?>
                <div>
                  <p class="text-xs font-bold text-slate-500 uppercase tracking-wider"><?php echo esc_html($c[1]); ?></p>
                  <?php if ($c[3] === 'wa'): ?>
                    <a href="https://wa.me/<?php echo esc_attr(preg_replace('/\D/', '', $c[2])); ?>" target="_blank" rel="noopener noreferrer" class="text-xs sm:text-sm font-bold text-emerald-700 hover:underline mt-0.5 block"><?php echo esc_html($c[2]); ?></a>
                  <?php else: ?>
                    <p class="text-xs sm:text-sm font-bold text-slate-900 mt-0.5"><?php echo esc_html($c[2]); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div>
            <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2"><?php echo esc_html(erekshe_t('branchEquipmentLabel')); ?></p>
            <div class="flex flex-wrap gap-2">
              <?php foreach ($b['features'] as $f): ?>
                <span class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-900 border border-emerald-200 text-xs font-bold">
                  <?php echo erekshe_icon('CheckCircle2', 'w-3.5 h-3.5 text-emerald-600'); ?>
                  <span><?php echo esc_html($f); ?></span>
                </span>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="flex flex-wrap items-center gap-3 pt-2">
            <button type="button" data-consult-open="<?php echo esc_attr($b['name']); ?>" class="flex items-center gap-2 px-5 py-3 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition shadow-md shadow-emerald-600/20 cursor-pointer">
              <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?>
              <span><?php echo esc_html(erekshe_t('branchEnroll')); ?></span>
            </button>
            <a href="<?php echo esc_url($route); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2 px-4 py-3 rounded-xl text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 transition border border-slate-200">
              <?php echo erekshe_icon('Navigation', 'w-4 h-4 text-emerald-600'); ?>
              <span><?php echo esc_html(erekshe_t('btnBranchRoute')); ?></span>
              <?php echo erekshe_icon('ExternalLink', 'w-3 h-3 text-slate-400'); ?>
            </a>
          </div>
        </div>

        <div class="lg:col-span-5">
          <div class="relative rounded-2xl overflow-hidden border border-slate-200 shadow-md bg-slate-100">
            <div class="relative w-full aspect-[3/4]">
              <!-- Размытая подложка — фото филиалов разных пропорций, снимок не обрезаем -->
              <img src="<?php echo esc_url(erekshe_img($b['image'])); ?>" alt="" aria-hidden="true" class="absolute inset-0 w-full h-full object-cover scale-110 blur-xl opacity-50" />
              <img src="<?php echo esc_url(erekshe_img($b['image'])); ?>" alt="<?php echo esc_attr($b['name']); ?>" class="absolute inset-0 w-full h-full object-contain" />
            </div>
            <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md p-3.5 rounded-xl border border-slate-100 shadow-sm flex items-center justify-between">
              <div class="flex items-center gap-2.5">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold text-xs"><?php echo erekshe_icon('MapPin', 'w-4 h-4'); ?></div>
                <div class="text-left">
                  <p class="text-xs font-bold text-slate-900"><?php echo esc_html($b['address']); ?></p>
                  <p class="text-[10px] text-slate-500"><?php echo esc_html(erekshe_t('astanaCity')); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
