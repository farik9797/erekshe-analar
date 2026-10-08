<?php if (!defined('ABSPATH')) exit;
// Заявка в Центр поддержки родителей UMAY — уходит в WhatsApp центра.
$who     = erekshe_form_list('umay_who');
$support = erekshe_form_list('umay_support');
$format  = erekshe_form_list('umay_format');
$fieldCls = 'w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500';
$labelCls = 'text-sm font-bold text-slate-900 block mb-1';
?>
<div data-modal="umay" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-start justify-center overflow-y-auto p-4 sm:p-6">
  <div class="bg-white rounded-3xl w-full max-w-2xl my-8 shadow-2xl">
    <div class="p-6">
      <div class="flex items-start justify-between gap-4 mb-2">
        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-rose-100 text-rose-700 text-xs font-bold"><?php echo erekshe_icon('HeartHandshake', 'w-4 h-4'); ?><?php echo esc_html(erekshe_t('f_umayBadge')); ?></span>
        <button type="button" data-modal-close aria-label="<?php echo esc_attr(erekshe_t('f_close')); ?>" style="width:2.25rem;height:2.25rem" class="rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center transition flex-shrink-0"><?php echo erekshe_icon('X', 'w-5 h-5'); ?></button>
      </div>
      <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-1"><?php echo esc_html(erekshe_t('f_umayTitle')); ?></h2>
      <p class="text-sm text-slate-600 mb-6"><?php echo esc_html(erekshe_t('f_umaySubtitle')); ?></p>

      <form class="flex flex-col gap-4" data-wa-form data-wa="77019241965" data-wa-title="<?php echo esc_attr(erekshe_t('f_umayTitle')); ?>">
        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_umayName')); ?> *</label>
          <input type="text" required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_umayName')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_umayNamePh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_phone')); ?> *</label>
          <input type="tel" required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_phone')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_phonePh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <label class="flex items-center gap-2 text-sm text-slate-700">
          <input type="checkbox" checked data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_whatsapp')); ?>" style="accent-color:#e11d48" class="w-4 h-4" />
          <?php echo esc_html(erekshe_t('f_whatsapp')); ?>
        </label>

        <div>
          <span class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_umayWho')); ?> *</span>
          <div class="flex flex-wrap gap-1.5">
            <?php foreach ($who as $w): ?>
              <label class="flex items-center gap-2 px-3 py-2 rounded-xl border border-slate-200 hover:bg-slate-50 transition">
                <input type="radio" name="umay-who" required value="<?php echo esc_attr($w); ?>" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_umayWho')); ?>" style="accent-color:#e11d48" class="w-4 h-4" />
                <span class="text-xs text-slate-700"><?php echo esc_html($w); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div>
          <span class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_umaySupport')); ?></span>
          <p class="text-xs text-slate-400 mb-1.5"><?php echo esc_html(erekshe_t('f_umaySupportHint')); ?></p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-1.5">
            <?php foreach ($support as $sp): ?>
              <label class="flex items-start gap-2 p-2 rounded-xl hover:bg-slate-50 transition">
                <input type="checkbox" value="<?php echo esc_attr($sp); ?>" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_umaySupport')); ?>" style="accent-color:#e11d48" class="w-4 h-4 mt-0.5" />
                <span class="text-xs text-slate-700"><?php echo esc_html($sp); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_umayQuestion')); ?></label>
          <textarea rows="2" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_umayQuestion')); ?>"
                    placeholder="<?php echo esc_attr(erekshe_t('f_umayQuestionPh')); ?>" class="<?php echo $fieldCls; ?>"></textarea>
        </div>

        <div>
          <span class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_umayFormat')); ?></span>
          <div class="flex flex-col gap-1">
            <?php foreach ($format as $fm): ?>
              <label class="flex items-start gap-2 p-2 rounded-xl hover:bg-slate-50 transition">
                <input type="radio" name="umay-format" value="<?php echo esc_attr($fm); ?>" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_umayFormat')); ?>" style="accent-color:#e11d48" class="w-4 h-4 mt-0.5" />
                <span class="text-xs text-slate-700"><?php echo esc_html($fm); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_umayWhen')); ?></label>
          <input type="text" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_umayWhen')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_umayWhenPh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <button type="submit" class="w-full py-3.5 rounded-xl text-sm font-bold text-white bg-rose-500 hover:bg-rose-400 shadow-lg transition flex items-center justify-center gap-2">
          <?php echo erekshe_icon('Sparkles', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_t('f_umaySubmit')); ?></span>
        </button>
        <p class="text-xs text-slate-400 text-center"><?php echo esc_html(erekshe_t('f_consent')); ?></p>
      </form>
    </div>
  </div>
</div>
