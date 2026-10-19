<?php if (!defined('ABSPATH')) exit;
$roster = erekshe_get_rows('team_roster', erekshe_team_roster());
$order  = ['admin','logoped','defectolog','psycholog','afk','pool','vospitatel','vospitatel_asst','nanny','social','nurse'];
$grouped = [];
foreach ($roster as $p) { $grouped[$p['group']][] = $p; }
// Русское склонение слова «специалист» по количеству; казахский «маман» не склоняется
$roster_n = (int) erekshe_t('heroStatTeam', '32'); // общее число специалистов фонда, а не длина списка
if (erekshe_lang() === 'ru') {
  $m10 = $roster_n % 10; $m100 = $roster_n % 100;
  if ($m10 === 1 && $m100 !== 11)                               $spec_word = 'специалист';
  elseif ($m10 >= 2 && $m10 <= 4 && ($m100 < 12 || $m100 > 14)) $spec_word = 'специалиста';
  else                                                          $spec_word = 'специалистов';
} else {
  $spec_word = 'маман';
}
?>
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-5xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-14">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Users', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html($roster_n); ?> <?php echo esc_html($spec_word); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('teamTitle', 'Руководство и междисциплинарная команда фонда')); ?></h2>
    </div>

    <?php foreach ($order as $g): if (empty($grouped[$g])) continue; $people = $grouped[$g]; ?>
      <div class="mb-10 last:mb-0">
        <div class="flex items-center gap-3 mb-4">
          <h3 class="text-lg sm:text-xl font-extrabold text-slate-900"><?php echo esc_html(erekshe_t('team_grp_' . $g)); ?></h3>
          <span class="text-xs font-bold text-emerald-700 bg-emerald-100 px-2.5 py-0.5 rounded-full"><?php echo esc_html(count($people)); ?></span>
          <span class="flex-1 h-px bg-slate-200"></span>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 sm:gap-6">
          <?php foreach ($people as $p): $initial = function_exists('mb_substr') ? mb_substr($p['name'], 0, 1, 'UTF-8') : substr($p['name'], 0, 1); ?>
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-2xs hover:shadow-md hover:border-emerald-200 transition overflow-hidden flex flex-col">
              <!-- фото сверху; у кого нет фото — буква на том же месте -->
              <div class="relative aspect-[3/4] bg-emerald-50">
                <?php if (!empty($p['photo'])): ?>
                  <img src="<?php echo esc_url(erekshe_img($p['photo'])); ?>" alt="<?php echo esc_attr($p['name']); ?>" loading="lazy" class="absolute inset-0 w-full h-full object-cover" />
                <?php else: ?>
                  <div class="absolute inset-0 flex items-center justify-center text-5xl font-extrabold text-emerald-700"><?php echo esc_html($initial); ?></div>
                <?php endif; ?>
              </div>
              <div class="p-3 sm:p-4">
                <p class="font-bold text-slate-900 text-sm sm:text-base leading-snug"><?php echo esc_html($p['name']); ?></p>
                <?php if (!empty($p['note'])): ?><p class="text-xs sm:text-sm text-emerald-700 font-semibold mt-1 leading-snug"><?php echo esc_html($p['note']); ?></p><?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
