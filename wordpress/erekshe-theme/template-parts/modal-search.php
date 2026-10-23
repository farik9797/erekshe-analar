<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/SearchModal.tsx — мгновенный поиск по услугам, филиалам,
// новостям, документам, специалистам и FAQ (совпадение по ru и kk, вывод на языке страницы).
$L  = erekshe_lang();
$kk = $L === 'kk';

// Данные обоих языков: как в React, ищем сразу по ru и kk
$prev = $GLOBALS['__erekshe_lang_override'] ?? null;
$D = [];
foreach (['ru', 'kk'] as $l) {
  $GLOBALS['__erekshe_lang_override'] = $l;
  $D[$l] = ['services' => erekshe_services(), 'branches' => erekshe_branches(), 'news' => erekshe_news(),
            'documents' => erekshe_documents(), 'specialists' => erekshe_specialists(), 'faqs' => erekshe_faqs()];
}
if ($prev === null) unset($GLOBALS['__erekshe_lang_override']); else $GLOBALS['__erekshe_lang_override'] = $prev;
$cur = $D[$kk ? 'kk' : 'ru'];
$ru  = $D['ru'];
$kz  = $D['kk'];
$join = function ($a) { return is_array($a) ? implode(' ', $a) : (string) $a; };

$u_services = erekshe_nav_url('services');
$index = [];
foreach ($cur['services'] as $i => $s) {
  $r = $ru['services'][$i] ?? $s; $k = $kz['services'][$i] ?? $s;
  $index[] = ['t' => 'service', 'c' => 'services', 'svc' => 'svc-' . $i, 'u' => $u_services . '#svc-' . $i,
    'f' => [$r['title'], $k['title'], $r['shortDesc'] . ' ' . $r['fullDesc'], $k['shortDesc'] . ' ' . $k['fullDesc'],
            $join($r['indications'] ?? []) . ' ' . $join($k['indications'] ?? [])],
    'h' => $s['title'], 'd' => $s['shortDesc'], 'b' => $kk ? 'Қызмет' : 'Услуга'];
}
foreach ($cur['branches'] as $i => $b) {
  $r = $ru['branches'][$i] ?? $b; $k = $kz['branches'][$i] ?? $b;
  $index[] = ['t' => 'branch', 'c' => 'branches', 'u' => erekshe_nav_url('branches'),
    'f' => [$r['name'], $k['name'], $r['address'], $k['address'], $join($r['features'] ?? []) . ' ' . $join($k['features'] ?? [])],
    'h' => $b['name'], 'd' => $b['address'] . ' • ' . $b['district'], 'b' => 'Филиал'];
}
foreach ($cur['news'] as $i => $n) {
  $r = $ru['news'][$i] ?? $n; $k = $kz['news'][$i] ?? $n;
  $index[] = ['t' => 'news', 'c' => 'news', 'u' => erekshe_nav_url('news'),
    'f' => [$r['title'], $k['title'], $r['summary'], $k['summary']],
    'h' => $n['title'], 'd' => $n['date'] . ' — ' . $n['summary'], 'b' => $kk ? 'Жаңалық' : 'Новость'];
}
foreach ($cur['documents'] as $i => $d) {
  $r = $ru['documents'][$i] ?? $d; $k = $kz['documents'][$i] ?? $d;
  $index[] = ['t' => 'document', 'c' => 'documents', 'u' => erekshe_nav_url('documents'),
    'f' => [$r['title'], $k['title'], $r['category'], $k['category']],
    'h' => $d['title'], 'd' => $d['category'] . ' (' . $d['fileSize'] . ')', 'b' => $kk ? 'Құжат' : 'Документ'];
}
foreach ($cur['specialists'] as $i => $p) {
  $r = $ru['specialists'][$i] ?? $p; $k = $kz['specialists'][$i] ?? $p;
  $index[] = ['t' => 'specialist', 'c' => 'specialists', 'u' => erekshe_nav_url('team'),
    'f' => [$r['name'], $k['name'], $r['role'], $k['role'], $r['bio']],
    'h' => $p['name'], 'd' => $p['role'], 'b' => $kk ? 'Маман' : 'Специалист'];
}
foreach ($cur['faqs'] as $i => $q) {
  $r = $ru['faqs'][$i] ?? $q; $k = $kz['faqs'][$i] ?? $q;
  $index[] = ['t' => 'faq', 'c' => 'faq', 'u' => erekshe_nav_url('reviews-faq'),
    'f' => [$r['question'], $k['question'], $r['answer'], $k['answer']],
    'h' => $q['question'], 'd' => $q['answer'], 'b' => 'FAQ'];
}

