<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/NewsSection.tsx
// На своей странице тот же заголовок уже выводит баннер — шапку секции скрываем.
$hide_header = !empty($args['hide_header']);
$news = erekshe_get_rows('news', erekshe_news());
$cats = [['all', 'filterNewsAll'], ['announcement', 'filterNewsAnnounce'], ['charity', 'filterNewsCharity'], ['holiday', 'filterNewsHolidays']];
$used = array_column($news, 'category');
$cats = array_values(array_filter($cats, function ($c) use ($used) { return $c[0] === 'all' || in_array($c[0], $used, true); })); // пустые вкладки не показываем
$f_base = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition cursor-pointer ';
$f_on   = 'bg-emerald-600 text-white shadow-md';
$f_off  = 'bg-white text-slate-700 border border-slate-200';
?>
<section id="news" class="<?php echo $hide_header ? 'pt-8 pb-16 md:pt-10 md:pb-24' : 'py-16 md:py-24'; ?> bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <?php if (!$hide_header): ?>
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
        <?php echo erekshe_icon('Newspaper', 'w-4 h-4 text-emerald-600'); ?>
        <span><?php echo esc_html(erekshe_t('newsBadge')); ?></span>
      </div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('newsTitle')); ?></h2>
    </div>
    <?php endif; ?>

    <div class="flex flex-wrap items-center justify-center gap-2 mb-10">
      <?php foreach ($cats as $i => $c): ?>
        <button type="button" data-filter-group="news" data-filter="<?php echo esc_attr($c[0]); ?>" data-cls-base="<?php echo esc_attr($f_base); ?>" data-cls-on="<?php echo esc_attr($f_on); ?>" data-cls-off="<?php echo esc_attr($f_off); ?>" class="<?php echo esc_attr($f_base . ($i === 0 ? $f_on : $f_off)); ?>"><?php echo esc_html(erekshe_t($c[1])); ?></button>
      <?php endforeach; ?>
    </div>

    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:flex-wrap sm:justify-center sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach ($news as $n): ?>
        <div data-filter-item="news" data-cat="<?php echo esc_attr($n['category']); ?>" class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all overflow-hidden flex flex-col justify-between group flex-shrink-0 w-[85vw] max-w-[340px] sm:w-[calc(50%_-_0.75rem)] md:w-[calc((100%_-_3rem)/3)] sm:max-w-none snap-center sm:snap-none">
          <div class="relative aspect-square bg-slate-100">
            <img src="<?php echo esc_url(erekshe_img($n['image'])); ?>" alt="<?php echo esc_attr($n['title']); ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
            <?php if (!empty($n['badge'])): ?>
              <div class="absolute top-3 left-3 bg-emerald-600 text-white px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wider shadow-sm"><?php echo esc_html($n['badge']); ?></div>
            <?php endif; ?>
          </div>
          <div class="p-6 flex-1 flex flex-col justify-between gap-4">
            <div>
              <div class="flex items-center gap-1.5 text-slate-400 text-xs font-semibold mb-2">
                <?php echo erekshe_icon('Calendar', 'w-3.5 h-3.5 text-emerald-600'); ?>
                <span><?php echo esc_html($n['date']); ?></span>
              </div>
              <h3 class="text-base font-bold text-slate-900 group-hover:text-emerald-700 transition-colors leading-snug"><?php echo esc_html($n['title']); ?></h3>
              <p class="text-xs text-slate-600 mt-2 leading-relaxed"><?php echo esc_html($n['summary'] ?? $n['content']); ?></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
