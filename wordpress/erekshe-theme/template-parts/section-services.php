<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/ServicesSection.tsx + ServiceDetailModal.tsx
// На своей странице тот же заголовок уже выводит баннер — шапку секции скрываем.
$hide_header = !empty($args['hide_header']);
$cats = [['all', 'filterAll'], ['correction', 'filterCorrection'], ['physical', 'filterPhysical'], ['water', 'filterWater'], ['medical', 'filterMedical'], ['social', 'filterSocial'], ['parents', 'filterParents']];
$services = erekshe_get_rows('services', erekshe_services());
$icon_color = ['Waves' => 'text-sky-600', 'Bath' => 'text-sky-600', 'Sparkles' => 'text-amber-600'];
$f_base = 'whitespace-nowrap flex-shrink-0 px-3.5 py-2 rounded-full text-xs sm:text-sm font-bold transition shadow-2xs cursor-pointer ';
$f_on   = 'bg-emerald-600 text-white shadow-md shadow-emerald-600/20';
$f_off  = 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200';
$close  = erekshe_lang() === 'kk' ? 'Жабу' : 'Закрыть';
?>
<section id="services" class="<?php echo $hide_header ? 'pt-8 pb-16 md:pt-10 md:pb-24' : 'py-16 md:py-24'; ?> bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <?php if (!$hide_header): ?>
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
        <?php echo erekshe_icon('Sparkles', 'w-4 h-4 text-emerald-600'); ?>
        <span><?php echo esc_html(erekshe_t('servicesBadge')); ?></span>
      </div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('servicesTitle')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('servicesDesc')); ?></p>
    </div>
    <?php endif; ?>

    <div class="relative mb-8">
      <div class="flex items-center gap-2 overflow-x-auto scrollbar-none pb-2 -mx-4 pl-4 pr-20 sm:mx-0 sm:pl-0 sm:pr-20">
        <?php foreach ($cats as $i => $c): ?>
          <button type="button" data-filter-group="svc" data-filter="<?php echo esc_attr($c[0]); ?>" data-cls-base="<?php echo esc_attr($f_base); ?>" data-cls-on="<?php echo esc_attr($f_on); ?>" data-cls-off="<?php echo esc_attr($f_off); ?>" class="<?php echo esc_attr($f_base . ($i === 0 ? $f_on : $f_off)); ?>"><?php echo esc_html(erekshe_t($c[1])); ?></button>
        <?php endforeach; ?>
      </div>
      <!-- Подсказка: строку фильтров можно листать -->
      <div class="pointer-events-none absolute top-0 bottom-2 right-0 flex items-center gap-1 pl-6 pr-0.5 bg-gradient-to-l from-slate-50 via-slate-50/95 to-transparent">
        <?php echo erekshe_icon('ChevronRight', 'w-5 h-5 text-emerald-500 animate-pulse'); ?>
      </div>
    </div>

    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach ($services as $i => $s): $ic = $s['iconName'] ?: 'Sparkles'; ?>
        <div data-filter-item="svc" data-cat="<?php echo esc_attr($s['category']); ?>" class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl hover:border-emerald-300 transition-all duration-200 flex flex-col overflow-hidden group flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div data-service-open="svc-<?php echo $i; ?>" class="relative aspect-square overflow-hidden bg-slate-100 cursor-pointer">
            <!-- Размытая подложка — фото разных пропорций, чтобы не обрезать снимок -->
            <img src="<?php echo esc_url(erekshe_img($s['image'])); ?>" alt="" aria-hidden="true" class="absolute inset-0 w-full h-full object-cover scale-110 blur-xl opacity-50" />
            <img src="<?php echo esc_url(erekshe_img($s['image'])); ?>" alt="<?php echo esc_attr($s['title']); ?>" class="absolute inset-0 w-full h-full object-contain group-hover:scale-105 transition-transform duration-300" />
            <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl flex items-center gap-2 shadow-xs">
              <?php echo erekshe_icon($ic, 'w-6 h-6 ' . ($icon_color[$ic] ?? 'text-emerald-600')); ?>
              <span class="text-xs font-bold text-slate-900"><?php echo esc_html($s['targetAge']); ?></span>
            </div>
          </div>
          <div data-service-open="svc-<?php echo $i; ?>" class="p-6 flex-1 flex flex-col justify-between gap-4 cursor-pointer">
            <div>
              <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors"><?php echo esc_html($s['title']); ?></h3>
              <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed line-clamp-3"><?php echo esc_html($s['shortDesc']); ?></p>
            </div>
            <div class="pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
              <div class="flex items-center gap-1.5 text-xs font-semibold text-slate-500">
                <?php echo erekshe_icon('Clock', 'w-3.5 h-3.5 text-emerald-600'); ?>
                <span><?php echo esc_html($s['duration']); ?></span>
              </div>
              <span class="text-xs font-bold text-emerald-600 group-hover:translate-x-1 transition-transform flex items-center gap-0.5"><?php echo esc_html(erekshe_t('btnServiceDetails')); ?> <?php echo erekshe_icon('ChevronRight', 'w-3.5 h-3.5'); ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <?php foreach ($services as $i => $s): ?>
    <div data-modal="svc-<?php echo $i; ?>" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-center justify-center p-3 sm:p-4">
      <div class="bg-white rounded-3xl max-w-2xl w-full max-h-[92vh] overflow-y-auto p-5 sm:p-4 shadow-2xl relative border border-slate-100">
        <button type="button" data-modal-close aria-label="<?php echo esc_attr($close); ?>" class="absolute top-4 right-4 z-10 p-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition cursor-pointer"><?php echo erekshe_icon('X', 'w-5 h-5'); ?></button>
        <div class="flex flex-col gap-6">
          <div class="relative h-72 sm:h-80 rounded-2xl overflow-hidden bg-slate-100">
            <!-- Размытая подложка — фото разных пропорций, снимок не обрезаем -->
            <img src="<?php echo esc_url(erekshe_img($s['image'])); ?>" alt="" aria-hidden="true" class="absolute inset-0 w-full h-full object-cover scale-110 blur-xl opacity-50" />
            <img src="<?php echo esc_url(erekshe_img($s['image'])); ?>" alt="<?php echo esc_attr($s['title']); ?>" class="absolute inset-0 w-full h-full object-contain" />
          </div>
          <div>
            <div class="flex items-center gap-2 mb-2">
              <span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold"><?php echo esc_html($s['targetAge']); ?></span>
              <span class="flex items-center gap-1 text-xs font-semibold text-slate-500"><?php echo erekshe_icon('Clock', 'w-3.5 h-3.5 text-emerald-600'); ?><span><?php echo esc_html($s['duration']); ?></span></span>
            </div>
            <h3 class="text-2xl font-extrabold text-slate-900"><?php echo esc_html($s['title']); ?></h3>
            <p class="text-sm text-slate-600 mt-2 leading-relaxed"><?php echo esc_html($s['fullDesc'] ?? $s['shortDesc']); ?></p>
          </div>
          <?php if (!empty($s['equipment'])): ?>
          <div>
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2"><?php echo esc_html(erekshe_t('svcModalEquipment')); ?></h4>
            <p class="text-xs text-slate-700 bg-slate-50 p-3 rounded-xl border border-slate-100"><?php echo esc_html($s['equipment']); ?></p>
          </div>
          <?php endif; ?>
          <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
            <button type="button" data-modal-close class="px-4 py-2.5 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs hover:bg-slate-200 transition"><?php echo esc_html(erekshe_t('btnClose')); ?></button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>
