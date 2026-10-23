<?php /**
 * Template Name: EREKSHE — О фонде
 * 1:1 с src/pages/AboutPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header();
$kk = erekshe_lang() === 'kk';
$wa = 'https://wa.me/77053089733?text=' . rawurlencode($kk
  ? 'Сәлеметсіз бе! EREKSHE ANALAR қорына кеңеске жазылғым келеді.'
  : 'Здравствуйте! Хочу записаться на консультацию в фонд EREKSHE ANALAR.');
$stats = [
  ['emerald', 'Users',     '1 200+',                        $kk ? 'Бала оңалту қызметтерін алды' : 'Детей получили реабилитационные услуги'],
  ['teal',    'Building2', erekshe_t('branchesCountShort'), $kk ? 'Астананың басты аудандарында' : 'В ключевых районах Астаны'],
  ['blue',    'Award',     '32',                            $kk ? 'Сертификатталған маман' : 'Сертифицированных специалиста'],
  ['amber',   'Heart',     '100%',                          $kk ? 'Тегін мемлекеттік арнайы әлеуметтік қызметтер' : 'Бесплатные государственные социальные услуги'],
];
// полные имена классов для сборщика Tailwind
$stat_cls = [
  'emerald' => ['bg-emerald-50/60 border border-emerald-100', 'bg-emerald-600', 'text-emerald-900', 'text-emerald-800'],
  'teal'    => ['bg-teal-50/60 border border-teal-100', 'bg-teal-600', 'text-teal-900', 'text-teal-800'],
  'blue'    => ['bg-blue-50/60 border border-blue-100', 'bg-blue-600', 'text-blue-900', 'text-blue-800'],
  'amber'   => ['bg-amber-50/60 border border-amber-100', 'bg-amber-600', 'text-amber-900', 'text-amber-800'],
];
?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-emerald-800 via-teal-800 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-emerald-500/10 rounded-full filter blur-3xl pointer-events-none"></div>
        <div class="relative z-10 max-w-3xl">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
            <?php echo erekshe_icon('Award', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', $kk ? '«EREKSHE ANALAR» Қоғамдық қоры' : 'Общественный фонд «EREKSHE ANALAR»')); ?>
          </span>
          <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', $kk ? 'Қорымыз бен көмек философиясы туралы' : 'О нашем фонде и философии помощи')); ?></h1>
          <p class="text-slate-200 text-base md:text-lg leading-relaxed mb-6"><?php echo esc_html(erekshe_field('banner_desc', $kk
            ? '«Erekshe Analar» қоғамдық қоры ерекше қажеттіліктері бар балаларға және олардың отбасыларына кешенді қолдау көрсетеді. Орталықтарда арнайы әлеуметтік және оңалту қызметтері, мамандармен сабақтар және басқа да қолдау түрлері ұсынылады.'
            : 'Общественный фонд «Erekshe Analar» оказывает комплексную поддержку детям с особыми потребностями и их семьям. В центрах предоставляются специальные социальные и реабилитационные услуги, занятия со специалистами и другие виды поддержки.')); ?></p>
          <div class="flex flex-wrap items-center gap-4">
            <a href="<?php echo esc_url($wa); ?>" target="_blank" rel="noopener noreferrer" class="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 flex items-center gap-2 cursor-pointer">
              <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html($kk ? 'Орталыққа қалай түсуге болады?' : 'Как попасть в центр?'); ?></span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="fade-in"><?php get_template_part('template-parts/section-about'); ?></div>

  <div class="fade-in">
    <section class="max-w-7xl mx-auto px-4">
      <div class="bg-white rounded-3xl p-4 md:p-10 shadow-sm border border-slate-100">
        <div class="text-center max-w-2xl mx-auto mb-10">
          <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-3"><?php echo esc_html($kk ? 'Қор жұмысының негізгі көрсеткіштері' : 'Ключевые показатели работы фонда'); ?></h2>
          <p class="text-slate-600 text-sm"><?php echo esc_html($kk ? 'Астана қаласындағы 3 оңалту орталығымыздың нақты жұмыс нәтижелері' : 'Реальные результаты работы наших 3 реабилитационных центров в городе Астана'); ?></p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
          <?php foreach ($stats as $st): $c = $stat_cls[$st[0]]; ?>
            <div class="<?php echo esc_attr($c[0]); ?> p-6 rounded-2xl text-center">
              <div class="w-12 h-12 <?php echo esc_attr($c[1]); ?> text-white rounded-2xl mx-auto flex items-center justify-center font-bold mb-3 shadow-md"><?php echo erekshe_icon($st[1], 'w-6 h-6'); ?></div>
              <div class="text-3xl font-black <?php echo esc_attr($c[2]); ?> mb-1"><?php echo esc_html($st[2]); ?></div>
              <div class="text-xs font-semibold <?php echo esc_attr($c[3]); ?>"><?php echo esc_html($st[3]); ?></div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>

  <div class="fade-in"><?php get_template_part('template-parts/section-documents'); ?></div>
  <div class="fade-in"></div>
</div>
<?php get_footer();
