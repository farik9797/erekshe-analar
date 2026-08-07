<?php if (!defined('ABSPATH')) exit;
$about_img = erekshe_field('about_image', erekshe_img('regenerated_image_1785993218212.webp'));
$htitle = erekshe_field('history_title', erekshe_t('aboutHistoryTitle'));
$htext  = erekshe_field('history_text', erekshe_t('aboutHistoryText'));
$mtitle = erekshe_field('mission_title', erekshe_t('aboutMissionTitle'));
$mtext  = erekshe_field('mission_text', erekshe_t('aboutMissionText'));
?>
<section class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('BookOpen', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('b_AboutSectionBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('aboutTitle', 'Фонд, созданный с любовью к детям и глубоким пониманием потребностей семей')); ?></h2>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
      <div class="flex flex-col gap-6">
        <div class="bg-slate-50 rounded-3xl p-4 sm:p-6 border border-slate-100">
          <div class="flex items-center gap-4 mb-4"><div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center"><?php echo erekshe_icon('BookOpen', 'w-6 h-6'); ?></div><h3 class="text-xl font-bold text-slate-900"><?php echo esc_html($htitle); ?></h3></div>
          <p class="text-sm text-slate-600 leading-relaxed"><?php echo esc_html($htext); ?></p>
        </div>
        <div class="bg-emerald-700 text-white rounded-3xl p-4 sm:p-6">
          <div class="flex items-center gap-4 mb-4"><div class="w-12 h-12 rounded-2xl bg-emerald-600 flex items-center justify-center"><?php echo erekshe_icon('Target', 'w-6 h-6'); ?></div><h3 class="text-xl font-bold"><?php echo esc_html($mtitle); ?></h3></div>
          <p class="text-sm text-emerald-50 leading-relaxed"><?php echo esc_html($mtext); ?></p>
        </div>
      </div>
      <div class="relative rounded-3xl overflow-hidden shadow-xl border-4 border-white"><img src="<?php echo esc_url($about_img); ?>" alt="<?php echo esc_attr(erekshe_t('b_AboutImageAlt')); ?>" class="w-full h-[380px] object-cover" /></div>
    </div>
  </div>
</section>
