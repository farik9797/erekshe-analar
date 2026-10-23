<?php /**
 * Template Name: EREKSHE — Команда
 * 1:1 с src/pages/TeamPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header();
$n = (int) erekshe_t('heroStatTeam', '32');
if (erekshe_lang() === 'ru') { $m10 = $n % 10; $m100 = $n % 100; $w = ($m10 === 1 && $m100 !== 11) ? 'специалист' : (($m10 >= 2 && $m10 <= 4 && ($m100 < 12 || $m100 > 14)) ? 'специалиста' : 'специалистов'); } else { $w = 'маман'; } ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-emerald-900 via-slate-900 to-teal-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon('Users', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', $n . ' ' . $w)); ?>
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white"><?php echo esc_html(erekshe_field('banner_title', erekshe_t('teamTitle'))); ?></h1>
      </div>
    </div>
  </div>
  <div class="fade-in"><?php get_template_part('template-parts/section-team', null, ['with_heading' => false]); ?></div>
</div>
<?php get_footer();
