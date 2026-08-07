<?php
if (!defined('ABSPATH')) exit;
$icons = ['PhoneCall','UserCheck','FileText','Stethoscope','ClipboardList','CalendarCheck','Sparkles','TrendingUp','Home'];
$steps = erekshe_get_rows('steps', []);
if (!$steps) {
    for ($i = 1; $i <= 9; $i++) $steps[] = ['num' => erekshe_t("step{$i}Num", sprintf('%02d', $i)), 'title' => erekshe_t("step{$i}Title", 'Этап ' . $i), 'desc' => erekshe_t("step{$i}Desc", ''), 'icon' => $icons[$i - 1]];
}
?>
<section id="process" class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('CheckCircle2', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('stepsBadge', 'Как проходит реабилитация')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('stepsTitle', '9 этапов реабилитационного маршрута в фонде')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('stepsSubtitle', 'Прозрачный и структурированный путь от первого обращения до результата')); ?></p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($steps as $st): ?>
        <div class="bg-slate-50 hover:bg-emerald-50/50 p-4 rounded-3xl border border-slate-200/70 hover:border-emerald-300 transition-all flex flex-col justify-between group shadow-2xs">
          <div>
            <div class="flex items-center justify-between mb-4">
              <span class="text-xs font-black tracking-widest text-emerald-700 bg-emerald-100 px-3 py-1 rounded-full uppercase"><?php echo esc_html($st['num']); ?></span>
              <div class="w-10 h-10 rounded-2xl bg-white text-emerald-600 flex items-center justify-center shadow-xs group-hover:bg-emerald-600 group-hover:text-white transition-colors"><?php echo erekshe_icon($st['icon'] ?: 'CheckCircle2', 'w-5 h-5'); ?></div>
            </div>
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-emerald-800 transition-colors"><?php echo esc_html($st['title']); ?></h3>
            <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed"><?php echo esc_html($st['desc']); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="mt-12 text-center bg-gradient-to-r from-emerald-600 to-teal-700 text-white p-4 rounded-3xl shadow-xl flex flex-col sm:flex-row items-center justify-between gap-6">
      <div class="text-left max-w-2xl"><h3 class="text-xl font-bold mb-1"><?php echo esc_html(erekshe_t('b_ProcessCtaTitle')); ?></h3><p class="text-emerald-50 text-sm"><?php echo esc_html(erekshe_t('b_ProcessCtaText')); ?></p></div>
      <button type="button" data-enroll-open class="px-6 py-3 rounded-2xl bg-white text-emerald-700 font-extrabold text-sm transition shadow-lg inline-flex items-center gap-2 cursor-pointer whitespace-nowrap"><?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('btnEnroll')); ?></span></button>
    </div>
  </div>
</section>
