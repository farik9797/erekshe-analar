<?php if (!defined('ABSPATH')) exit; ?>
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('HeartHandshake', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('c_PartnersBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-3xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('partnersTitle')); ?></h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <?php foreach (erekshe_partners() as $p): ?>
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs hover:border-emerald-300 transition flex flex-col items-center text-center justify-center gap-2">
          <p class="font-extrabold text-emerald-800 text-sm"><?php echo esc_html($p['logoText']); ?></p>
          <p class="text-[11px] text-slate-500"><?php echo esc_html($p['desc']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
