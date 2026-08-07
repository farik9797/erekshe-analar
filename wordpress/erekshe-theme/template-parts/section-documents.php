<?php if (!defined('ABSPATH')) exit; ?>
<section id="documents" class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('FileText', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('c_DocumentsBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('documentsTitle', 'Уставные документы и прозрачная отчётность')); ?></h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <?php foreach (erekshe_get_rows('documents', erekshe_documents()) as $d): ?>
        <a href="<?php echo esc_url($d['fileUrl']); ?>" class="bg-slate-50 rounded-2xl p-5 border border-slate-200/70 hover:border-emerald-300 hover:bg-emerald-50/40 transition flex items-center justify-between gap-4 group">
          <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0"><?php echo erekshe_icon('FileText', 'w-6 h-6'); ?></div>
            <div>
              <p class="text-[11px] font-bold uppercase tracking-wider text-emerald-700 mb-0.5"><?php echo esc_html($d['category']); ?></p>
              <p class="font-bold text-slate-900 text-sm leading-snug group-hover:text-emerald-800 transition"><?php echo esc_html($d['title']); ?></p>
              <p class="text-xs text-slate-500 mt-1"><?php echo esc_html($d['fileSize']); ?> · <?php echo esc_html($d['date']); ?></p>
            </div>
          </div>
          <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 text-emerald-600 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-600 group-hover:text-white transition"><?php echo erekshe_icon('Download', 'w-4 h-4'); ?></div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
