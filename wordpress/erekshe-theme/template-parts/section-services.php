<?php if (!defined('ABSPATH')) exit;
$cats = [['all',erekshe_t('filterAll')],['correction',erekshe_t('filterCorrection')],['physical',erekshe_t('filterPhysical')],['water',erekshe_t('filterWater')],['medical',erekshe_t('filterMedical')],['social',erekshe_t('filterSocial')],['parents',erekshe_t('filterParents')]];
$services = erekshe_get_rows('services', erekshe_services());
?>
<section id="services" class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Sparkles', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('b_ServicesCatalogBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('servicesTitle', 'Комплексный спектр реабилитационных и коррекционных услуг')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('servicesDesc', 'Все занятия проводят сертифицированные специалисты.')); ?></p>
    </div>
    <div class="relative mb-8">
      <div class="flex items-center gap-2 overflow-x-auto scrollbar-none pb-2 -mx-4 px-4 sm:mx-0 sm:px-0" data-svc-filters>
        <?php foreach ($cats as $i => $c): ?>
          <button type="button" data-svc-filter="<?php echo esc_attr($c[0]); ?>" class="whitespace-nowrap flex-shrink-0 px-3.5 py-2 rounded-full text-xs sm:text-sm font-bold transition shadow-2xs <?php echo $i === 0 ? 'bg-emerald-600 text-white shadow-md shadow-emerald-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'; ?>"><?php echo esc_html($c[1]); ?></button>
        <?php endforeach; ?>
      </div>
      <!-- Подсказка: строку фильтров можно листать -->
      <div class="pointer-events-none absolute top-0 bottom-2 right-0 flex items-center gap-1 pl-10 pr-0.5 bg-gradient-to-l from-slate-50 via-slate-50/95 to-transparent">
        <?php echo erekshe_icon('ChevronRight', 'w-5 h-5 text-emerald-500 animate-pulse'); ?>
      </div>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6" data-svc-grid>
      <?php foreach ($services as $i => $s): ?>
        <div data-svc-cat="<?php echo esc_attr($s['category']); ?>" data-service-open="svc-<?php echo $i; ?>" class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl hover:border-emerald-300 transition-all flex flex-col overflow-hidden group cursor-pointer">
          <div class="relative h-32 sm:h-48 overflow-hidden bg-slate-100">
            <img src="<?php echo esc_url(erekshe_img($s['image'])); ?>" alt="<?php echo esc_attr($s['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
            <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl flex items-center gap-2 shadow-xs"><?php echo erekshe_icon($s['iconName'], 'w-6 h-6 text-emerald-600'); ?><span class="text-xs font-bold text-slate-900"><?php echo esc_html($s['targetAge']); ?></span></div>
          </div>
          <div class="p-3 sm:p-6 flex-1 flex flex-col justify-between gap-4">
            <div>
              <h3 class="text-base sm:text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors"><?php echo esc_html($s['title']); ?></h3>
              <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed line-clamp-3"><?php echo esc_html($s['shortDesc']); ?></p>
              <div class="mt-4 pt-3 border-t border-slate-100 flex flex-col gap-1.5">
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-500"><?php echo esc_html(erekshe_t('serviceIndications')); ?></p>
                <div class="flex flex-wrap gap-1.5">
                  <?php foreach (array_slice($s['indications'], 0, 3) as $ind): ?><span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 text-[11px] font-medium"><?php echo esc_html($ind); ?></span><?php endforeach; ?>
                  <?php if (count($s['indications']) > 3): ?><span class="text-[11px] font-bold text-emerald-600 py-0.5">+<?php echo count($s['indications']) - 3; ?></span><?php endif; ?>
                </div>
              </div>
            </div>
            <div class="flex items-center justify-between pt-3 border-t border-slate-100">
              <span class="flex items-center gap-1.5 text-xs font-semibold text-slate-500"><?php echo erekshe_icon('Clock', 'w-4 h-4'); ?><?php echo esc_html($s['duration']); ?></span>
              <span class="flex items-center gap-1 text-xs font-bold text-emerald-700 group-hover:text-emerald-800 transition"><?php echo esc_html(erekshe_t('svc_details')); ?> <?php echo erekshe_icon('ChevronRight', 'w-4 h-4'); ?></span>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Детальные окна услуг -->
  <?php foreach ($services as $i => $s): ?>
    <div data-modal="svc-<?php echo $i; ?>" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-start justify-center overflow-y-auto p-4 sm:p-6">
      <div class="bg-white rounded-3xl w-full max-w-2xl my-8 shadow-2xl overflow-hidden">
        <div class="relative h-40 sm:h-52 bg-slate-100">
          <img src="<?php echo esc_url(erekshe_img($s['image'])); ?>" alt="<?php echo esc_attr($s['title']); ?>" class="w-full h-full object-cover" />
          <button type="button" data-modal-close class="absolute top-3 right-3 w-9 h-9 rounded-full bg-white/90 hover:bg-white text-slate-600 flex items-center justify-center shadow transition"><?php echo erekshe_icon('X', 'w-5 h-5'); ?></button>
        </div>
        <div class="p-6 sm:p-8">
          <div class="flex items-center gap-3 mb-3">
            <div class="w-11 h-11 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0"><?php echo erekshe_icon($s['iconName'], 'w-6 h-6'); ?></div>
            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight"><?php echo esc_html($s['title']); ?></h3>
          </div>
          <div class="flex flex-wrap gap-2 mb-4">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-bold"><?php echo erekshe_icon('Clock', 'w-3.5 h-3.5 text-emerald-600'); ?><?php echo esc_html(erekshe_t('svc_duration')); ?>: <?php echo esc_html($s['duration']); ?></span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-bold"><?php echo erekshe_icon('Users', 'w-3.5 h-3.5 text-emerald-600'); ?><?php echo esc_html(erekshe_t('svc_age')); ?>: <?php echo esc_html($s['targetAge']); ?></span>
          </div>
          <p class="text-sm text-slate-600 leading-relaxed mb-6"><?php echo esc_html($s['fullDesc'] ?? $s['shortDesc']); ?></p>

          <?php if (!empty($s['indications'])): ?>
          <div class="mb-6">
            <p class="text-xs font-bold uppercase tracking-wider text-emerald-700 mb-2"><?php echo esc_html(erekshe_t('svc_indications')); ?></p>
            <div class="flex flex-wrap gap-2">
              <?php foreach ($s['indications'] as $ind): ?><span class="px-3 py-1 rounded-lg bg-emerald-50 text-emerald-900 border border-emerald-200 text-xs font-semibold"><?php echo esc_html($ind); ?></span><?php endforeach; ?>
            </div>
          </div>
          <?php endif; ?>

          <?php if (!empty($s['results'])): ?>
          <div class="mb-6">
            <p class="text-xs font-bold uppercase tracking-wider text-emerald-700 mb-2"><?php echo esc_html(erekshe_t('svc_results')); ?></p>
            <ul class="flex flex-col gap-2">
              <?php foreach ($s['results'] as $res): ?>
                <li class="flex items-start gap-2 text-sm text-slate-700"><?php echo erekshe_icon('CheckCircle', 'w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5'); ?><span><?php echo esc_html($res); ?></span></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endif; ?>

          <button type="button" data-enroll-open class="w-full py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg transition flex items-center justify-center gap-2"><?php echo erekshe_icon('Sparkles', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_t('btnEnroll')); ?></span></button>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>
