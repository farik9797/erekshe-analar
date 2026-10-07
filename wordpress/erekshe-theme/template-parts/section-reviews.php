<?php if (!defined('ABSPATH')) exit; ?>
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Quote', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('c_ReviewsBadgeFamilies')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('reviewsTitle', 'Отзывы родителей о результатах реабилитации')); ?></h2>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (erekshe_get_rows('reviews', erekshe_reviews()) as $r): ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-xs hover:shadow-xl transition-all flex flex-col gap-4 relative flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div class="flex items-start justify-between gap-3">
            <p class="font-bold text-slate-900 text-sm leading-snug"><?php echo esc_html($r['parentName']); ?></p>
            <div class="flex items-center gap-0.5 text-amber-400 flex-shrink-0"><?php for ($i=0;$i<intval($r['rating']);$i++) echo erekshe_icon('Star', 'w-4 h-4 fill-amber-400'); ?></div>
          </div>
          <p class="text-sm text-slate-600 leading-relaxed italic">&laquo;<?php echo esc_html($r['text']); ?>&raquo;</p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
