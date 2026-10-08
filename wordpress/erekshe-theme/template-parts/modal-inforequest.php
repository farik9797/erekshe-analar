<?php if (!defined('ABSPATH')) exit;
// «Запрос на информацию и помощь» — заявка уходит методисту головного центра.
$branches  = function_exists('erekshe_get_rows') ? erekshe_get_rows('branches', erekshe_branches()) : erekshe_branches();
$interests = erekshe_form_list('info_interests');
$fieldCls  = 'w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500';
$labelCls  = 'text-sm font-bold text-slate-900 block mb-1';
?>
<div data-modal="inforequest" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-start justify-center overflow-y-auto p-4 sm:p-6">
  <div class="bg-white rounded-3xl w-full max-w-2xl my-8 shadow-2xl">
    <div class="p-6">
      <div class="flex items-start justify-between gap-4 mb-2">
        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold"><?php echo erekshe_icon('HelpCircle', 'w-4 h-4'); ?><?php echo esc_html(erekshe_t('f_infoBadge')); ?></span>
        <button type="button" data-modal-close aria-label="<?php echo esc_attr(erekshe_t('f_close')); ?>" style="width:2.25rem;height:2.25rem" class="rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center transition flex-shrink-0"><?php echo erekshe_icon('X', 'w-5 h-5'); ?></button>
      </div>
      <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-1"><?php echo esc_html(erekshe_t('f_infoTitle')); ?></h2>
      <p class="text-sm text-slate-600 mb-6"><?php echo esc_html(erekshe_t('f_infoSubtitle')); ?></p>

      <form class="flex flex-col gap-4" data-wa-form data-wa="77761639521" data-wa-title="<?php echo esc_attr(erekshe_t('f_infoTitle')); ?>">
        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_infoParent')); ?> *</label>
          <input type="text" required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_infoParent')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_infoParentPh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_phone')); ?> *</label>
          <input type="tel" required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_phone')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_phonePh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <label class="flex items-center gap-2 text-sm text-slate-700">
          <input type="checkbox" checked data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_whatsapp')); ?>" style="accent-color:#059669" class="w-4 h-4" />
          <?php echo esc_html(erekshe_t('f_whatsapp')); ?>
        </label>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_infoChild')); ?> *</label>
          <input type="text" required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_infoChild')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_infoChildPh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_infoAge')); ?> *</label>
          <input type="text" required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_infoAge')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_infoAgePh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_infoBranch')); ?> *</label>
          <select required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_infoBranch')); ?>" class="<?php echo $fieldCls; ?>">
            <?php foreach ($branches as $b): ?>
              <option value="<?php echo esc_attr($b['name'] . ' — ' . $b['address']); ?>"><?php echo esc_html($b['name'] . ' — ' . $b['address']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div>
          <span class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_infoInterests')); ?></span>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-1.5">
            <?php foreach ($interests as $it): ?>
              <label class="flex items-start gap-2 p-2 rounded-xl hover:bg-emerald-50 transition">
                <input type="checkbox" value="<?php echo esc_attr($it); ?>" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_infoInterests')); ?>" style="accent-color:#059669" class="w-4 h-4 mt-0.5" />
                <span class="text-xs text-slate-700"><?php echo esc_html($it); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_infoDiag')); ?></label>
          <textarea rows="2" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_infoDiag')); ?>"
                    placeholder="<?php echo esc_attr(erekshe_t('f_infoDiagPh')); ?>" class="<?php echo $fieldCls; ?>"></textarea>
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_infoComment')); ?></label>
          <textarea rows="2" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_infoComment')); ?>"
                    placeholder="<?php echo esc_attr(erekshe_t('f_infoCommentPh')); ?>" class="<?php echo $fieldCls; ?>"></textarea>
        </div>

        <button type="submit" class="w-full py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg transition flex items-center justify-center gap-2">
          <?php echo erekshe_icon('Send', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_t('f_infoSubmit')); ?></span>
        </button>
        <p class="text-xs text-slate-400 text-center"><?php echo esc_html(erekshe_t('f_consent')); ?></p>
      </form>
    </div>
  </div>
</div>
