<?php if (!defined('ABSPATH')) exit; ?>
<section id="charity" class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Heart', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('c_CharityBadgeProjects')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('charityTitle', 'Социальные проекты и инициативы фонда')); ?></h2>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 sm:gap-8 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (erekshe_get_rows('projects', erekshe_projects()) as $p): $prog = $p['targetAmount'] ? min(100, round($p['currentAmount'] / $p['targetAmount'] * 100)) : 100; ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all overflow-hidden flex flex-col justify-between flex-shrink-0 w-[85vw] max-w-[400px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div class="relative h-56 bg-slate-100"><img src="<?php echo esc_url(erekshe_img($p['image'])); ?>" alt="<?php echo esc_attr($p['title']); ?>" class="w-full h-full object-cover" /><div class="absolute top-4 left-4"><span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider <?php echo $p['status'] === 'completed' ? 'bg-emerald-600 text-white' : 'bg-amber-500 text-slate-950 font-extrabold'; ?>"><?php echo $p['status'] === 'completed' ? esc_html(erekshe_t('c_StatusCompleted')) : esc_html(erekshe_t('projectStatusActive')); ?></span></div></div>
          <div class="p-6 flex-1 flex flex-col justify-between gap-6">
            <div><h3 class="text-xl font-bold text-slate-900 leading-snug"><?php echo esc_html($p['title']); ?></h3><p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed"><?php echo esc_html($p['description']); ?></p></div>
            <div class="flex flex-col gap-2"><div class="flex items-center justify-between text-xs font-bold text-slate-700"><span><?php echo esc_html(erekshe_t('c_Collected')); ?> <?php echo number_format($p['currentAmount'], 0, '', ' '); ?> &#8376;</span><span><?php echo esc_html(erekshe_t('c_Goal')); ?> <?php echo number_format($p['targetAmount'], 0, '', ' '); ?> &#8376;</span></div><div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-200"><div class="h-full bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full" style="width: <?php echo esc_attr($prog); ?>%"></div></div></div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between"><div class="flex items-center gap-1.5 text-xs font-bold text-slate-600"><?php echo erekshe_icon('Users', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('projectBeneficiaries')); ?> <?php echo esc_html($p['beneficiariesCount']); ?></span></div><button type="button" data-donation-open class="px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition flex items-center gap-1.5 shadow-md"><?php echo erekshe_icon('HeartHandshake', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('btnSupportProject')); ?></span></button></div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
