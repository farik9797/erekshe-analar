<?php
/**
 * Универсальный баннер страницы.
 * Аргументы через get_template_part(..., ['title'=>, 'desc'=>, 'badge'=>, 'icon'=>, 'gradient'=>, 'cta'=>bool]).
 */
if (!defined('ABSPATH')) exit;
$a = $args ?? [];
// Приоритет: ACF-поля баннера страницы → переданные args → заголовок записи
$title    = erekshe_field('banner_title', $a['title'] ?? get_the_title());
$desc     = erekshe_field('banner_desc',  $a['desc']  ?? '');
$badge    = erekshe_field('banner_badge', $a['badge'] ?? '');
$icon     = $a['icon']     ?? 'Sparkles';
$gradient = $a['gradient'] ?? 'from-teal-800 via-emerald-800 to-slate-900';
$cta      = $a['cta']      ?? true;
?>
<div class="max-w-7xl mx-auto px-4 pt-10">
  <div class="bg-gradient-to-br <?php echo esc_attr($gradient); ?> text-white rounded-3xl p-4 md:p-12 shadow-xl relative overflow-hidden">
    <div class="relative z-10 max-w-3xl">
      <?php if ($badge): ?>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon($icon, 'w-4 h-4'); ?><?php echo esc_html($badge); ?>
        </span>
      <?php endif; ?>
      <h1 class="text-[1.4rem] sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html($title); ?></h1>
      <?php if ($desc): ?><p class="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6"><?php echo esc_html($desc); ?></p><?php endif; ?>
      <?php if ($cta): ?>
        <?php
          // какое действие у кнопки баннера: consult | inforequest | umay | wa-list | enroll
          $cta_action = isset($args['cta_action']) ? $args['cta_action'] : 'consult';
          $cta_attr   = ['consult' => 'data-consult-open', 'inforequest' => 'data-inforequest-open', 'umay' => 'data-umay-open'];
          $attr       = isset($cta_attr[$cta_action]) ? $cta_attr[$cta_action] : 'data-enroll-open';
          $cta_label  = isset($args['cta_label']) ? $args['cta_label'] : erekshe_t('f_consultBtn');
        ?>
        <?php if ($cta_action === 'wa-list'):
          // список методистов филиалов — раскрывается по клику
          $methodists = [
            ['branch' => erekshe_t('b_MethAmanat', 'Аманат, 12/1'),    'phone' => '+7 (776) 163-95-21'],
            ['branch' => erekshe_t('b_MethSaryarka', 'Сарыарка, 48'),  'phone' => '+7 (705) 140-31-34'],
            ['branch' => erekshe_t('b_MethAkynSara', 'Акын Сара, 37'), 'phone' => '+7 (707) 754-55-52'],
          ]; ?>
          <div class="relative inline-block" data-wa-list>
            <button type="button" data-wa-list-toggle class="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg inline-flex items-center gap-2">
              <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html($cta_label); ?></span><?php echo erekshe_icon('ChevronDown', 'w-4 h-4'); ?>
            </button>
            <div data-wa-list-menu class="hidden absolute left-0 top-full mt-2 w-72 max-w-[85vw] bg-white rounded-2xl shadow-2xl border border-slate-200 p-2 z-20">
              <p class="px-3 py-2 text-[11px] font-bold uppercase tracking-wider text-slate-500"><?php echo esc_html(erekshe_t('b_MethodistsLabel', 'Методисты филиалов')); ?></p>
              <?php foreach ($methodists as $m): ?>
                <a href="https://wa.me/<?php echo esc_attr(preg_replace('/\D/', '', $m['phone'])); ?>" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-3 py-2.5 rounded-xl hover:bg-emerald-50 transition">
                  <?php echo erekshe_icon('MessageCircle', 'w-4 h-4 text-emerald-600 flex-shrink-0'); ?>
                  <span class="flex flex-col text-left">
                    <span class="text-xs text-slate-500"><?php echo esc_html($m['branch']); ?></span>
                    <span class="text-sm font-bold text-slate-900"><?php echo esc_html($m['phone']); ?></span>
                  </span>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php else: ?>
        <button type="button" <?php echo esc_attr($attr); ?> class="px-6 py-3 rounded-2xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-extrabold text-sm transition shadow-lg shadow-emerald-500/30 inline-flex items-center gap-2 cursor-pointer">
          <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html($cta_label); ?></span>
        </button>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
