<?php
/**
 * Template Name: Главная
 * front-page.php — главная страница EREKSHE ANALAR
 */
if (!defined('ABSPATH')) exit;
get_header();

$hero_img = erekshe_field('hero_image', erekshe_img('regenerated_image_1785993681411.webp'));
$about_img = erekshe_img('regenerated_image_1785993218212.webp');
?>

<!-- ==================== HERO ==================== -->
<section class="relative overflow-hidden bg-gradient-to-b from-emerald-50/70 via-white to-slate-50 py-5 md:py-20 border-b border-slate-100">
  <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-200/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="absolute bottom-0 left-0 w-80 h-80 bg-teal-200/20 rounded-full blur-3xl pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-[15px] sm:px-4 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      <div class="lg:col-span-7 flex flex-col gap-6 text-center lg:text-left">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100/90 text-emerald-900 border border-emerald-200 text-xs font-bold w-fit mx-auto lg:mx-0">
          <?php echo erekshe_icon('ShieldCheck', 'w-4 h-4 text-emerald-600'); ?>
          <span><?php echo esc_html(erekshe_field('hero_badge', erekshe_t('heroBadge'))); ?></span>
          <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
        </div>
        <h1 class="text-[1.9rem] sm:text-4xl lg:text-5xl font-extrabold text-slate-900 leading-tight tracking-tight">
          <?php echo esc_html(erekshe_field('hero_title', erekshe_t('heroTitle'))); ?>
        </h1>
        <p class="text-base sm:text-lg text-slate-600 font-normal leading-relaxed">
          <?php echo esc_html(erekshe_field('hero_desc', erekshe_t('heroDescription'))); ?>
        </p>
        <div class="flex flex-col items-center sm:flex-row sm:flex-wrap sm:items-center gap-3.5 pt-2">
          <button type="button" data-enroll-open class="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-6 py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg shadow-emerald-600/25 transition cursor-pointer">
            <?php echo erekshe_icon('Sparkles', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_t('heroCtaEnroll')); ?></span>
          </button>
          <a href="<?php echo esc_url(erekshe_nav_url('branches')); ?>" class="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-5 py-3.5 rounded-xl text-sm font-bold text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 transition shadow-xs">
            <?php echo erekshe_icon('MapPin', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('heroCtaBranches')); ?></span>
          </a>
          <a href="<?php echo esc_url(erekshe_nav_url('umay')); ?>" class="w-full justify-center text-center sm:w-auto flex items-center gap-2 px-5 py-3.5 rounded-xl text-sm font-bold text-amber-900 bg-amber-50 hover:bg-amber-100/80 border border-amber-200 transition">
            <?php echo erekshe_icon('Heart', 'w-4 h-4 text-amber-600'); ?><span><?php echo esc_html(erekshe_t('heroCtaUmay')); ?></span>
          </a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-4 border-t border-slate-200/60 justify-items-center lg:justify-items-start">
          <?php foreach ([erekshe_t('a_featFree'), erekshe_t('a_featIpr'), erekshe_t('a_featMothers')] as $b): ?>
            <div class="flex items-center gap-2 text-xs font-semibold text-slate-700">
              <?php echo erekshe_icon('CheckCircle2', 'w-4 h-4 text-emerald-600 flex-shrink-0'); ?><span><?php echo esc_html($b); ?></span>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="lg:col-span-5 relative">
        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100">
          <img src="<?php echo esc_url($hero_img); ?>" alt="<?php echo esc_attr(erekshe_t('a_heroImgAlt')); ?>" class="w-full h-[260px] sm:h-[360px] md:h-[420px] object-cover" />
          <div class="absolute bottom-4 left-4 right-4 bg-white/95 backdrop-blur-md rounded-2xl p-4 shadow-lg border border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center font-bold"><?php echo erekshe_icon('Award', 'w-5 h-5'); ?></div>
              <div><p class="text-xs font-bold text-slate-900"><?php echo esc_html(erekshe_t('astanaCity')); ?></p><p class="text-[11px] text-slate-500 font-medium"><?php echo esc_html(erekshe_t('a_branches4Social')); ?></p></div>
            </div>
            <a href="<?php echo esc_url(erekshe_nav_url('branches')); ?>" class="p-2 rounded-xl bg-emerald-600 text-white hover:bg-emerald-700 transition"><?php echo erekshe_icon('ArrowRight', 'w-4 h-4'); ?></a>
          </div>
        </div>
      </div>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-12">
      <?php foreach ([['1200+',erekshe_t('a_statChildrenRehab')],['4',erekshe_t('a_statBranchesAstana')],['45+',erekshe_t('a_statSpecialists')],['100%',erekshe_t('a_statFree')]] as $s): ?>
        <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-xs hover:border-emerald-200 transition">
          <p class="text-2xl sm:text-3xl font-extrabold text-emerald-700 tracking-tight"><?php echo esc_html($s[0]); ?></p>
          <p class="text-xs text-slate-600 font-medium mt-1"><?php echo esc_html($s[1]); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== О ФОНДЕ ==================== -->
