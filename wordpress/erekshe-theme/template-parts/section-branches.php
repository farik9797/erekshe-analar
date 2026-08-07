<?php
if (!defined('ABSPATH')) exit;
$branches = erekshe_get_rows('branches', erekshe_branches());
// нормализуем: у ACF-строк нет id, features могут прийти строкой (features_text)
foreach ($branches as $i => &$_b) {
    if (empty($_b['id'])) $_b['id'] = 'br' . $i;
    if (empty($_b['features']) || !is_array($_b['features'])) {
        $_b['features'] = !empty($_b['features_text']) ? array_filter(array_map('trim', explode(',', $_b['features_text']))) : [];
    }
}
unset($_b);
?>
<section id="branches" class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('MapPin', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('b_BranchesNetworkBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('branchesTitle', '4 современных филиала для удобства семей')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('branchesDesc', 'Все филиалы оборудованы с учётом требований доступной среды и безопасности.')); ?></p>
    </div>

    <!-- Селектор -->
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-3 pb-3 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-4 sm:overflow-visible sm:pb-0 scrollbar-none mb-8">
      <?php foreach ($branches as $i => $b): ?>
        <button type="button" data-branch-btn="<?php echo esc_attr($b['id']); ?>" class="flex-shrink-0 w-full sm:w-auto snap-center sm:snap-none p-4 rounded-2xl text-center sm:text-left transition border shadow-2xs flex flex-col justify-center sm:justify-between items-center sm:items-start <?php echo $i === 0 ? 'bg-emerald-700 text-white border-emerald-600 shadow-md' : 'bg-white text-slate-800 hover:bg-slate-100 border-slate-200'; ?>">
          <div>
            <?php if (!empty($b['isHeadquarters'])): ?><span class="text-[10px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full mb-2 inline-block <?php echo $i === 0 ? 'bg-emerald-500 text-white' : 'bg-emerald-100 text-emerald-800'; ?>"><?php echo esc_html(erekshe_t('headquartersTag')); ?></span><?php endif; ?>
            <p class="font-bold text-xs sm:text-sm leading-tight"><?php echo esc_html($b['name']); ?></p>
          </div>
          <p class="text-[11px] font-medium mt-3 flex items-center gap-1 <?php echo $i === 0 ? 'text-emerald-100' : 'text-slate-500'; ?>"><?php echo erekshe_icon('MapPin', 'w-3 h-3 flex-shrink-0'); ?><span class="truncate"><?php echo esc_html($b['address']); ?></span></p>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Детали активного филиала -->
    <?php foreach ($branches as $i => $b): ?>
      <div data-branch-detail="<?php echo esc_attr($b['id']); ?>" class="<?php echo $i === 0 ? '' : 'hidden'; ?> bg-white rounded-3xl border border-slate-200 p-4 md:p-8 shadow-xl">
        <div class="flex items-center gap-2 mb-2">
          <?php if (!empty($b['isHeadquarters'])): ?><span class="px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold"><?php echo esc_html(erekshe_t('headquartersTag')); ?></span><?php endif; ?>
          <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-xs font-semibold"><?php echo esc_html($b['district']); ?></span>
        </div>
        <h3 class="text-[1.4rem] sm:text-3xl font-extrabold text-slate-900 mb-6"><?php echo esc_html($b['name']); ?></h3>
        <div class="grid grid-cols-2 gap-3 sm:gap-4 mb-6">
          <?php
          $info = [['MapPin',erekshe_t('branchAddressLabel'),$b['address']],['Clock',erekshe_t('branchHoursLabel'),$b['workHours']],['Phone',erekshe_t('branchPhoneLabel'),$b['phone']],['MessageCircle',erekshe_t('b_BranchWhatsappLabel'),$b['whatsapp']]];
          foreach ($info as $c): ?>
            <div class="flex items-start gap-2 sm:gap-3 bg-slate-50 py-5 px-2.5 rounded-2xl border border-slate-100"><?php echo erekshe_icon($c[0], 'w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5'); ?><div><p class="text-xs font-bold text-slate-500 uppercase tracking-wider"><?php echo esc_html($c[1]); ?></p><p class="text-xs sm:text-sm font-bold text-slate-900 mt-0.5"><?php echo esc_html($c[2]); ?></p></div></div>
          <?php endforeach; ?>
        </div>
        <div>
          <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-2"><?php echo esc_html(erekshe_t('branchEquipmentLabel')); ?></p>
          <div class="flex flex-wrap gap-2">
            <?php foreach ($b['features'] as $f): ?><span class="flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-emerald-50 text-emerald-900 border border-emerald-200 text-xs font-bold"><?php echo erekshe_icon('CheckCircle', 'w-3.5 h-3.5 text-emerald-600'); ?><?php echo esc_html($f); ?></span><?php endforeach; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
