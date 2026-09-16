<?php if (!defined('ABSPATH')) exit;
$sections = erekshe_standards();
$L = erekshe_lang();
$footnote = ($L === 'kk')
  ? 'Қазақстан Республикасының ресми мемлекеттік стандартының мәтіні келтірілген. Толық редакциясы «Әділет» ақпараттық-құқықтық жүйесінде жарияланады.'
  : 'Приведён текст официального государственного стандарта Республики Казахстан. Полная редакция публикуется в информационно-правовой системе «Әділет».';
?>
<section class="fade-in bg-slate-50 py-10">
  <div class="max-w-4xl mx-auto px-4">
    <a href="<?php echo esc_url(erekshe_nav_url('documents')); ?>" class="inline-flex items-center gap-1.5 text-xs font-bold text-slate-500 hover:text-emerald-700 transition mb-4">
      <?php echo erekshe_icon('ArrowLeft', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('rulesBackToDocs')); ?></span>
    </a>

    <!-- Hero -->
    <div class="bg-gradient-to-r from-slate-900 via-emerald-950 to-slate-900 text-white rounded-3xl p-5 md:p-12 shadow-xl mb-8">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4"><?php echo erekshe_icon('ShieldCheck', 'w-4 h-4'); ?><?php echo esc_html(erekshe_t('standardsBadge')); ?></span>
      <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-3"><?php echo esc_html(erekshe_t('standardsTitle')); ?></h1>
      <p class="text-slate-200 text-sm md:text-lg leading-relaxed max-w-2xl mb-3"><?php echo esc_html(erekshe_t('standardsDesc')); ?></p>
      <p class="text-emerald-200/80 text-xs font-medium"><?php echo esc_html(erekshe_standards_source()); ?></p>
    </div>

    <!-- Controls -->
    <div class="flex items-center justify-between gap-3 mb-4">
      <span class="text-xs font-bold text-slate-500"><?php echo count($sections); ?> <?php echo esc_html(erekshe_t('rulesSectionsLabel')); ?></span>
      <button type="button" data-rules-expand class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-emerald-800 bg-emerald-100/80 hover:bg-emerald-200 transition">
        <?php echo erekshe_icon('ChevronDown', 'w-3.5 h-3.5'); ?><span data-rules-expand-label><?php echo esc_html(erekshe_t('rulesExpandAll')); ?></span>
      </button>
    </div>

    <!-- Accordion -->
    <div class="space-y-3" data-rules
         data-label-expand="<?php echo esc_attr(erekshe_t('rulesExpandAll')); ?>"
         data-label-collapse="<?php echo esc_attr(erekshe_t('rulesCollapseAll')); ?>">
      <?php foreach ($sections as $i => $s): ?>
        <div data-rule class="bg-white rounded-2xl border border-slate-200/80 shadow-2xs overflow-hidden">
          <button type="button" data-rule-toggle class="w-full flex items-center gap-3 p-4 sm:p-5 text-left hover:bg-emerald-50/40 transition">
            <span class="w-9 h-9 flex-shrink-0 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center"><?php echo erekshe_icon('FileCheck', 'w-4 h-4'); ?></span>
            <h2 class="flex-1 text-sm sm:text-base font-bold text-slate-900 leading-snug"><?php echo esc_html($s['title']); ?></h2>
            <?php echo erekshe_icon('ChevronDown', 'w-5 h-5 text-emerald-600 flex-shrink-0 transition-transform duration-200'); ?>
          </button>
          <div data-rule-body class="px-4 sm:px-5 pb-5 pt-1 flex-col gap-3 border-t border-slate-100 <?php echo $i === 0 ? 'flex' : 'hidden'; ?>">
            <?php foreach ($s['clauses'] as $c): ?>
              <div class="text-sm text-slate-700 leading-relaxed">
                <p><?php if (!empty($c['n'])): ?><span class="font-bold text-emerald-700"><?php echo esc_html($c['n']); ?>. </span><?php endif; ?><?php echo esc_html($c['text']); ?></p>
                <?php if (!empty($c['bullets'])): ?>
                  <ul class="mt-2 flex flex-col gap-1.5 pl-1">
                    <?php foreach ($c['bullets'] as $b): ?>
                      <li class="flex items-start gap-2"><span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-emerald-400 flex-shrink-0"></span><span><?php echo esc_html($b); ?></span></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Footnote -->
    <div class="mt-8 flex items-start gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200/70">
      <?php echo erekshe_icon('ShieldCheck', 'w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5'); ?>
      <p class="text-xs text-emerald-900/80 leading-relaxed"><?php echo esc_html($footnote); ?></p>
    </div>
  </div>
</section>
