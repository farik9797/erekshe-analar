<?php if (!defined('ABSPATH')) exit; ?>
<div data-modal="donation" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-start justify-center overflow-y-auto p-4 sm:p-6">
  <div class="bg-white rounded-3xl w-full max-w-2xl my-8 shadow-2xl">
    <div class="p-6 sm:p-8">
      <div class="flex items-start justify-between gap-4 mb-2">
        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-amber-100 text-amber-900 text-xs font-bold"><?php echo erekshe_icon('HeartHandshake', 'w-4 h-4'); ?><?php echo esc_html(erekshe_t('d_donationBadge')); ?></span>
        <button type="button" data-modal-close class="w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center transition"><?php echo erekshe_icon('X', 'w-5 h-5'); ?></button>
      </div>
      <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-1"><?php echo esc_html(erekshe_t('d_donationBadge')); ?></h2>
      <p class="text-sm text-slate-600 mb-6"><?php echo esc_html(erekshe_t('donationSubtitle')); ?></p>
      <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-6 text-center text-white mb-6">
        <div class="w-24 h-24 mx-auto bg-white/20 rounded-2xl flex items-center justify-center mb-4"><?php echo erekshe_icon('QrCode', 'w-14 h-14'); ?></div>
        <p class="text-xs font-bold uppercase tracking-wider mb-1"><?php echo esc_html(erekshe_t('d_donationQr')); ?></p>
        <p class="text-lg font-extrabold">ОФ «EREKSHE ANALAR»</p>
      </div>
      <div class="bg-slate-50 rounded-2xl p-5 border border-slate-100">
        <p class="text-xs font-bold uppercase tracking-wider text-slate-500 mb-3"><?php echo esc_html(erekshe_t('d_donationDetails')); ?></p>
        <div class="flex flex-col gap-3 text-sm">
          <div class="flex items-center justify-between gap-3 border-b border-slate-100 pb-2"><span class="text-slate-500"><?php echo esc_html(erekshe_t('d_donationOrg')); ?></span><span class="font-bold text-slate-900">ОФ «EREKSHE ANALAR»</span></div>
          <div class="flex items-center justify-between gap-3 border-b border-slate-100 pb-2"><span class="text-slate-500"><?php echo esc_html(erekshe_t('d_donationBin')); ?></span><span class="font-bold text-slate-900">210840012345</span></div>
          <div class="flex items-center justify-between gap-3 border-b border-slate-100 pb-2"><span class="text-slate-500">IBAN (KZT):</span><span class="font-bold text-slate-900">KZ889261801123456789</span></div>
          <div class="flex items-center gap-2"><span class="text-slate-500"><?php echo esc_html(erekshe_t('d_donationBank')); ?></span><span class="font-bold text-slate-900">АО «Kaspi Bank» / АО «Halyk Bank»</span></div>
          <div class="flex items-start gap-2"><span class="text-slate-500"><?php echo esc_html(erekshe_t('d_donationKbe')); ?></span><span class="font-bold text-slate-900"><?php echo esc_html(erekshe_t('d_donationKbeValue')); ?></span></div>
        </div>
      </div>
    </div>
  </div>
</div>
