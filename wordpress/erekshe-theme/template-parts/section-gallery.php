<?php if (!defined('ABSPATH')) exit; ?>
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Camera', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('c_GalleryBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('c_GalleryTitle')); ?></h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
      <?php foreach (erekshe_gallery() as $g): ?>
        <div class="relative rounded-2xl overflow-hidden group aspect-[4/3] bg-slate-200">
          <img src="<?php echo esc_url($g['imageUrl']); ?>" alt="<?php echo esc_attr($g['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
          <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end p-4">
            <p class="text-white text-sm font-bold"><?php echo esc_html($g['title']); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
