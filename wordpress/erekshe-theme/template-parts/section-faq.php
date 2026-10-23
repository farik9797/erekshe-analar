<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/FaqSection.tsx: поиск по вопросам, открыт один вопрос (первый — по умолчанию)
$faqs = erekshe_get_rows('faqs', erekshe_faqs());
$item_base = 'rounded-2xl border transition-all ';
$item_on   = 'bg-emerald-50/50 border-emerald-300 shadow-sm';
$item_off  = 'bg-slate-50/80 border-slate-200 hover:bg-slate-100/80';
$chev_base = 'p-1.5 rounded-xl transition ';
?>
<section id="faq" class="py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-4xl mx-auto px-4">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
        <?php echo erekshe_icon('HelpCircle', 'w-4 h-4 text-emerald-600'); ?>
        <span><?php echo esc_html(erekshe_t('faqBadge')); ?></span>
      </div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('faqTitle')); ?></h2>
    </div>

    <div class="relative mb-8">
      <?php echo erekshe_icon('Search', 'w-5 h-5 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2'); ?>
      <input type="text" data-faq-search placeholder="<?php echo esc_attr(erekshe_t('faqSearchPlaceholder')); ?>" class="w-full pl-12 pr-4 py-3.5 rounded-2xl bg-slate-50 border border-slate-200 text-sm font-medium text-slate-900 focus:outline-none focus:ring-2 focus:ring-emerald-500 transition" />
    </div>

    <div class="flex flex-col gap-3">
      <?php foreach ($faqs as $i => $f): $on = $i === 0; ?>
        <div data-faq data-cls-base="<?php echo esc_attr($item_base); ?>" data-cls-on="<?php echo esc_attr($item_on); ?>" data-cls-off="<?php echo esc_attr($item_off); ?>" class="<?php echo esc_attr($item_base . ($on ? $item_on : $item_off)); ?>">
          <button type="button" data-faq-toggle class="w-full p-5 text-left font-bold text-slate-900 text-sm sm:text-base flex items-center justify-between gap-4 cursor-pointer">
            <span><?php echo esc_html($f['question']); ?></span>
            <div data-faq-chev data-cls-base="<?php echo esc_attr($chev_base); ?>" data-cls-on="bg-emerald-600 text-white" data-cls-off="bg-white text-slate-500" class="<?php echo esc_attr($chev_base . ($on ? 'bg-emerald-600 text-white' : 'bg-white text-slate-500')); ?>">
              <span data-faq-up class="<?php echo $on ? '' : 'hidden'; ?>"><?php echo erekshe_icon('ChevronUp', 'w-4 h-4'); ?></span>
              <span data-faq-down class="<?php echo $on ? 'hidden' : ''; ?>"><?php echo erekshe_icon('ChevronDown', 'w-4 h-4'); ?></span>
            </div>
          </button>
          <div data-faq-body class="<?php echo $on ? '' : 'hidden '; ?>px-5 pb-5 pt-1 text-xs sm:text-sm text-slate-700 leading-relaxed border-t border-emerald-100/60 font-medium"><?php echo esc_html($f['answer']); ?></div>
        </div>
      <?php endforeach; ?>
      <p data-faq-empty class="hidden text-center text-slate-500 py-8 text-sm"><?php echo esc_html(erekshe_t('faqNoResults')); ?></p>
    </div>
  </div>
</section>
