<?php /**
 * Template Name: EREKSHE — Маршрут
 * 1:1 с src/pages/ProcessPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header(); $kk = erekshe_lang() === 'kk';
$docs = $kk ? [
  ['Ата-ананың / қамқоршының жеке куәлігі', 'Сәйкестендіру үшін көшірмесі мен түпнұсқасы'],
  ['Баланың туу туралы куәлігі', 'Баланың ЖСН бар куәлігінің көшірмесі'],
  ['Мүгедектік туралы анықтама немесе ПМПК қорытындысы', 'Уәкілетті органның ұсынымдары бар растаушы құжат'],
  ['Медициналық карта (027/у немесе 052/у нысаны)', 'Учаскелік емханадан үзінді көшірме'],
] : [
  ['Удостоверение личности родителя / опекуна', 'Копия и оригинал для сверки данных'],
  ['Свидетельство о рождении ребенка', 'Копия свидетельства с ИИН ребенка'],
  ['Справка об инвалидности или заключение ПМПК', 'Подтверждающий документ с рекомендациями'],
  ['Медицинская карта (форма 027/у или 052/у)', 'Выписка из участковой поликлиники'],
]; ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-emerald-900 via-teal-900 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon('Map', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', $kk ? 'Ата-аналарға арналған қадамдық нұсқаулық' : 'Пошаговое руководство для родителей')); ?>
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', erekshe_t('processTitle'))); ?></h1>
        <p class="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6"><?php echo esc_html(erekshe_field('banner_desc', erekshe_t('processDesc'))); ?></p>
      </div>
    </div>
  </div>
  <div class="fade-in"><?php get_template_part('template-parts/section-process'); ?></div>
  <div class="fade-in">
    <section class="max-w-7xl mx-auto px-4">
      <div class="bg-white rounded-3xl p-4 md:p-10 shadow-sm border border-slate-100">
        <div class="max-w-2xl mb-8">
          <h2 class="text-2xl font-extrabold text-slate-900 mb-2"><?php echo esc_html($kk ? 'Қабылдауға қажетті құжаттар' : 'Документы, необходимые для зачисления'); ?></h2>
          <p class="text-slate-600 text-sm"><?php echo esc_html($kk
            ? 'Мемлекеттік бағдарлама бойынша тегін оңалту курсын рәсімдеу үшін мына құжаттар пакетін дайындаңыз:'
            : 'Для оформления бесплатного курса реабилитации по государственной программе подготовите следующий пакет документов:'); ?></p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-xs font-medium text-slate-700">
          <?php foreach ($docs as $d): ?>
            <div class="p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-start gap-3">
              <?php echo erekshe_icon('FileText', 'w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5'); ?>
              <div>
                <p class="font-bold text-slate-900 text-sm mb-1"><?php echo esc_html($d[0]); ?></p>
                <p class="text-slate-500"><?php echo esc_html($d[1]); ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
</div>
<?php get_footer();
