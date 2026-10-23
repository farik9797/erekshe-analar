<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/ConsultModal.tsx — заявка уходит консультанту выбранного филиала в WhatsApp.
$ru = erekshe_lang() !== 'kk';
$branches = function_exists('erekshe_get_rows') ? erekshe_get_rows('branches', erekshe_branches()) : erekshe_branches();
$topics   = erekshe_form_list('consult_topics');
$inputCls = 'w-full px-4 py-2.5 rounded-xl border border-slate-200 bg-slate-50 text-base sm:text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:border-emerald-400 transition';
$labelCls = 'text-xs font-bold text-slate-700 mb-1.5 block';
$L = function ($r, $k) use ($ru) { return $ru ? $r : $k; };
?>
<div data-modal="consult" class="hidden fixed inset-0 z-[100] flex items-start justify-center p-0 sm:p-4 bg-slate-950/60 backdrop-blur-sm overflow-y-auto">
  <div class="bg-white w-full sm:max-w-xl sm:rounded-3xl shadow-2xl my-0 sm:my-auto relative">
    <button type="button" data-modal-close aria-label="<?php echo esc_attr($L('Закрыть', 'Жабу')); ?>" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 flex items-center justify-center transition cursor-pointer z-10"><?php echo erekshe_icon('X', 'w-4 h-4'); ?></button>
    <div class="p-5 sm:p-8">
      <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3 mr-10">
        <?php echo erekshe_icon('MapPin', 'w-3.5 h-3.5'); ?><?php echo esc_html($L('Центры EREKSHE ANALAR в Астане', 'Астанадағы EREKSHE ANALAR орталықтары')); ?>
      </span>
      <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight"><?php echo esc_html($L('Консультация по центру', 'Орталық бойынша кеңес')); ?></h2>
      <p class="text-xs sm:text-sm text-slate-500 mt-1 mb-5"><?php echo esc_html($L('Заполните форму — заявка уйдёт консультанту выбранного филиала в WhatsApp.', 'Нысанды толтырыңыз — өтінім таңдалған филиал кеңесшісіне WhatsApp арқылы жіберіледі.')); ?></p>

      <form class="flex flex-col gap-4" data-wa-form data-wa-from="branch" data-wa-title="<?php echo esc_attr($L('Консультация по центру', 'Орталық бойынша кеңес')); ?>">
        <div>
          <label class="<?php echo $labelCls; ?>" for="cs-name"><?php echo esc_html($L('Фамилия и имя', 'Тегі және аты')); ?> *</label>
          <input id="cs-name" type="text" required data-wa-field data-wa-label="<?php echo esc_attr($L('Фамилия и имя', 'Тегі және аты')); ?>" placeholder="<?php echo esc_attr($L('Введите фамилию и имя', 'Тегі мен атыңызды енгізіңіз')); ?>" class="<?php echo $inputCls; ?>" />
        </div>
        <div>
          <label class="<?php echo $labelCls; ?>" for="cs-phone"><?php echo esc_html($L('Номер телефона', 'Телефон нөмірі')); ?> *</label>
          <input id="cs-phone" type="tel" required data-wa-field data-wa-label="Телефон" placeholder="+7 (700) 000-00-00" class="<?php echo $inputCls; ?>" />
        </div>
        <div>
          <label class="<?php echo $labelCls; ?>" for="cs-branch"><?php echo esc_html($L('Выберите филиал', 'Филиалды таңдаңыз')); ?> *</label>
          <select id="cs-branch" required data-wa-branch data-wa-field data-wa-label="Филиал" class="<?php echo $inputCls; ?>">
            <option value="" disabled selected><?php echo esc_html($L('Выберите филиал', 'Филиалды таңдаңыз')); ?></option>
            <?php foreach ($branches as $b): ?>
              <option value="<?php echo esc_attr($b['name']); ?>" data-wa="<?php echo esc_attr(preg_replace('/\D/', '', $b['whatsapp'])); ?>"><?php echo esc_html($b['name'] . ' — ' . $b['address']); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label class="<?php echo $labelCls; ?>" for="cs-topic"><?php echo esc_html($L('Что вас интересует?', 'Сізді не қызықтырады?')); ?> *</label>
          <select id="cs-topic" required data-wa-field data-wa-label="<?php echo esc_attr($L('Вопрос', 'Сұрақ')); ?>" class="<?php echo $inputCls; ?>">
            <option value="" disabled selected><?php echo esc_html($L('Выберите вопрос', 'Сұрақты таңдаңыз')); ?></option>
            <?php foreach ($topics as $tpc): ?>
              <option value="<?php echo esc_attr($tpc); ?>"><?php echo esc_html($tpc); ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div>
          <label class="<?php echo $labelCls; ?>" for="cs-comment"><?php echo esc_html($L('Ваш вопрос / комментарий', 'Сұрағыңыз / пікіріңіз')); ?></label>
          <textarea id="cs-comment" rows="3" data-wa-field data-wa-label="<?php echo esc_attr($L('Комментарий', 'Пікір')); ?>" placeholder="<?php echo esc_attr($L('Напишите подробнее, что вас интересует', 'Сізді не қызықтыратынын толығырақ жазыңыз')); ?>" class="<?php echo $inputCls; ?> resize-none"></textarea>
        </div>
        <button type="submit" class="w-full px-6 py-3.5 rounded-2xl bg-emerald-600 hover:bg-emerald-500 text-white font-extrabold text-sm transition shadow-lg shadow-emerald-600/25 flex items-center justify-center gap-2 cursor-pointer">
          <?php echo erekshe_icon('Send', 'w-4 h-4'); ?><span><?php echo esc_html($L('Отправить заявку', 'Өтінім жіберу')); ?></span>
        </button>
        <p class="text-[11px] text-slate-400 leading-relaxed text-center"><?php echo esc_html($L('Нажимая кнопку, вы соглашаетесь на обработку предоставленных персональных данных.', 'Түймені басу арқылы сіз ұсынылған дербес деректерді өңдеуге келісім бересіз.')); ?></p>
      </form>
    </div>
  </div>
</div>
