<?php /**
 * Template Name: EREKSHE — Филиалы
 * 1:1 с src/pages/BranchesPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header(); $kk = erekshe_lang() === 'kk';
$methodists = [
  ['Аманат, 12/1', '+7 (776) 163-95-21'],
  [$kk ? 'Сарыарқа, 48' : 'Сарыарка, 48', '+7 (705) 140-31-34'],
  [$kk ? 'Ақын Сара, 37' : 'Акын Сара, 37', '+7 (707) 754-55-52'],
]; ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-emerald-800 via-teal-800 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon('MapPin', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', erekshe_t('astanaCity') . ' (3 ' . ($kk ? 'филиал' : 'филиала') . ')')); ?>
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', erekshe_t('branchesTitle'))); ?></h1>
        <p class="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6"><?php echo esc_html(erekshe_field('banner_desc', erekshe_t('branchesDesc'))); ?></p>
        <div class="relative inline-block" data-wa-list>
          <button type="button" data-wa-list-toggle class="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer">
            <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('btnEnroll')); ?></span><?php echo erekshe_icon('ChevronDown', 'w-4 h-4 transition-transform'); ?>
          </button>
          <div data-wa-list-menu class="hidden absolute left-0 top-full mt-2 w-72 max-w-[85vw] bg-white rounded-2xl shadow-2xl border border-slate-200 p-2 z-20">
            <p class="px-3 py-2 text-[11px] font-bold uppercase tracking-wider text-slate-500"><?php echo esc_html($kk ? 'Филиал әдіскерлері' : 'Методисты филиалов'); ?></p>
            <?php foreach ($methodists as $m): ?>
              <a href="https://wa.me/<?php echo esc_attr(preg_replace('/\D/', '', $m[1])); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-emerald-50 transition cursor-pointer">
                <?php echo erekshe_icon('MessageCircle', 'w-4 h-4 text-emerald-600 flex-shrink-0'); ?>
                <span class="flex flex-col text-left">
                  <span class="text-xs text-slate-500"><?php echo esc_html($m[0]); ?></span>
                  <span class="text-sm font-bold text-slate-900"><?php echo esc_html($m[1]); ?></span>
                </span>
              </a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fade-in"><?php get_template_part('template-parts/section-branches', null, ['hide_header' => true]); ?></div>
</div>
<?php get_footer();