<section class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('BookOpen', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('a_badgeAbout')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('a_aboutTitle')); ?></h2>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
      <div class="flex flex-col gap-6">
        <div class="bg-slate-50 rounded-3xl p-4 sm:p-6 border border-slate-100">
          <div class="flex items-center gap-4 mb-4"><div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center"><?php echo erekshe_icon('BookOpen', 'w-6 h-6'); ?></div><h3 class="text-xl font-bold text-slate-900"><?php echo esc_html(erekshe_t('aboutHistoryTitle')); ?></h3></div>
          <p class="text-sm text-slate-600 leading-relaxed"><?php echo esc_html(erekshe_t('aboutHistoryText')); ?></p>
        </div>
        <div class="bg-emerald-700 text-white rounded-3xl p-4 sm:p-6">
          <div class="flex items-center gap-4 mb-4"><div class="w-12 h-12 rounded-2xl bg-emerald-600 flex items-center justify-center"><?php echo erekshe_icon('Target', 'w-6 h-6'); ?></div><h3 class="text-xl font-bold"><?php echo esc_html(erekshe_t('aboutMissionTitle')); ?></h3></div>
          <p class="text-sm text-emerald-50 leading-relaxed"><?php echo esc_html(erekshe_t('aboutMissionText')); ?></p>
        </div>
      </div>
      <div class="relative rounded-3xl overflow-hidden shadow-xl border-4 border-white">
        <img src="<?php echo esc_url($about_img); ?>" alt="<?php echo esc_attr(erekshe_t('a_aboutImgAlt')); ?>" class="w-full h-[380px] object-cover" />
      </div>
    </div>
  </div>
</section>

<!-- ==================== УСЛУГИ (слайдер) ==================== -->
<section id="services" class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Sparkles', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('a_servicesBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('servicesTitle')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('servicesDesc')); ?></p>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 lg:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (array_slice(erekshe_services(), 0, 6) as $s): ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl hover:border-emerald-300 transition-all flex flex-col overflow-hidden group flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div class="relative h-48 overflow-hidden bg-slate-100">
            <img src="<?php echo esc_url(erekshe_img($s['image'])); ?>" alt="<?php echo esc_attr($s['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
            <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl flex items-center gap-2 shadow-xs"><?php echo erekshe_icon($s['iconName'], 'w-6 h-6 text-emerald-600'); ?><span class="text-xs font-bold text-slate-900"><?php echo esc_html($s['targetAge']); ?></span></div>
          </div>
          <div class="p-6 flex-1 flex flex-col justify-between gap-4">
            <div>
              <h3 class="text-xl font-bold text-slate-900 group-hover:text-emerald-700 transition-colors"><?php echo esc_html($s['title']); ?></h3>
              <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed line-clamp-3"><?php echo esc_html($s['shortDesc']); ?></p>
              <div class="mt-4 pt-3 border-t border-slate-100 flex flex-col gap-1.5">
                <p class="text-[11px] font-bold uppercase tracking-wider text-slate-500"><?php echo esc_html(erekshe_t('serviceIndications')); ?></p>
                <div class="flex flex-wrap gap-1.5">
                  <?php foreach (array_slice($s['indications'], 0, 3) as $ind): ?><span class="px-2 py-0.5 rounded-md bg-slate-100 text-slate-700 text-[11px] font-medium"><?php echo esc_html($ind); ?></span><?php endforeach; ?>
                  <?php if (count($s['indications']) > 3): ?><span class="text-[11px] font-bold text-emerald-600 py-0.5">+<?php echo count($s['indications']) - 3; ?></span><?php endif; ?>
                </div>
              </div>
            </div>
            <div class="flex items-center justify-between pt-3 border-t border-slate-100">
              <span class="flex items-center gap-1.5 text-xs font-semibold text-slate-500"><?php echo erekshe_icon('Clock', 'w-4 h-4'); ?><?php echo esc_html($s['duration']); ?></span>
              <a href="<?php echo esc_url(erekshe_nav_url('services')); ?>" class="flex items-center gap-1 text-xs font-bold text-emerald-700 hover:text-emerald-800 transition"><?php echo esc_html(erekshe_t('btnServiceDetails')); ?> <?php echo erekshe_icon('ChevronRight', 'w-4 h-4'); ?></a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="text-center mt-10"><a href="<?php echo esc_url(erekshe_nav_url('services')); ?>" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-emerald-600 text-white font-bold text-sm hover:bg-emerald-700 transition shadow-md"><?php echo esc_html(erekshe_t('filterAll')); ?> <?php echo erekshe_icon('ArrowRight', 'w-4 h-4'); ?></a></div>
  </div>