$chips = [
  [erekshe_t('searchChipLogoped'), 'логопед'], [erekshe_t('searchChipPool'), 'бассейн'], ['Сарыарка', 'сарыарка'],
  [erekshe_t('searchChipGalo'), 'галокамера'], [erekshe_t('searchChipPmpk'), 'ПМПК'], [erekshe_t('searchChipLfk'), 'ЛФК'],
  [erekshe_t('searchChipUmay'), 'UMAY'], [erekshe_t('searchChipDefectolog'), 'дефектолог'],
];
$cats = [
  ['all', $kk ? 'Барлық нәтижелер' : 'Все результаты'], ['services', $kk ? 'Қызметтер' : 'Услуги'],
  ['branches', $kk ? 'Филиалдар' : 'Филиалы'], ['news', $kk ? 'Жаңалықтар' : 'Новости'],
  ['documents', $kk ? 'Құжаттар' : 'Документы'], ['specialists', $kk ? 'Мамандар' : 'Специалисты'], ['faq', 'FAQ'],
];
$c_base = 'px-3 py-1 rounded-full whitespace-nowrap transition cursor-pointer ';
$c_on   = 'bg-emerald-600 text-white font-bold shadow-xs';
$c_off  = 'bg-white text-slate-600 hover:bg-slate-200';
$icons = [
  'service' => ['Activity', 'text-emerald-600'], 'branch' => ['MapPin', 'text-teal-600'], 'news' => ['Newspaper', 'text-blue-600'],
  'document' => ['FileText', 'text-amber-600'], 'specialist' => ['User', 'text-purple-600'], 'faq' => ['HelpCircle', 'text-rose-600'],
];
?>
<div data-modal="search" class="hidden fixed inset-0 z-50 flex items-start justify-center pt-4 sm:pt-16 px-3 sm:px-4 bg-slate-950/70 backdrop-blur-sm animate-fadeIn">
  <div class="w-full max-w-3xl max-h-[92vh] flex flex-col bg-white rounded-3xl shadow-2xl overflow-hidden border border-slate-100">
    <div class="p-4 sm:p-5 border-b border-slate-100 bg-slate-50/80 flex items-center gap-3">
      <div class="w-10 h-10 rounded-2xl bg-emerald-100 text-emerald-700 flex items-center justify-center flex-shrink-0"><?php echo erekshe_icon('Search', 'w-5 h-5'); ?></div>
      <input data-search-input type="text" autocomplete="off" placeholder="<?php echo esc_attr($kk ? 'Қызметтерді, филиалдарды, жаңалықтарды іздеу...' : 'Поиск услуг, филиалов, новостей, документов...'); ?>" class="w-full text-sm sm:text-base font-medium text-slate-900 bg-transparent outline-none placeholder:text-slate-400" />
      <button type="button" data-search-clear class="hidden p-2 rounded-xl text-slate-400 hover:text-slate-700 hover:bg-slate-200/60 transition cursor-pointer"><?php echo erekshe_icon('X', 'w-4 h-4'); ?></button>
      <button type="button" data-modal-close class="px-3 py-1.5 rounded-xl text-xs font-bold text-slate-600 bg-white border border-slate-200 hover:bg-slate-100 transition flex items-center gap-1.5 cursor-pointer flex-shrink-0"><span>ESC</span></button>
    </div>

    <div data-search-cats class="hidden px-4 py-2 bg-slate-100/70 border-b border-slate-200/60 flex items-center gap-2 overflow-x-auto text-xs font-semibold">
      <?php echo erekshe_icon('Filter', 'w-3.5 h-3.5 text-slate-400 flex-shrink-0'); ?>
      <?php foreach ($cats as $i => $c): ?>
        <button type="button" data-search-cat="<?php echo esc_attr($c[0]); ?>" data-cls-base="<?php echo esc_attr($c_base); ?>" data-cls-on="<?php echo esc_attr($c_on); ?>" data-cls-off="<?php echo esc_attr($c_off); ?>" class="<?php echo esc_attr($c_base . ($i === 0 ? $c_on : $c_off)); ?>"><?php echo esc_html($c[1]); ?></button>
      <?php endforeach; ?>
    </div>

    <!-- Тело: JS оставляет в нём только нужные блоки (как условный рендер в React) -->
    <div data-search-body class="max-h-[60vh] overflow-y-auto p-4 sm:p-6 space-y-3">
      <div data-search-empty class="space-y-6 py-2">
        <div>
          <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-3"><?php echo esc_html($kk ? 'Танымал сұраныстар' : 'Популярные запросы'); ?></p>
          <div class="flex flex-wrap gap-2">
            <?php foreach ($chips as $ch): ?>
              <button type="button" data-search-chip="<?php echo esc_attr($ch[1]); ?>" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-emerald-50 hover:text-emerald-800 text-slate-700 text-xs font-semibold border border-slate-200/80 transition flex items-center gap-1.5 cursor-pointer">
                <?php echo erekshe_icon('Sparkles', 'w-3.5 h-3.5 text-emerald-600'); ?><span><?php echo esc_html($ch[0]); ?></span>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="bg-emerald-50/60 border border-emerald-100 rounded-2xl p-4 flex items-start gap-3">
          <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold flex-shrink-0 mt-0.5"><?php echo erekshe_icon('Search', 'w-4 h-4'); ?></div>
          <div>
            <p class="text-xs font-bold text-emerald-950 mb-1"><?php echo esc_html($kk ? 'Портал бойынша жылдам іздеу' : 'Быстрый поиск по всему порталу'); ?></p>
            <p class="text-xs text-emerald-800 leading-relaxed"><?php echo esc_html($kk
              ? 'Процедура атауын, диагнозды, филиал мекенжайын немесе сұрақ тақырыбын енгізіңіз.'
              : 'Вводите название процедуры, диагноз, адрес филиала или тему вопроса (например, логомассаж, ДЦП, ПМПК, Сарыарка).'); ?></p>
          </div>
        </div>
      </div>

      <div data-search-count class="flex items-center justify-between text-xs font-semibold text-slate-500 pb-1 border-b border-slate-100">
        <span><?php echo esc_html($kk ? 'Іздеу нәтижелері' : 'Результаты поиска'); ?>: <span data-search-num>0</span></span>
        <span><?php echo esc_html($kk ? 'Өту үшін элементті басыңыз' : 'Нажмите на элемент для перехода'); ?></span>
      </div>

      <div data-search-results class="space-y-2"></div>

      <div data-search-none class="text-center py-12 px-4 space-y-3">
        <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-700 flex items-center justify-center mx-auto font-bold"><?php echo erekshe_icon('Search', 'w-6 h-6'); ?></div>
        <h3 class="text-sm sm:text-base font-extrabold text-slate-900"><?php echo esc_html($kk ? 'Ештеңе табылмады' : 'Ничего не найдено'); ?></h3>
        <p data-search-none-text data-pre="<?php echo esc_attr($kk ? '«' : 'По запросу «'); ?>" data-post="<?php echo esc_attr($kk ? '» сұранысы бойынша ештеңе табылмады.' : '» ничего не найдено. Попробуйте изменить формулировку или выбрать из популярных вариантов.'); ?>" class="text-xs text-slate-500 max-w-sm mx-auto"></p>
      </div>
    </div>

    <div class="px-6 py-3 bg-slate-100/80 border-t border-slate-200/60 flex items-center justify-between text-[11px] font-semibold text-slate-500">
      <div class="flex items-center gap-2">
        <kbd class="px-1.5 py-0.5 bg-white border border-slate-300 rounded shadow-2xs font-mono text-slate-700">ESC</kbd>
        <span><?php echo esc_html($kk ? 'жабу' : 'закрыть'); ?></span>
      </div>
      <span><?php echo esc_html($kk ? 'EREKSHE ANALAR қоғамдық қоры' : 'Общественный фонд EREKSHE ANALAR'); ?></span>
    </div>
  </div>

  <!-- Шаблон строки результата и иконки типов (заполняет JS через textContent) -->
  <template data-search-row>
    <a href="#" class="group p-3.5 rounded-2xl bg-slate-50 hover:bg-emerald-50/80 border border-slate-100 hover:border-emerald-200 transition cursor-pointer flex items-start justify-between gap-3">
      <div class="flex items-start gap-3">
        <div data-row-icon class="p-2 rounded-xl bg-white border border-slate-200/80 shadow-xs group-hover:bg-emerald-100 transition mt-0.5"></div>
        <div>
          <div class="flex items-center gap-2 mb-1">
            <span data-row-badge class="text-xs font-extrabold px-2 py-0.5 rounded bg-slate-200 text-slate-700 group-hover:bg-emerald-200 group-hover:text-emerald-900 transition"></span>
            <h4 data-row-title class="text-xs sm:text-sm font-bold text-slate-900 group-hover:text-emerald-900 transition"></h4>
          </div>
          <p data-row-desc class="text-xs text-slate-600 line-clamp-2 leading-relaxed"></p>
        </div>
      </div>
      <div class="self-center text-slate-400 group-hover:text-emerald-700 transition transform group-hover:translate-x-1"><?php echo erekshe_icon('ArrowRight', 'w-4 h-4'); ?></div>
    </a>
  </template>
  <?php foreach ($icons as $type => $ic): ?>
    <template data-search-icon="<?php echo esc_attr($type); ?>"><?php echo erekshe_icon($ic[0], 'w-4 h-4 ' . $ic[1]); ?></template>
  <?php endforeach; ?>
  <script type="application/json" data-search-index><?php echo wp_json_encode($index, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP); ?></script>
</div>
