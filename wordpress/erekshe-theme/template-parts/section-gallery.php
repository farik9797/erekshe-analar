<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/GallerySection.tsx (фильтры + просмотр фото)
$items = erekshe_gallery();
$cats = [['all', 'filterGalleryAll'], ['classes', 'filterGalleryClasses'], ['pool', 'filterGalleryPool'], ['salt_room', 'filterGallerySalt'], ['umay', 'filterGalleryUmay'], ['events', 'filterGalleryEvents']];
$used = array_column($items, 'category');
$cats = array_values(array_filter($cats, function ($c) use ($used) { return $c[0] === 'all' || in_array($c[0], $used, true); })); // пустые вкладки не показываем
$f_base = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition cursor-pointer ';
$f_on   = 'bg-emerald-600 text-white shadow-md';
$f_off  = 'bg-slate-100 text-slate-700 hover:bg-slate-200';
$close  = erekshe_lang() === 'kk' ? 'Жабу' : 'Закрыть';
?>
<section id="gallery" class="py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
        <?php echo erekshe_icon('Camera', 'w-4 h-4 text-emerald-600'); ?>
        <span><?php echo esc_html(erekshe_t('galleryBadge')); ?></span>
      </div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('galleryTitle')); ?></h2>
    </div>

    <div class="flex flex-wrap items-center justify-center gap-2 mb-10">
      <?php foreach ($cats as $i => $c): ?>
        <button type="button" data-filter-group="gallery" data-filter="<?php echo esc_attr($c[0]); ?>" data-cls-base="<?php echo esc_attr($f_base); ?>" data-cls-on="<?php echo esc_attr($f_on); ?>" data-cls-off="<?php echo esc_attr($f_off); ?>" class="<?php echo esc_attr($f_base . ($i === 0 ? $f_on : $f_off)); ?>"><?php echo esc_html(erekshe_t($c[1])); ?></button>
      <?php endforeach; ?>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <?php foreach ($items as $g): $src = erekshe_img($g['imageUrl']); ?>
        <div data-filter-item="gallery" data-cat="<?php echo esc_attr($g['category']); ?>" data-lightbox-src="<?php echo esc_url($src); ?>" data-lightbox-title="<?php echo esc_attr($g['title']); ?>" class="group relative aspect-[3/4] rounded-3xl overflow-hidden shadow-xs cursor-pointer bg-slate-100 border border-slate-200">
          <img src="<?php echo esc_url($src); ?>" alt="<?php echo esc_attr($g['title']); ?>" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" />
          <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
            <div class="text-white flex items-center justify-between w-full">
              <span class="font-bold text-sm"><?php echo esc_html($g['title']); ?></span>
              <div class="w-8 h-8 rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white"><?php echo erekshe_icon('Maximize2', 'w-4 h-4'); ?></div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Просмотр фото: Esc, крестик и клик по фону (оверлей и пустое место вокруг фото) закрывают; клик по фото — нет -->
  <div data-modal="lightbox" data-lightbox class="hidden fixed inset-0 bg-slate-950/90 z-50 flex items-center justify-center p-4 animate-fadeIn">
    <div data-backdrop class="relative max-w-4xl w-full max-h-[90vh] flex flex-col items-center">
      <button type="button" data-modal-close aria-label="<?php echo esc_attr($close); ?>" class="absolute -top-12 right-0 p-2 rounded-full bg-white/20 text-white hover:bg-white/40 transition cursor-pointer"><?php echo erekshe_icon('X', 'w-6 h-6'); ?></button>
      <img data-lightbox-img src="" alt="" class="max-h-[80vh] w-auto rounded-2xl shadow-2xl object-contain" />
      <p data-lightbox-caption class="text-white font-bold text-lg mt-4 text-center"></p>
    </div>
  </div>
</section>
