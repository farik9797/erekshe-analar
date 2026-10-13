/* Проверка: уходит ли заявка на WhatsApp своего филиала.

   Как пользоваться:
     1. Открыть любую страницу сайта (например /services или /branches).
     2. Открыть консоль браузера: F12 → вкладка Console.
     3. Вставить весь этот файл, нажать Enter.

   Скрипт сам находит все формы с выбором филиала, по очереди подставляет
   каждый филиал и показывает номер, на который ушла бы заявка.
   НИЧЕГО не отправляется — отправка перехватывается. */
(async () => {
  const realOpen = window.open;
  let url = null;
  window.open = (u) => { url = u; return null; };

  const set = (el, v) => {
    const P = el.tagName === 'SELECT' ? HTMLSelectElement
            : el.tagName === 'TEXTAREA' ? HTMLTextAreaElement
            : HTMLInputElement;
    Object.getOwnPropertyDescriptor(P.prototype, 'value').set.call(el, v);
    el.dispatchEvent(new Event(el.tagName === 'SELECT' ? 'change' : 'input', { bubbles: true }));
  };
  const pause = (ms) => new Promise((r) => setTimeout(r, ms));

  // кнопки, открывающие формы с выбором филиала (RU и КАЗ)
  const OPENERS = /Узнать об услугах|Консультация по центру|Записаться в этот филиал|Қызметтер туралы білу|Орталық бойынша кеңес|Осы филиалға жазылу/i;

  const liveForm = () => {
    const f = document.querySelector('form');
    return f && f.querySelector('select') ? f : null;
  };
  const closeForm = () => {
    document.querySelectorAll('button').forEach((b) => {
      const a = (b.getAttribute('aria-label') || '') + b.className;
      if (/close|Закрыть|Жабу/i.test(a)) b.click();
    });
    document.body.click();
  };

  // все разные кнопки на странице, открывающие такую форму
  const buttons = [];
  document.querySelectorAll('button').forEach((b) => {
    const label = (b.textContent || '').replace(/\s+/g, ' ').trim();
    if (OPENERS.test(label) && !buttons.some((x) => x.label === label)) buttons.push({ el: b, label });
  });
  if (!buttons.length) {
    console.warn('На этой странице нет кнопок, открывающих форму с выбором филиала.');
    window.open = realOpen;
    return;
  }

  const openBy = async (btn) => {
    if (liveForm()) { closeForm(); await pause(400); }
    btn.scrollIntoView({ block: 'center' });
    btn.click();
    await pause(800);
    return liveForm();
  };

  const report = [];
  for (const b of buttons) {
    let form = await openBy(b.el);
    if (!form) { console.warn('Форма не открылась по кнопке:', b.label); continue; }

    const title = (form.closest('div')?.parentElement?.querySelector('h2, h3')?.textContent || b.label).trim();
    const opts = [...form.querySelector('select').options].filter((o) => o.value);
    const rows = [];

    for (const o of opts) {
      form = await openBy(b.el);
      const sels = [...form.querySelectorAll('select')];
      form.querySelectorAll('input').forEach((el) => {
        if (el.type !== 'checkbox' && el.type !== 'radio') set(el, el.type === 'tel' ? '+7 700 000 00 00' : 'тест');
      });
      set(sels[0], o.value);
      if (sels[1] && sels[1].options[1]) set(sels[1], sels[1].options[1].value); // тема обращения, если есть
      await pause(150);
      url = null;
      form.requestSubmit();
      await pause(300);
      rows.push({
        'Филиал': o.textContent.split('—')[0].trim(),
        'Заявка уйдёт на': url ? '+' + (url.match(/wa\.me\/(\d+)/) || [])[1] : '— НЕ УШЛА',
      });
    }

    console.log('%c' + title + '   (кнопка: ' + b.label + ')', 'font-weight:bold;font-size:13px');
    console.table(rows);
    const nums = rows.map((r) => r['Заявка уйдёт на']);
    if (nums.includes('— НЕ УШЛА')) console.log('❌ Заявка не ушла — форма ничего не отправляет.');
    else if (new Set(nums).size !== nums.length) console.log('⚠️ Повторяющиеся номера — филиалы ведут на один WhatsApp!');
    else console.log('✅ У каждого филиала свой номер.');
    report.push({ форма: title, строки: rows });
  }

  closeForm();
  window.open = realOpen;
  window.__waRouting = report;
})();
