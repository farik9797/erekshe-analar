<?php if (!defined('ABSPATH')) exit; ?>
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Quote', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('c_ReviewsBadgeFamilies')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('reviewsTitle', 'Отзывы родителей о результатах реабилитации')); ?></h2>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (erekshe_get_rows('reviews', erekshe_reviews()) as $r): ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-xs hover:shadow-xl transition-all flex flex-col justify-between gap-6 relative flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div>
            <div class="flex items-center justify-between gap-3 mb-4">
              <div class="flex items-center gap-3"><img src="<?php echo esc_url($r['avatar']); ?>" alt="<?php echo esc_attr($r['parentName']); ?>" class="w-12 h-12 rounded-full object-cover border border-slate-200" /><div><p class="font-bold text-slate-900 text-sm"><?php echo esc_html($r['parentName']); ?></p><p class="text-xs text-slate-500"><?php echo esc_html($r['childAgeDiagnosis']); ?></p></div></div>
              <div class="flex items-center gap-0.5 text-amber-400"><?php for ($i=0;$i<intval($r['rating']);$i++) echo erekshe_icon('Star', 'w-4 h-4 fill-amber-400'); ?></div>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed italic">&laquo;<?php echo esc_html($r['text']); ?>&raquo;</p>
          </div>
          <div class="bg-emerald-50/70 rounded-2xl p-3"><p class="text-[11px] font-bold uppercase tracking-wider text-emerald-700 mb-1"><?php echo esc_html(erekshe_t('reviewResultLabel')); ?></p><p class="text-xs font-bold text-slate-800"><?php echo esc_html($r['result']); ?></p></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
