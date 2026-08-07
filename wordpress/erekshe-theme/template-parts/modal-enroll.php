<?php if (!defined('ABSPATH')) exit; ?>
<div data-modal="enroll" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-start justify-center overflow-y-auto p-4 sm:p-6">
  <div class="bg-white rounded-3xl w-full max-w-2xl my-8 shadow-2xl">
    <div class="p-6 sm:p-8">
      <div class="flex items-start justify-between gap-4 mb-2">
        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold"><?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><?php echo esc_html(erekshe_t('d_enrollBadge')); ?></span>
        <button type="button" data-modal-close class="w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center transition"><?php echo erekshe_icon('X', 'w-5 h-5'); ?></button>
      </div>
      <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-1"><?php echo esc_html(erekshe_t('d_enrollTitle')); ?></h2>
      <p class="text-sm text-slate-600 mb-6"><?php echo esc_html(erekshe_t('d_enrollSubtitle')); ?></p>
      <form class="flex flex-col gap-4" onsubmit="return false;">
        <div><label class="text-sm font-bold text-slate-900 block mb-1"><?php echo esc_html(erekshe_t('d_enrollParentName')); ?></label><input type="text" required placeholder="<?php echo esc_attr(erekshe_t('d_enrollParentNamePh')); ?>" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" /></div>
        <div><label class="text-sm font-bold text-slate-900 block mb-1"><?php echo esc_html(erekshe_t('d_enrollPhone')); ?></label><input type="tel" required placeholder="+7 (700) 000-00-00" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" /></div>
        <label class="flex items-center gap-2 text-sm text-slate-700"><input type="checkbox" checked class="w-4 h-4 accent-emerald-600" /><?php echo esc_html(erekshe_t('d_enrollWhatsapp')); ?></label>
        <div><label class="text-sm font-bold text-slate-900 block mb-1"><?php echo esc_html(erekshe_t('d_enrollChildName')); ?></label><input type="text" placeholder="<?php echo esc_attr(erekshe_t('d_enrollChildNamePh')); ?>" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500" /></div>
        <div><label class="text-sm font-bold text-slate-900 block mb-1"><?php echo esc_html(erekshe_t('d_enrollBranch')); ?></label>
          <select class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500">
            <option><?php echo esc_html(erekshe_t('d_enrollBranchSelect')); ?></option>
            <?php foreach (erekshe_branches() as $b): ?><option><?php echo esc_html($b['name']); ?></option><?php endforeach; ?>
          </select>
        </div>
        <div><label class="text-sm font-bold text-slate-900 block mb-1"><?php echo esc_html(erekshe_t('d_enrollDiagnosis')); ?></label><textarea rows="3" placeholder="<?php echo esc_attr(erekshe_t('d_enrollDiagnosisPh')); ?>" class="w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500"></textarea></div>
        <button type="submit" class="w-full py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg transition flex items-center justify-center gap-2"><?php echo erekshe_icon('Send', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_t('d_enrollSubmit')); ?></span></button>
      </form>
    </div>
  </div>
</div>
