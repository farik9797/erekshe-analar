<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/UmayModal.tsx — заявка уходит в WhatsApp Центра UMAY.
$ru = erekshe_lang() !== 'kk';
$who     = erekshe_form_list('umay_who');
$support = erekshe_form_list('umay_support');
$format  = erekshe_form_list('umay_format');
$inputCls = 'w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-base sm:text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-rose-400 focus:border-rose-400 transition';
$labelCls = 'text-xs font-bold text-slate-700 mb-1.5 block';
$L = function ($r, $k) use ($ru) { return $ru ? $r : $k; };
?>
<div data-modal="umay" class="hidden fixed inset-0 z-[100] flex items-start justify-center p-0 sm:p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
  <div class="bg-white w-full sm:max-w-2xl sm:rounded-3xl shadow-2xl my-0 sm:my-auto relative">
    <button type="button" data-modal-close aria-label="<?php echo esc_attr($L('Закрыть', 'Жабу')); ?>" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition cursor-pointer z-10"><?php echo erekshe_icon('X', 'w-4 h-4'); ?></button>
    <div class="p-5 sm:p-8">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-rose-100 text-rose-800 text-xs font-bold mb-3 mr-10">
        <?php echo erekshe_icon('HeartHandshake', 'w-3.5 h-3.5'); ?><?php echo esc_html($L('Центр поддержки родителей UMAY', 'Ата-аналарды қолдау орталығы UMAY')); ?>
      </span>
      <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight"><?php echo esc_html($L('Заявка на бесплатную консультацию в Центре UMAY', 'UMAY орталығында тегін кеңеске өтінім')); ?></h2>
      <p class="text-xs sm:text-sm text-slate-500 mt-1 mb-5"><?php echo esc_html($L('Заполните форму, и наш специалист свяжется с вами в течение 1 рабочего дня.', 'Нысанды толтырыңыз, маманымыз 1 жұмыс күні ішінде сізбен хабарласады.')); ?></p>

      <form class="flex flex-col gap-4" data-wa-form data-wa="77019241965" data-wa-title="<?php echo esc_attr($L('Заявка на консультацию в Центре UMAY', 'UMAY орталығына кеңеске өтінім')); ?>">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
          <div>
            <label class="<?php echo $labelCls; ?>" for="um-name"><?php echo esc_html($L('ФИО заявителя', 'Өтініш берушінің аты-жөні')); ?> *</label>
            <input id="um-name" type="text" required data-wa-field data-wa-label="<?php echo esc_attr($L('ФИО заявителя', 'Өтініш берушінің аты-жөні')); ?>" placeholder="<?php echo esc_attr($L('Введите ваше имя и фамилию', 'Атыңыз бен тегіңізді енгізіңіз')); ?>" class="<?php echo $inputCls; ?>" />
          </div>
          <div>
            <label class="<?php echo $labelCls; ?>" for="um-phone"><?php echo esc_html($L('Номер телефона', 'Телефон нөмірі')); ?> *</label>
            <input id="um-phone" type="tel" required data-wa-field data-wa-label="Телефон" placeholder="+7 (700) 000-00-00" class="<?php echo $inputCls; ?>" />
          </div>
        </div>
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="checkbox" checked data-wa-field data-wa-label="<?php echo esc_attr($L('Связь по WhatsApp', 'WhatsApp арқылы байланыс')); ?>" data-wa-yes="<?php echo esc_attr($L('да', 'иә')); ?>" data-wa-no="<?php echo esc_attr($L('нет', 'жоқ')); ?>" class="w-4 h-4 accent-rose-600 cursor-pointer" />
          <span class="text-xs font-medium text-slate-700"><?php echo esc_html($L('Связаться со мной по WhatsApp', 'Менімен WhatsApp арқылы байланысыңыз')); ?></span>
        </label>
        <div>
          <span class="<?php echo $labelCls; ?>"><?php echo esc_html($L('Кто вы?', 'Сіз кімсіз?')); ?> *</span>
          <div class="flex flex-wrap gap-1.5">
            <?php foreach ($who as $v): ?>
              <label class="flex items-center gap-2 px-3 py-2 rounded-xl border border-slate-200 hover:bg-rose-50/60 transition cursor-pointer">
                <input type="radio" name="um-who" required value="<?php echo esc_attr($v); ?>" data-wa-field data-wa-label="<?php echo esc_attr($L('Кто вы', 'Сіз кімсіз')); ?>" class="w-4 h-4 accent-rose-600 cursor-pointer" />
                <span class="text-xs text-slate-700"><?php echo esc_html($v); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>
        <div>
          <span class="<?php echo $labelCls; ?>"><?php echo esc_html($L('Какая поддержка вас интересует?', 'Сізді қандай қолдау қызықтырады?')); ?></span>
          <p class="text-[11px] text-slate-400 mb-1.5"><?php echo esc_html($L('Можно выбрать несколько вариантов.', 'Бірнеше нұсқаны таңдауға болады.')); ?></p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-1.5">
            <?php foreach ($support as $v): ?>
              <label class="flex items-start gap-2 p-2 rounded-xl hover:bg-rose-50/60 transition cursor-pointer">
                <input type="checkbox" value="<?php echo esc_attr($v); ?>" data-wa-field data-wa-label="<?php echo esc_attr($L('Интересует поддержка', 'Қызықтыратын қолдау')); ?>" class="w-4 h-4 mt-0.5 accent-rose-600 cursor-pointer flex-shrink-0" />
                <span class="text-xs text-slate-700 leading-snug"><?php echo esc_html($v); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>
        <div>
          <label class="<?php echo $labelCls; ?>" for="um-question"><?php echo esc_html($L('Расскажите, с каким вопросом вы хотели бы обратиться', 'Қандай сұрақпен жүгінгіңіз келетінін жазыңыз')); ?></label>
          <textarea id="um-question" rows="2" data-wa-field data-wa-label="<?php echo esc_attr($L('Вопрос', 'Сұрақ')); ?>" placeholder="<?php echo esc_attr($L('Кратко опишите ваш запрос', 'Сұранысыңызды қысқаша сипаттаңыз')); ?>" class="<?php echo $inputCls; ?> resize-none"></textarea>
        </div>
        <div>
          <span class="<?php echo $labelCls; ?>"><?php echo esc_html($L('Какой формат вам удобнее?', 'Сізге қандай формат ыңғайлы?')); ?></span>
          <div class="flex flex-col gap-1">
            <?php foreach ($format as $v): ?>
              <label class="flex items-start gap-2 p-2 rounded-xl hover:bg-rose-50/60 transition cursor-pointer">
                <input type="radio" name="um-format" value="<?php echo esc_attr($v); ?>" data-wa-field data-wa-label="<?php echo esc_attr($L('Удобный формат', 'Қолайлы формат')); ?>" class="w-4 h-4 mt-0.5 accent-rose-600 cursor-pointer flex-shrink-0" />
                <span class="text-xs text-slate-700 leading-snug"><?php echo esc_html($v); ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>
        <div>
          <label class="<?php echo $labelCls; ?>" for="um-when"><?php echo esc_html($L('Когда вам удобно связаться?', 'Қашан хабарласу ыңғайлы?')); ?></label>
          <input id="um-when" type="text" data-wa-field data-wa-label="<?php echo esc_attr($L('Когда удобно связаться', 'Қашан хабарласу ыңғайлы')); ?>" placeholder="<?php echo esc_attr($L('Укажите удобный день и время', 'Ыңғайлы күн мен уақытты көрсетіңіз')); ?>" class="<?php echo $inputCls; ?>" />
        </div>
        <button type="submit" class="w-full px-6 py-3.5 rounded-2xl bg-rose-600 hover:bg-rose-500 text-white font-extrabold text-sm transition shadow-lg shadow-rose-600/25 flex items-center justify-center gap-2 cursor-pointer">
          <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html($L('Записаться на консультацию', 'Кеңеске жазылу')); ?></span>
        </button>
        <p class="text-[11px] text-slate-400 leading-relaxed text-center"><?php echo esc_html($L('Нажимая кнопку «Записаться на консультацию», вы соглашаетесь на обработку предоставленных персональных данных.', '«Кеңеске жазылу» түймесін басу арқылы сіз ұсынылған дербес деректерді өңдеуге келісім бересіз.')); ?></p>
      </form>
    </div>
  </div>
</div>