</section>

<!-- ==================== ФИЛИАЛЫ ==================== -->
<section id="branches" class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('MapPin', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('a_branchesBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('branchesTitle')); ?></h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
      <?php foreach (erekshe_branches() as $b): ?>
        <a href="<?php echo esc_url(erekshe_nav_url('branches')); ?>" class="p-4 rounded-2xl text-left transition border shadow-2xs flex flex-col justify-between bg-white text-slate-800 hover:bg-slate-100 border-slate-200">
          <div>
            <?php if (!empty($b['isHeadquarters'])): ?><span class="text-[10px] font-extrabold uppercase tracking-wider px-2 py-0.5 rounded-full mb-2 inline-block bg-emerald-100 text-emerald-800"><?php echo esc_html(erekshe_t('headquartersTag')); ?></span><?php endif; ?>
            <p class="font-bold text-xs sm:text-sm leading-tight"><?php echo esc_html($b['name']); ?></p>
          </div>
          <p class="text-[11px] font-medium mt-3 flex items-center gap-1 text-slate-500"><?php echo erekshe_icon('MapPin', 'w-3 h-3 flex-shrink-0'); ?><span class="truncate"><?php echo esc_html($b['address']); ?></span></p>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== КОМАНДА ==================== -->
<?php get_template_part('template-parts/section-team'); ?>

<!-- ==================== БЛАГОТВОРИТЕЛЬНОСТЬ ==================== -->
<section id="charity" class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Heart', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('a_charityBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('charityTitle')); ?></h2>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 sm:gap-8 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (erekshe_projects() as $p): $prog = $p['targetAmount'] ? min(100, round($p['currentAmount'] / $p['targetAmount'] * 100)) : 100; ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all overflow-hidden flex flex-col justify-between flex-shrink-0 w-[85vw] max-w-[400px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div class="relative h-56 bg-slate-100">
            <img src="<?php echo esc_url(erekshe_img($p['image'])); ?>" alt="<?php echo esc_attr($p['title']); ?>" class="w-full h-full object-cover" />
            <div class="absolute top-4 left-4"><span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider <?php echo $p['status'] === 'completed' ? 'bg-emerald-600 text-white' : 'bg-amber-500 text-slate-950 font-extrabold'; ?>"><?php echo $p['status'] === 'completed' ? erekshe_t('a_statusCompleted') : erekshe_t('projectStatusActive'); ?></span></div>
          </div>
          <div class="p-6 flex-1 flex flex-col justify-between gap-6">
            <div><h3 class="text-xl font-bold text-slate-900 leading-snug"><?php echo esc_html($p['title']); ?></h3><p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed"><?php echo esc_html($p['description']); ?></p></div>
            <div class="flex flex-col gap-2">
              <div class="flex items-center justify-between text-xs font-bold text-slate-700"><span><?php echo esc_html(erekshe_t('a_collected')); ?> <?php echo number_format($p['currentAmount'], 0, '', ' '); ?> ₸</span><span><?php echo esc_html(erekshe_t('a_goal')); ?> <?php echo number_format($p['targetAmount'], 0, '', ' '); ?> ₸</span></div>
              <div class="w-full h-3 bg-slate-100 rounded-full overflow-hidden border border-slate-200"><div class="h-full bg-gradient-to-r from-emerald-500 to-teal-600 rounded-full" style="width: <?php echo esc_attr($prog); ?>%"></div></div>
            </div>
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
              <div class="flex items-center gap-1.5 text-xs font-bold text-slate-600"><?php echo erekshe_icon('Users', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('projectBeneficiaries')); ?> <?php echo esc_html($p['beneficiariesCount']); ?></span></div>
              <button type="button" data-donation-open class="px-4 py-2.5 rounded-xl text-xs font-bold text-white bg-emerald-600 hover:bg-emerald-700 transition flex items-center gap-1.5 shadow-md"><?php echo erekshe_icon('HeartHandshake', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('btnSupportProject')); ?></span></button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== НОВОСТИ ==================== -->
<section class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Newspaper', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('newsBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('newsTitle')); ?></h2>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (erekshe_news() as $n): ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs hover:shadow-xl transition-all overflow-hidden flex flex-col justify-between group flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div class="relative h-48 bg-slate-100"><img src="<?php echo esc_url(erekshe_img($n['image'])); ?>" alt="<?php echo esc_attr($n['title']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" /><div class="absolute top-4 left-4"><span class="px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-wider bg-emerald-600 text-white"><?php echo esc_html($n['badge']); ?></span></div></div>
          <div class="p-6 flex-1 flex flex-col justify-between gap-4">
            <div>
              <div class="flex items-center gap-1.5 text-slate-400 text-xs font-semibold mb-2"><?php echo erekshe_icon('Calendar', 'w-3.5 h-3.5'); ?><?php echo esc_html($n['date']); ?></div>
              <h3 class="text-base font-bold text-slate-900 leading-snug group-hover:text-emerald-700 transition"><?php echo esc_html($n['title']); ?></h3>
              <p class="text-xs sm:text-sm text-slate-600 mt-2 leading-relaxed line-clamp-3"><?php echo esc_html($n['summary']); ?></p>
            </div>
            <a href="<?php echo esc_url(erekshe_nav_url('news')); ?>" class="flex items-center gap-1.5 text-xs font-bold text-emerald-700 hover:text-emerald-800 transition"><?php echo esc_html(erekshe_t('btnReadMore')); ?> <?php echo erekshe_icon('ArrowRight', 'w-4 h-4'); ?></a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== ОТЗЫВЫ ==================== -->
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('Quote', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('a_reviewsBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('reviewsTitle')); ?></h2>
    </div>
    <div class="flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid sm:grid-cols-2 md:grid-cols-3 sm:gap-6 sm:overflow-visible sm:pb-0 scrollbar-none">
      <?php foreach (erekshe_reviews() as $r): ?>
        <div class="bg-white rounded-3xl border border-slate-200/80 p-6 shadow-xs hover:shadow-xl transition-all flex flex-col justify-between gap-6 relative flex-shrink-0 w-[85vw] max-w-[340px] sm:w-auto sm:max-w-none snap-center sm:snap-none">
          <div>
            <div class="flex items-center justify-between gap-3 mb-4">
              <div class="flex items-center gap-3">
                <img src="<?php echo esc_url($r['avatar']); ?>" alt="<?php echo esc_attr($r['parentName']); ?>" class="w-12 h-12 rounded-full object-cover border border-slate-200" />
                <div><p class="font-bold text-slate-900 text-sm"><?php echo esc_html($r['parentName']); ?></p><p class="text-xs text-slate-500"><?php echo esc_html($r['childAgeDiagnosis']); ?></p></div>
              </div>
              <div class="flex items-center gap-0.5 text-amber-400"><?php for ($i=0;$i<intval($r['rating']);$i++) echo erekshe_icon('Star', 'w-4 h-4 fill-amber-400'); ?></div>
            </div>
            <p class="text-sm text-slate-600 leading-relaxed italic">«<?php echo esc_html($r['text']); ?>»</p>
          </div>
          <div class="bg-emerald-50/70 rounded-2xl p-3"><p class="text-[11px] font-bold uppercase tracking-wider text-emerald-700 mb-1"><?php echo esc_html(erekshe_t('reviewResultLabel')); ?></p><p class="text-xs font-bold text-slate-800"><?php echo esc_html($r['result']); ?></p></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== FAQ ==================== -->
<section id="faq" class="fade-in py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-4xl mx-auto px-4">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('HelpCircle', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('faqBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('faqTitle')); ?></h2>
    </div>
    <div class="flex flex-col gap-3">
      <?php foreach (erekshe_faqs() as $i => $f): ?>
        <div data-faq class="rounded-2xl border transition-all <?php echo $i === 0 ? 'bg-emerald-50/50 border-emerald-300 shadow-sm' : 'bg-slate-50/80 border-slate-200'; ?>">
          <button type="button" data-faq-toggle class="w-full p-5 text-left font-bold text-slate-900 text-sm sm:text-base flex items-center justify-between gap-4">
            <span><?php echo esc_html($f['question']); ?></span>
            <div class="p-1.5 rounded-xl transition shrink-0 <?php echo $i === 0 ? 'bg-emerald-600 text-white' : 'bg-white text-slate-500'; ?>"><?php echo erekshe_icon('ChevronDown', 'w-4 h-4'); ?></div>
          </button>
          <div data-faq-body class="px-5 pb-5 pt-1 text-xs sm:text-sm text-slate-700 leading-relaxed border-t border-emerald-100/60 font-medium <?php echo $i === 0 ? '' : 'hidden'; ?>"><?php echo esc_html($f['answer']); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== ПАРТНЁРЫ ==================== -->
<section class="fade-in py-16 md:py-24 bg-slate-50 border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('HeartHandshake', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('a_partnersBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-3xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('partnersTitle')); ?></h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      <?php foreach (erekshe_partners() as $p): ?>
        <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs hover:border-emerald-300 transition flex flex-col items-center text-center justify-center gap-2">
          <p class="font-extrabold text-emerald-800 text-sm"><?php echo esc_html($p['logoText']); ?></p>
          <p class="text-[11px] text-slate-500"><?php echo esc_html($p['desc']); ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ==================== КОНТАКТЫ ==================== -->
<?php $phone = erekshe_opt('phone', '+7 (7172) 70-80-90'); $email = erekshe_opt('email', 'info@ereksheanalar.kz'); $wa_num = erekshe_opt('whatsapp_num', '+7 (708) 425-12-12'); ?>
<section class="fade-in py-16 md:py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('PhoneCall', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('contactBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('contactTitle')); ?></h2>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <div class="bg-slate-900 text-white p-4 sm:p-8 rounded-3xl shadow-xl">
        <p class="text-emerald-400 text-xs font-bold uppercase tracking-wider mb-2"><?php echo esc_html(erekshe_t('contactHeadquarters')); ?></p>
        <h3 class="text-2xl font-extrabold mb-6"><?php echo esc_html(erekshe_t('donationOrgName')); ?></h3>
        <div class="flex flex-col gap-4">
          <?php
          $contacts = [
            ['MapPin', erekshe_t('a_addressHqLabel'), erekshe_t('a_hqAddress')],
            ['Clock', erekshe_t('a_scheduleLabel'), erekshe_t('workingHours')],
            ['Phone', erekshe_t('contactPhoneTitle'), $phone],
            ['MessageCircle', erekshe_t('a_whatsappBranchesLabel'), $wa_num],
            ['Mail', erekshe_t('contactEmailTitle'), $email],
            ['Instagram', 'Instagram:', '@erekshe_analar_astana'],
          ];
          foreach ($contacts as $c): ?>
            <div class="flex items-start gap-3"><?php echo erekshe_icon($c[0], 'w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5'); ?><div><p class="text-xs font-bold text-slate-400 uppercase tracking-wider"><?php echo esc_html($c[1]); ?></p><p class="text-sm font-bold text-white mt-0.5"><?php echo esc_html($c[2]); ?></p></div></div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="bg-slate-50 p-4 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-center items-center text-center gap-4">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold"><?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('a_appointmentBadge')); ?></span></div>
        <h3 class="text-2xl font-extrabold text-slate-900"><?php echo esc_html(erekshe_t('formTitle')); ?></h3>
        <p class="text-sm text-slate-600"><?php echo esc_html(erekshe_t('formSubtitle')); ?></p>
        <button type="button" data-enroll-open class="w-full py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg transition flex items-center justify-center gap-2"><?php echo erekshe_icon('Send', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_t('btnEnroll')); ?></span></button>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
