<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/InfoRequestModal.tsx — заявка уходит методисту выбранного филиала в WhatsApp.
$ru = erekshe_lang() !== 'kk';
$branches  = function_exists('erekshe_get_rows') ? erekshe_get_rows('branches', erekshe_branches()) : erekshe_branches();
$interests = erekshe_form_list('info_interests');
$inputCls = 'w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-base sm:text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition';
$labelCls = 'text-xs font-bold text-slate-700 mb-1.5 block';
$L = function ($r, $k) use ($ru) { return $ru ? $r : $k; };
?>
<div data-modal="inforequest" class="hidden fixed inset-0 z-[100] flex items-start justify-center p-0 sm:p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
  <div class="bg-white w-full sm:max-w-4xl sm:rounded-3xl shadow-2xl my-0 sm:my-auto relative">
    <button type="button" data-modal-close aria-label="<?php echo esc_attr($L('Закрыть', 'Жабу')); ?>" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition cursor-pointer z-10"><?php echo erekshe_icon('X', 'w-4 h-4'); ?></button>
    <div class="p-5 sm:p-8">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3 mr-10">
        <?php echo erekshe_icon('Info', 'w-3.5 h-3.5'); ?><?php echo esc_html($L('Центры EREKSHE ANALAR', 'EREKSHE ANALAR орталықтары')); ?>
      </span>
      <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight"><?php echo esc_html($L('Запрос на информацию и помощь', 'Ақпарат пен көмекке сұраныс')); ?></h2>
      <p class="text-xs sm:text-sm text-slate-500 mt-1 mb-4"><?php echo esc_html($L('Заполните форму, и наш методист свяжется с вами в течение 1 рабочего дня.', 'Нысанды толтырыңыз, әдіскеріміз 1 жұмыс күні ішінде сізбен хабарласады.')); ?></p>

      <form class="flex flex-col gap-3" data-wa-form data-wa-from="branch" data-wa-title="<?php echo esc_attr($L('Запрос на информацию и помощь', 'Ақпарат пен көмекке сұраныс')); ?>">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="<?php echo $labelCls; ?>" for="ir-parent"><?php echo esc_html($L('ФИО родителя / законного представителя', 'Ата-ананың / заңды өкілдің аты-жөні')); ?> *</label>
            <input id="ir-parent" type="text" required data-wa-field data-wa-label="<?php echo esc_attr($L('ФИО родителя', 'Ата-ананың аты-жөні')); ?>" placeholder="<?php echo esc_attr($L('ФИО родителя', 'Ата-ананың аты-жөні')); ?>" class="<?php echo $inputCls; ?>" />
          </div>
          <div>
            <label class="<?php echo $labelCls; ?>" for="ir-phone"><?php echo esc_html($L('Номер телефона', 'Телефон нөмірі')); ?> *</label>
            <input id="ir-phone" type="tel" required data-wa-field data-wa-label="Телефон" placeholder="+7 (700) 000-00-00" class="<?php echo $inputCls; ?>" />
            <label class="flex items-center gap-2 cursor-pointer mt-2">
              <input type="checkbox" checked data-wa-field data-wa-label="<?php echo esc_attr($L('Связь по WhatsApp', 'WhatsApp арқылы байланыс')); ?>" data-wa-yes="<?php echo esc_attr($L('да', 'иә')); ?>" data-wa-no="<?php echo esc_attr($L('нет', 'жоқ')); ?>" class="w-4 h-4 accent-emerald-600 cursor-pointer" />
              <span class="text-xs font-medium text-slate-700"><?php echo esc_html($L('Связаться со мной по WhatsApp', 'Менімен WhatsApp арқылы байланысыңыз')); ?></span>
            </label>
          </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="<?php echo $labelCls; ?>" for="ir-child"><?php echo esc_html($L('Имя ребёнка', 'Баланың аты')); ?> *</label>
            <input id="ir-child" type="text" required data-wa-field data-wa-label="<?php echo esc_attr($L('Имя ребёнка', 'Баланың аты')); ?>" placeholder="<?php echo esc_attr($L('Имя ребёнка', 'Баланың аты')); ?>" class="<?php echo $inputCls; ?>" />
          </div>
          <div>
            <label class="<?php echo $labelCls; ?>" for="ir-age"><?php echo esc_html($L('Возраст ребёнка', 'Баланың жасы')); ?> *</label>
            <input id="ir-age" type="text" required data-wa-field data-wa-label="<?php echo esc_attr($L('Возраст ребёнка', 'Баланың жасы')); ?>" placeholder="<?php echo esc_attr($L('Например: 5 лет', 'Мысалы: 5 жас')); ?>" class="<?php echo $inputCls; ?>" />
          </div>
        </div>
        <div>
          <label class="<?php echo $labelCls; ?>" for="ir-branch"><?php echo esc_html($L('Предпочтительный филиал в Астане', 'Астанадағы қалаулы филиал')); ?> *</label>
          <select id="ir-branch" required data-wa-branch data-wa-field data-wa-label="Филиал" class="<?php echo $inputCls; ?>">
            <option value="" disabled selected><?php echo esc_html($L('Выберите филиал', 'Филиалды таңдаңыз')); ?></option>
            <?php foreach ($branches as $b): ?>
              <option value="<?php echo esc_attr($b['name']); ?>" data-wa="<?php echo esc_attr(preg_replace('/\D/', '', $b['methodistPhone'])); ?>"><?php echo esc_html($b['name'] . ' — ' . $b['address']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <span class="<?php echo $labelCls; ?>"><?php echo esc_html($L('Что вас интересует?', 'Сізді не қызықтырады?')); ?></span>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-2">
            <?php foreach ($interests as $v): ?>
              <label class="flex items-start gap-2 px-2 py-1.5 rounded-xl hover:bg-emerald-50/60 transition cursor-pointer">
                <input type="checkbox" value="<?php echo esc_attr($v); ?>" data-wa-field data-wa-label="<?php echo esc_attr($L('Интересует', 'Қызықтырады')); ?>" class="w-4 h-4 mt-0.5 accent-emerald-600 cursor-pointer flex-shrink-0" />
                <span class="text-xs text-slate-700 leading-snug"><?php echo esc_html($v); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
          <div>
            <label class="<?php echo $labelCls; ?>" for="ir-diag"><?php echo esc_html($L('Диагноз или особенности развития ребёнка (кратко)', 'Диагноз немесе баланың даму ерекшеліктері (қысқаша)')); ?></label>
            <textarea id="ir-diag" rows="2" data-wa-field data-wa-label="<?php echo esc_attr($L('Диагноз / особенности', 'Диагноз / ерекшеліктері')); ?>" placeholder="<?php echo esc_attr($L('Кратко опишите особенности развития ребёнка', 'Баланың даму ерекшеліктерін қысқаша жазыңыз')); ?>" class="<?php echo $inputCls; ?> resize-none"></textarea>
          </div>
          <div>
            <label class="<?php echo $labelCls; ?>" for="ir-comment"><?php echo esc_html($L('Ваш вопрос или комментарий', 'Сұрағыңыз немесе пікіріңіз')); ?></label>
            <textarea id="ir-comment" rows="2" data-wa-field data-wa-label="<?php echo esc_attr($L('Вопрос', 'Сұрақ')); ?>" placeholder="<?php echo esc_attr($L('Напишите, какая информация вам необходима', 'Қандай ақпарат қажет екенін жазыңыз')); ?>" class="<?php echo $inputCls; ?> resize-none"></textarea>
          </div>
        </div>
        <button type="submit" class="w-full px-6 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-extrabold text-sm transition shadow-lg shadow-emerald-600/25 flex items-center justify-center gap-2 cursor-pointer">
          <?php echo erekshe_icon('Send', 'w-4 h-4'); ?><span><?php echo esc_html($L('Отправить запрос', 'Сұранысты жіберу')); ?></span>
        </button>
        <p class="text-[11px] text-slate-400 leading-relaxed text-center"><?php echo esc_html($L('Нажимая кнопку, вы соглашаетесь на обработку предоставленных персональных данных.', 'Түймені басу арқылы сіз ұсынылған дербес деректерді өңдеуге келісім бересіз.')); ?></p>
      </form>
    </div>
  </div>
</div>
