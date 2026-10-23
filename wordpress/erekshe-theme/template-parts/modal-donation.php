<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/DonationModal.tsx
$kk = erekshe_lang() === 'kk';
$copy_cls = 'p-1 rounded bg-white hover:bg-slate-200 text-slate-600 border border-slate-200 cursor-pointer';
?>
<div data-modal="donation" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-center justify-center p-3 sm:p-4 animate-fadeIn">
  <div class="bg-white rounded-3xl max-w-xl w-full max-h-[92vh] overflow-y-auto p-5 sm:p-4 shadow-2xl relative border border-slate-100">
    <button type="button" data-modal-close aria-label="<?php echo esc_attr($kk ? 'Жабу' : 'Закрыть'); ?>" class="absolute top-4 right-4 z-10 p-2 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition cursor-pointer"><?php echo erekshe_icon('X', 'w-5 h-5'); ?></button>
    <div class="flex flex-col gap-6">
      <div>
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-100 text-amber-900 text-[11px] font-bold mb-2">
          <?php echo erekshe_icon('HeartHandshake', 'w-3.5 h-3.5 text-amber-600'); ?>
          <span><?php echo esc_html(erekshe_t('charityBadge')); ?></span>
        </div>
        <h3 class="text-xl sm:text-2xl font-extrabold text-slate-900"><?php echo esc_html(erekshe_t('donationTitle')); ?></h3>
        <p class="text-xs text-slate-500 mt-1"><?php echo esc_html(erekshe_t('donationSubtitle')); ?></p>
      </div>

      <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 flex flex-col gap-3 text-xs">
        <p class="font-bold text-slate-900 uppercase tracking-wider"><?php echo esc_html(erekshe_t('donationBankTitle')); ?></p>
        <div class="flex items-center justify-between py-1.5 border-b border-slate-200">
          <span class="text-slate-500 font-medium"><?php echo esc_html(erekshe_t('donationOrg')); ?></span>
          <span class="font-bold text-slate-900"><?php echo esc_html(erekshe_t('donationOrgName')); ?></span>
        </div>
        <div class="flex items-center justify-between py-1.5 border-b border-slate-200">
          <span class="text-slate-500 font-medium"><?php echo esc_html($kk ? 'БСН:' : 'БИН:'); ?></span>
          <div class="flex items-center gap-2">
            <span class="font-bold text-slate-900">201140026437</span>
            <button type="button" data-copy="201140026437" aria-label="<?php echo esc_attr($kk ? 'БСН көшіру' : 'Копировать БИН'); ?>" class="<?php echo esc_attr($copy_cls); ?>"><span data-copy-icon><?php echo erekshe_icon('Copy', 'w-3.5 h-3.5'); ?></span><span data-copy-done class="hidden"><?php echo erekshe_icon('Check', 'w-3.5 h-3.5 text-emerald-600'); ?></span></button>
          </div>
        </div>
        <div class="flex items-center justify-between py-1.5 border-b border-slate-200">
          <span class="text-slate-500 font-medium"><?php echo esc_html($kk ? 'ЖСК (KZT):' : 'ИИК (KZT):'); ?></span>
          <div class="flex items-center gap-2">
            <span class="font-bold text-slate-900 font-mono text-[11px]">KZ918562203127814849</span>
            <button type="button" data-copy="KZ918562203127814849" aria-label="<?php echo esc_attr($kk ? 'ЖСК көшіру' : 'Копировать ИИК'); ?>" class="<?php echo esc_attr($copy_cls); ?>"><span data-copy-icon><?php echo erekshe_icon('Copy', 'w-3.5 h-3.5'); ?></span><span data-copy-done class="hidden"><?php echo erekshe_icon('Check', 'w-3.5 h-3.5 text-emerald-600'); ?></span></button>
          </div>
        </div>
        <div class="flex items-center justify-between py-1.5 border-b border-slate-200">
          <span class="text-slate-500 font-medium">Банк:</span>
          <span class="font-bold text-slate-900"><?php echo esc_html(erekshe_t('donationBankName')); ?></span>
        </div>
        <div class="flex items-center justify-between py-1.5 border-b border-slate-200">
          <span class="text-slate-500 font-medium"><?php echo esc_html($kk ? 'БСК:' : 'БИК:'); ?></span>
          <span class="font-bold text-slate-900 font-mono text-[11px]">KCJBKZKX</span>
        </div>
        <div class="flex items-center justify-between py-1.5">
          <span class="text-slate-500 font-medium"><?php echo esc_html($kk ? 'Кбе:' : 'КБЕ:'); ?></span>
          <span class="font-bold text-slate-900"><?php echo esc_html(erekshe_t('donationKbe')); ?></span>
        </div>
      </div>

      <button type="button" data-modal-close class="w-full py-3 rounded-xl bg-slate-100 text-slate-700 font-bold text-xs hover:bg-slate-200 transition"><?php echo esc_html(erekshe_t('btnClose')); ?></button>
    </div>
  </div>
</div>
