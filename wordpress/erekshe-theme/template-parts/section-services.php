<?php if (!defined('ABSPATH')) exit;
$cats = [['all',erekshe_t('filterAll')],['correction',erekshe_t('filterCorrection')],['physical',erekshe_t('filterPhysical')],['water',erekshe_t('filterWater')],['social',erekshe_t('filterSocial')],['parents',erekshe_t('filterParents')]];
?>
<section id="services" class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Sparkles', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('b_ServicesCatalogBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('servicesTitle', 'Комплексный спектр реабилитационных и коррекционных услуг')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('servicesDesc', 'Все занятия проводят сертифицированные специалисты.')); ?></p>
    </div>
    <div class="flex flex-wrap items-center justify-center gap-2 mb-10" data-svc-filters>
      <?php foreach ($cats as $i => $c): ?>
        <button type="button" data-svc-filter="<?php echo esc_attr($c[0]); ?>" class="w-[calc(50%-0.25rem)] sm:w-auto px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition shadow-2xs <?php echo $i === 0 ? 'bg-emerald-600 text-white shadow-md shadow-emerald-600/20' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'; ?>"><?php echo esc_html($c[1]); ?></button>
      <?php endforeach; ?>
    </div>
    <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-6" data-svc-grid>
      <?php foreach (erekshe_get_rows('services', erekshe_services()) as $s): ?>
        <div data-svc-cat="<?php echo esc_attr($s['category']); ?>" class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl hover:border-emerald-300 transition-all flex flex-col overflow-hidden group">
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
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
