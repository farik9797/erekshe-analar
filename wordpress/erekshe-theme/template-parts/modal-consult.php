<?php if (!defined('ABSPATH')) exit;
// «Консультация по центру» — заявка уходит в WhatsApp выбранного филиала.
$branches = function_exists('erekshe_get_rows') ? erekshe_get_rows('branches', erekshe_branches()) : erekshe_branches();
$topics   = erekshe_form_list('consult_topics');
$fieldCls = 'w-full px-4 py-3 rounded-xl bg-slate-50 border border-slate-200 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500';
$labelCls = 'text-sm font-bold text-slate-900 block mb-1';
?>
<div data-modal="consult" class="hidden fixed inset-0 bg-slate-950/75 backdrop-blur-sm z-50 flex items-start justify-center overflow-y-auto p-4 sm:p-6">
  <div class="bg-white rounded-3xl w-full max-w-2xl my-8 shadow-2xl">
    <div class="p-6">
      <div class="flex items-start justify-between gap-4 mb-2">
        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold"><?php echo erekshe_icon('MapPin', 'w-4 h-4'); ?><?php echo esc_html(erekshe_t('f_consultBadge')); ?></span>
        <button type="button" data-modal-close aria-label="<?php echo esc_attr(erekshe_t('f_close')); ?>" style="width:2.25rem;height:2.25rem" class="rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 flex items-center justify-center transition flex-shrink-0"><?php echo erekshe_icon('X', 'w-5 h-5'); ?></button>
      </div>
      <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mb-1"><?php echo esc_html(erekshe_t('f_consultTitle')); ?></h2>
      <p class="text-sm text-slate-600 mb-6"><?php echo esc_html(erekshe_t('f_consultSubtitle')); ?></p>

      <form class="flex flex-col gap-4" data-wa-form data-wa-from="branch" data-wa-title="<?php echo esc_attr(erekshe_t('f_consultTitle')); ?>">
        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_consultName')); ?> *</label>
          <input type="text" required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_consultName')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_consultNamePh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_phone')); ?> *</label>
          <input type="tel" required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_phone')); ?>"
                 placeholder="<?php echo esc_attr(erekshe_t('f_phonePh')); ?>" class="<?php echo $fieldCls; ?>" />
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_consultBranch')); ?> *</label>
          <select required data-wa-branch data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_consultBranch')); ?>" class="<?php echo $fieldCls; ?>">
            <option value="" disabled selected><?php echo esc_html(erekshe_t('f_consultBranch')); ?></option>
            <?php foreach ($branches as $b): ?>
              <option value="<?php echo esc_attr($b['name']); ?>" data-wa="<?php echo esc_attr(preg_replace('/\D/', '', $b['whatsapp'])); ?>">
                <?php echo esc_html($b['name'] . ' — ' . $b['address']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_consultTopic')); ?> *</label>
          <select required data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_consultTopic')); ?>" class="<?php echo $fieldCls; ?>">
            <option value="" disabled selected><?php echo esc_html(erekshe_t('f_consultTopicPh')); ?></option>
            <?php foreach ($topics as $tpc): ?>
              <option value="<?php echo esc_attr($tpc); ?>"><?php echo esc_html($tpc); ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div>
          <label class="<?php echo $labelCls; ?>"><?php echo esc_html(erekshe_t('f_consultComment')); ?></label>
          <textarea rows="3" data-wa-field data-wa-label="<?php echo esc_attr(erekshe_t('f_consultComment')); ?>"
                    placeholder="<?php echo esc_attr(erekshe_t('f_consultCommentPh')); ?>" class="<?php echo $fieldCls; ?>"></textarea>
        </div>

        <button type="submit" class="w-full py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg transition flex items-center justify-center gap-2">
          <?php echo erekshe_icon('Send', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_t('f_consultSubmit')); ?></span>
        </button>
        <p class="text-xs text-slate-400 text-center"><?php echo esc_html(erekshe_t('f_consent')); ?></p>
      </form>
    </div>
  </div>
</div>
