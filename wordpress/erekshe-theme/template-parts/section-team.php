<?php if (!defined('ABSPATH')) exit;
$roster = erekshe_get_rows('team_roster', erekshe_team_roster());
$order  = ['logoped','defectolog','psycholog','afk','pool','social','nurse'];
$grouped = [];
foreach ($roster as $p) { $grouped[$p['group']][] = $p; }
?>
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-14">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Users', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(count($roster)); ?> <?php echo esc_html(erekshe_t('c_TeamBadgeSpecialists', 'специалистов')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('teamTitle', 'Руководство и междисциплинарная команда фонда')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('teamDesc', 'Логопеды, дефектологи, психологи, инструкторы АФК/ЛФК, педагоги и заботливый младший персонал.')); ?></p>
    </div>

    <?php foreach ($order as $g): if (empty($grouped[$g])) continue; $people = $grouped[$g]; ?>
      <div class="mb-10 last:mb-0">
        <div class="flex items-center gap-3 mb-4">
          <h3 class="text-lg sm:text-xl font-extrabold text-slate-900"><?php echo esc_html(erekshe_t('team_grp_' . $g)); ?></h3>
          <span class="text-xs font-bold text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full"><?php echo esc_html(count($people)); ?></span>
          <span class="flex-1 h-px bg-slate-200"></span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4">
          <?php foreach ($people as $p): $initial = function_exists('mb_substr') ? mb_substr($p['name'], 0, 1, 'UTF-8') : substr($p['name'], 0, 1); ?>
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-2xs hover:shadow-md hover:border-emerald-200 transition p-4 flex items-start gap-3">
              <div class="w-11 h-11 rounded-xl bg-emerald-100 text-emerald-700 font-extrabold flex items-center justify-center flex-shrink-0 text-lg"><?php echo esc_html($initial); ?></div>
              <div class="min-w-0">
                <p class="font-bold text-slate-900 text-sm leading-snug"><?php echo esc_html($p['name']); ?></p>
                <?php if (!empty($p['note'])): ?><p class="text-[11px] text-emerald-700 font-semibold mt-0.5"><?php echo esc_html($p['note']); ?></p><?php endif; ?>
                <?php if (!empty($p['education'])): ?><p class="text-xs text-slate-500 mt-1"><?php echo esc_html(erekshe_t('team_eduLabel')); ?>: <?php echo esc_html($p['education']); ?></p><?php endif; ?>
                <?php if (!empty($p['branch'])): ?><p class="text-[11px] text-slate-500 mt-1 flex items-center gap-1"><?php echo erekshe_icon('MapPin', 'w-3 h-3 text-emerald-600 flex-shrink-0'); ?><span class="truncate"><?php echo esc_html($p['branch']); ?></span></p><?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
