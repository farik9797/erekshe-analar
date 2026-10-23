<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/DocumentsSection.tsx (на «Документах» шапку заменяет баннер страницы)
$hide_header = !empty($args['hide_header']);
$doc_pages = ['doc-3' => 'rules'];
?>
<section id="documents" class="<?php echo $hide_header ? 'pt-8 pb-16 md:pt-10 md:pb-24' : 'py-16 md:py-24'; ?> bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <?php if (!$hide_header): ?>
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
        <?php echo erekshe_icon('ShieldCheck', 'w-4 h-4 text-emerald-600'); ?>
        <span><?php echo esc_html(erekshe_t('documentsBadge')); ?></span>
      </div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('documentsTitle')); ?></h2>
      <p class="text-slate-600 text-sm sm:text-base mt-3"><?php echo esc_html(erekshe_t('documentsDesc')); ?></p>
    </div>
    <?php endif; ?>

    <!-- flex + justify-center: одиночный документ стоит по центру, а не в левой половине -->
    <div class="flex flex-wrap justify-center gap-6">
      <?php foreach (erekshe_get_rows('documents', erekshe_documents()) as $d):
        $slug = $doc_pages[$d['id'] ?? ''] ?? '';
        $href = $slug ? erekshe_nav_url($slug) : ($d['fileUrl'] ?? '#'); ?>
        <div class="w-full md:w-[calc(50%_-_0.75rem)] bg-slate-50 hover:bg-emerald-50/50 p-6 rounded-3xl border border-slate-200/80 hover:border-emerald-300 transition-all flex items-start gap-4 group">
          <div class="w-12 h-12 rounded-2xl bg-white text-emerald-600 flex items-center justify-center flex-shrink-0 shadow-xs group-hover:bg-emerald-600 group-hover:text-white transition-colors"><?php echo erekshe_icon('FileText', 'w-6 h-6'); ?></div>
          <div class="flex-1 flex flex-col justify-between gap-3">
            <div>
              <div class="flex items-center justify-between gap-2 mb-1">
                <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-700 bg-emerald-100/80 px-2.5 py-0.5 rounded"><?php echo esc_html($d['category']); ?></span>
                <span class="text-[11px] font-medium text-slate-400"><?php echo esc_html($d['date']); ?> • <?php echo esc_html($d['fileSize']); ?></span>
              </div>
              <h3 class="text-base font-bold text-slate-900 leading-snug group-hover:text-emerald-800 transition-colors"><?php echo esc_html($d['title']); ?></h3>
            </div>
            <div class="flex items-center gap-2 pt-2 border-t border-slate-200/60">
              <a href="<?php echo esc_url($href); ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-slate-700 bg-white hover:bg-slate-200 transition border border-slate-200 cursor-pointer">
                <?php echo erekshe_icon('Eye', 'w-3.5 h-3.5 text-emerald-600'); ?>
                <span><?php echo esc_html(erekshe_t('btnViewDoc')); ?></span>
              </a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
