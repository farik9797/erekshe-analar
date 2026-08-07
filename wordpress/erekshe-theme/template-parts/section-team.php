<?php if (!defined('ABSPATH')) exit; ?>
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Users', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('c_TeamBadgeSpecialists')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('teamTitle', 'Руководство и междисциплинарная команда фонда')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('teamDesc', 'Логопеды, дефектологи, психологи, инструкторы АФК/ЛФК, педагоги и заботливый младший персонал.')); ?></p>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (erekshe_get_rows('specialists', erekshe_specialists()) as $sp): ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all p-6 flex flex-col justify-between gap-4 flex-shrink-0 w-[85vw] max-w-[320px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div>
            <div class="flex items-center gap-4 mb-4">
              <div class="w-16 h-16 rounded-2xl overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-200"><img src="<?php echo esc_url(erekshe_img($sp['image'])); ?>" alt="<?php echo esc_attr($sp['name']); ?>" class="w-full h-full object-cover" /></div>
              <div><span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded"><?php echo esc_html($sp['experience']); ?></span><h4 class="text-base font-bold text-slate-900 mt-1 leading-snug"><?php echo esc_html($sp['name']); ?></h4></div>
            </div>
            <p class="text-xs font-bold text-emerald-800 mb-2"><?php echo esc_html($sp['role']); ?></p>
            <p class="text-xs text-slate-600 leading-relaxed mb-3"><?php echo esc_html($sp['bio']); ?></p>
            <div class="text-[11px] text-slate-500 pt-3 border-t border-slate-100"><p class="font-semibold text-slate-700 mb-1"><?php echo esc_html(erekshe_t('specialistEducation')); ?> <?php echo esc_html($sp['education']); ?></p></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
