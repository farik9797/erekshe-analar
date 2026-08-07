<?php if (!defined('ABSPATH')) exit; ?>
<section class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Newspaper', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('newsBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('newsTitle', 'Новости, акции и полезные статьи')); ?></h2>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (erekshe_get_rows('news', erekshe_news()) as $n): ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all overflow-hidden flex flex-col justify-between group flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div class="relative h-48 bg-slate-100"><img src="<?php echo esc_url(erekshe_img($n['image'])); ?>" alt="<?php echo esc_attr($n['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" /><div class="absolute top-4 left-4"><span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-emerald-600 text-white"><?php echo esc_html($n['badge']); ?></span></div></div>
          <div class="p-6 flex-1 flex flex-col justify-between gap-4">
            <div>
              <div class="flex items-center gap-1.5 text-slate-400 text-xs font-semibold mb-2"><?php echo erekshe_icon('Calendar', 'w-3.5 h-3.5'); ?><?php echo esc_html($n['date']); ?></div>
              <h3 class="text-base font-bold text-slate-900 leading-snug group-hover:text-emerald-700 transition"><?php echo esc_html($n['title']); ?></h3>
              <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed"><?php echo esc_html($n['content']); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
