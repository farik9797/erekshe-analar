<?php /**
 * Template Name: EREKSHE — Центр UMAY
 * 1:1 с src/pages/UmayPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header(); $kk = erekshe_lang() === 'kk';
// направления: [иконка, классы плашки иконки, заголовок, текст]
$dirs = $kk ? [
  ['Sun', 'bg-rose-100 text-rose-700', 'Психологиялық кеңес беру', 'Үрейді, эмоционалды шаршау синдромын және ауыр өмірлік жағдайларды жеңу үшін тәжірибелі психологтармен жеке сессиялар.'],
  ['Sparkles', 'bg-purple-100 text-purple-700', 'Арт-терапия және шығармашылық', 'Ресурстық шеберлік сыныптары, арт-терапиялық топтар, арт-медиация арқылы бұлшықет пен психологиялық қысымды жеңілдету.'],
  ['Users', 'bg-emerald-100 text-emerald-700', 'Өзара қолдау топтары', 'Ерекше балалардың басқа аналарымен қауіпсіз қарым-қатынас кеңістігі, тәжірибе алмасу, бірлескен іс-шаралар және достық атмосфера.'],
  ['Shield', 'bg-blue-100 text-blue-700', 'Заңгерлік кеңес', 'Жәрдемақылар, мемлекеттік жеңілдіктер, тұрғын үй субсидиялары және құжаттарды рәсімдеу мәселелері бойынша білікті заңгерлердің көмегі.'],
  ['BookOpen', 'bg-amber-100 text-amber-700', 'Оқыту дәрістері мен тренингтер', 'Баланы үйде оңалтуды сүйемелдеу, дамытушы ойындар мен тұрмыстық бейімділік бойынша семинарлар.'],
  ['MessageSquare', 'bg-teal-100 text-teal-700', 'Әлеуметтік бейімдеу', 'Аналар мен олардың балалары үшін мәдени сапарлар, бірлескен мерекелер, отбасылық пикниктер мен экскурсиялар ұйымдастыру.'],
] : [
  ['Sun', 'bg-rose-100 text-rose-700', 'Психологическое консультирование', 'Индивидуальные сессии с опытными психологами для преодоления тревоги, синдрома эмоционального выгорания и тяжелых жизненных состояний.'],
  ['Sparkles', 'bg-purple-100 text-purple-700', 'Арт-терапия и творчество', 'Ресурсные мастер-классы, арт-терапевтические группы, снятие мышечных и психологических зажимов через арт-медиации.'],
  ['Users', 'bg-emerald-100 text-emerald-700', 'Группы взаимоподдержки', 'Безопасное пространство общения с другими мамами особых детей, обмен опытом, совместные мероприятия и дружеская атмосфера.'],
  ['Shield', 'bg-blue-100 text-blue-700', 'Юридическая консультация', 'Помощь квалифицированных юристов по вопросам пособий, государственных льгот, жилищных субсидий и оформления документов.'],
  ['BookOpen', 'bg-amber-100 text-amber-700', 'Обучающие лекции и тренинги', 'Семинары по домашнему сопровождению реабилитации ребенка, развивающим играм и бытовой адаптированности.'],
  ['MessageSquare', 'bg-teal-100 text-teal-700', 'Социальная адаптация', 'Организация культурных выездов, совместных праздников, семейных пикников и экскурсий для мам и их детей.'],
]; ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-rose-900 via-teal-900 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl relative overflow-hidden">
        <div class="relative z-10 max-w-3xl">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-500/20 text-rose-200 text-xs font-bold border border-rose-400/30 mb-4">
            <?php echo erekshe_icon('Heart', 'w-4 h-4 text-rose-400 fill-rose-400'); ?><?php echo esc_html(erekshe_field('banner_badge', erekshe_t('umayBadge'))); ?>
          </span>
          <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', erekshe_t('umayTitle'))); ?></h1>
          <p class="text-slate-200 text-base md:text-lg leading-relaxed mb-6"><?php echo esc_html(erekshe_field('banner_desc', erekshe_t('umayDesc'))); ?></p>
          <div class="flex flex-wrap items-center gap-4">
            <button type="button" data-umay-open class="px-6 py-3 rounded-2xl bg-rose-500 hover:bg-rose-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-rose-500/30 flex items-center gap-2 cursor-pointer">
              <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html($kk ? 'UMAY Орталығына жазылу' : 'Записаться в Центр UMAY'); ?></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="fade-in">
    <section class="max-w-7xl mx-auto px-4">
      <div class="bg-white rounded-3xl p-4 md:p-12 shadow-sm border border-slate-100">
        <div class="text-center max-w-2xl mx-auto mb-10">
          <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 mb-3"><?php echo esc_html($kk ? 'UMAY Орталығының негізгі бағыттары' : 'Основные направления Центра UMAY'); ?></h2>
          <p class="text-slate-600 text-sm"><?php echo esc_html($kk ? 'Аналардың эмоционалды денсаулығы мен ресурстық жағдайын қолдауға кешенді әдіс' : 'Комплексный подход к поддержке эмоционального здоровья и ресурсного состояния матерей'); ?></p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($dirs as $d): ?>
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-emerald-200 transition">
              <div class="w-10 h-10 rounded-xl <?php echo esc_attr($d[1]); ?> flex items-center justify-center font-bold mb-4"><?php echo erekshe_icon($d[0], 'w-5 h-5'); ?></div>
              <h3 class="font-bold text-slate-900 text-lg mb-2"><?php echo esc_html($d[2]); ?></h3>
              <p class="text-xs text-slate-600 leading-relaxed"><?php echo esc_html($d[3]); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>
</div>
<?php get_footer();
