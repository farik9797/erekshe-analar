<?php if (!defined('ABSPATH')) exit; ?>
<section id="faq" class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-4xl mx-auto px-4">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('HelpCircle', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('faqBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('faqTitle', 'Часто задаваемые вопросы родителей')); ?></h2>
    </div>
    <div class="flex flex-col gap-3">
      <?php foreach (erekshe_get_rows('faqs', erekshe_faqs()) as $i => $f): ?>
        <div data-faq class="rounded-2xl border transition-all <?php echo $i === 0 ? 'bg-emerald-50/50 border-emerald-300 shadow-sm' : 'bg-slate-50/80 border-slate-200'; ?>">
          <button type="button" data-faq-toggle class="w-full p-5 text-left font-bold text-slate-900 text-sm sm:text-base flex items-center justify-between gap-4"><span><?php echo esc_html($f['question']); ?></span><div class="p-1.5 rounded-xl transition shrink-0 <?php echo $i === 0 ? 'bg-emerald-600 text-white' : 'bg-white text-slate-500'; ?>"><?php echo erekshe_icon('ChevronDown', 'w-4 h-4'); ?></div></button>
          <div data-faq-body class="px-5 pb-5 pt-1 text-xs sm:text-sm text-slate-700 leading-relaxed border-t border-emerald-100/60 font-medium <?php echo $i === 0 ? '' : 'hidden'; ?>"><?php echo esc_html($f['answer']); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
