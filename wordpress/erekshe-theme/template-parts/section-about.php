<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/AboutSection.tsx
$about_img = erekshe_field('about_image', erekshe_img('regenerated_image_1785993218212.webp'));
$is_kk = erekshe_lang() === 'kk';
$values = [];
for ($i = 1; $i <= 8; $i++) $values[] = erekshe_t('value' . $i);
$umay_feats = [['Sparkles', 'umayFeature1'], ['ShieldCheck', 'umayFeature2'], ['Users', 'umayFeature3'], ['Award', 'umayFeature4']];
?>
<section id="about" class="py-16 md:py-24 bg-white border-b border-slate-100 relative">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
        <?php echo erekshe_icon('Heart', 'w-4 h-4 text-emerald-600 fill-emerald-500'); ?>
        <span><?php echo esc_html(erekshe_t('aboutBadge')); ?></span>
      </div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('aboutTitle')); ?></h2>
      <div class="w-16 h-1 bg-emerald-500 mx-auto mt-4 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center mb-16">
      <div class="lg:col-span-7 flex flex-col gap-6">
        <div class="bg-slate-50 p-6 md:p-4 rounded-3xl border border-slate-100 shadow-xs">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold"><?php echo erekshe_icon('BookOpen', 'w-5 h-5'); ?></div>
            <h3 class="text-xl font-bold text-slate-900"><?php echo esc_html(erekshe_field('history_title', erekshe_t('aboutHistoryTitle'))); ?></h3>
          </div>
          <p class="text-sm md:text-base text-slate-600 leading-relaxed"><?php echo esc_html(erekshe_field('history_text', erekshe_t('aboutHistoryText'))); ?></p>
        </div>
        <div class="bg-gradient-to-br from-emerald-600 to-teal-700 text-white p-6 md:p-4 rounded-3xl shadow-lg shadow-emerald-700/20">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-xl bg-white/20 text-white flex items-center justify-center font-bold"><?php echo erekshe_icon('Target', 'w-5 h-5'); ?></div>
            <h3 class="text-xl font-bold text-white"><?php echo esc_html(erekshe_field('mission_title', erekshe_t('aboutMissionTitle'))); ?></h3>
          </div>
          <p class="text-sm md:text-base text-emerald-50 leading-relaxed font-medium"><?php echo esc_html(erekshe_field('mission_text', erekshe_t('aboutMissionText'))); ?></p>
        </div>
      </div>
      <div class="lg:col-span-5">
        <div class="relative rounded-3xl overflow-hidden shadow-xl border-4 border-slate-50 bg-slate-100">
          <img src="<?php echo esc_url($about_img); ?>" alt="<?php echo esc_attr($is_kk ? 'EREKSHE ANALAR балалары мен мамандары' : 'Дети и специалисты EREKSHE ANALAR'); ?>" class="w-full h-[380px] object-cover" />
          <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-transparent to-transparent flex items-end p-6">
            <p class="text-white font-bold text-base leading-snug"><?php echo esc_html($is_kk
              ? '«Әр бала бірегей және назар аударуға, кәсібилікке және тең мүмкіндіктерге лайық»'
              : '«Каждый ребенок уникален и заслуживает внимания, профессионализма и равных возможностей»'); ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="mb-20">
      <h3 class="text-2xl font-bold text-slate-900 text-center mb-8"><?php echo esc_html(erekshe_t('aboutValuesTitle')); ?></h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <?php foreach ($values as $val): ?>
          <div class="bg-emerald-50/60 hover:bg-emerald-100/80 p-5 rounded-2xl border border-emerald-100 transition flex items-start gap-3">
            <div class="w-7 h-7 rounded-full bg-emerald-600 text-white flex items-center justify-center flex-shrink-0 text-xs font-bold mt-0.5"><?php echo erekshe_icon('Check', 'w-4 h-4'); ?></div>
            <span class="text-xs md:text-sm font-bold text-slate-800 leading-snug"><?php echo esc_html($val); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div id="umay" class="bg-gradient-to-r from-amber-50 via-orange-50 to-amber-100/80 rounded-3xl p-4 md:p-12 border border-amber-200/80 shadow-md relative overflow-hidden">
      <div class="absolute top-0 right-0 w-80 h-80 bg-amber-200/30 rounded-full blur-3xl pointer-events-none"></div>
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center relative z-10">
        <div class="lg:col-span-8 flex flex-col gap-4">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-amber-200/80 text-amber-950 text-xs font-bold w-fit">
            <?php echo erekshe_icon('Sun', 'w-4 h-4 text-amber-700'); ?>
            <span><?php echo esc_html(erekshe_t('umayBadge')); ?></span>
          </div>
          <h3 class="text-2xl sm:text-3xl font-extrabold text-amber-950"><?php echo esc_html(erekshe_t('umayTitle')); ?></h3>
          <p class="text-sm sm:text-base text-amber-900/90 leading-relaxed"><?php echo esc_html(erekshe_t('umayDesc')); ?></p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-2">
            <?php foreach ($umay_feats as $f): ?>
              <div class="flex items-center gap-2 bg-white/80 p-3 rounded-xl border border-amber-200 text-xs font-bold text-amber-950 shadow-2xs">
                <?php echo erekshe_icon($f[0], 'w-4 h-4 text-amber-600 flex-shrink-0'); ?>
                <span><?php echo esc_html(erekshe_t($f[1])); ?></span>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="lg:col-span-4 flex flex-col items-start lg:items-end justify-center">
          <a href="<?php echo esc_url(erekshe_nav_url('umay')); ?>" class="flex items-center gap-2 px-6 py-4 rounded-2xl text-sm font-bold text-white bg-amber-800 hover:bg-amber-900 shadow-lg shadow-amber-900/20 transition hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
            <span><?php echo esc_html(erekshe_t('umayCta')); ?></span>
            <?php echo erekshe_icon('ArrowRight', 'w-4 h-4'); ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
