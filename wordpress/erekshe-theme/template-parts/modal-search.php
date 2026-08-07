<?php if (!defined('ABSPATH')) exit; ?>
<div data-modal="search" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-start justify-center overflow-y-auto p-4">
  <div class="bg-white rounded-3xl w-full max-w-2xl my-8 shadow-2xl overflow-hidden">
    <div class="p-4 border-b border-slate-100 flex items-center gap-3">
      <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center"><?php echo erekshe_icon('Search', 'w-5 h-5'); ?></div>
      <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex-1">
        <input type="search" name="s" placeholder="<?php echo esc_attr(erekshe_t('searchPlaceholder')); ?>" class="w-full text-lg font-medium text-slate-900 focus:outline-none" autofocus />
      </form>
      <button type="button" data-modal-close class="px-3 py-1.5 rounded-lg border border-slate-200 text-xs font-bold text-slate-500 hover:bg-slate-100 transition">ESC</button>
    </div>
    <div class="p-6 text-center text-slate-500 text-sm">
      <p><?php echo esc_html(erekshe_t('d_searchHint')); ?></p>
      <p class="mt-2 text-xs"><?php echo esc_html(erekshe_t('d_searchQuickLinks')); ?>
        <a href="<?php echo esc_url(erekshe_nav_url('services')); ?>" class="text-emerald-700 font-bold hover:underline"><?php echo esc_html(erekshe_t('navServices')); ?></a> ·
        <a href="<?php echo esc_url(erekshe_nav_url('branches')); ?>" class="text-emerald-700 font-bold hover:underline"><?php echo esc_html(erekshe_t('navBranches')); ?></a> ·
        <a href="<?php echo esc_url(erekshe_nav_url('team')); ?>" class="text-emerald-700 font-bold hover:underline"><?php echo esc_html(erekshe_t('navTeam')); ?></a>
      </p>
    </div>
  </div>
</div>
