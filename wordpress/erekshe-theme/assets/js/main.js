/**
 * EREKSHE ANALAR — интерактив темы (vanilla JS).
 * Порт логики из React: мобильное меню, доступность, модалки, FAQ, наверх, fade-in.
 */
(function () {
  'use strict';
  var root = document.documentElement;
  var $ = function (s, c) { return (c || document).querySelector(s); };
  var $$ = function (s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); };

  document.addEventListener('DOMContentLoaded', function () {

    /* ---------- Мобильное меню ---------- */
    var menu = $('[data-mobile-menu]');
    $$('[data-menu-toggle]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        if (!menu) return;
        var open = menu.classList.toggle('hidden') === false;
        var io = $('[data-menu-icon-open]', btn), ic = $('[data-menu-icon-close]', btn);
        if (io && ic) { io.classList.toggle('hidden', open); ic.classList.toggle('hidden', !open); }
      });
    });
    // кнопки в меню (консультация, поиск, поддержка) закрывают его, как в React
    if (menu) $$('button', menu).forEach(function (b) {
      b.addEventListener('click', function () {
        menu.classList.add('hidden');
        $$('[data-menu-icon-open]').forEach(function (i) { i.classList.remove('hidden'); });
        $$('[data-menu-icon-close]').forEach(function (i) { i.classList.add('hidden'); });
      });
    });

    /* ---------- Панель доступности ---------- */
    var bar = $('[data-a11y-bar]');
    $$('[data-a11y-toggle]').forEach(function (b) {
      b.addEventListener('click', function () { if (bar) bar.classList.toggle('hidden'); });
    });
    var ac = $('[data-a11y-close]'); if (ac) ac.addEventListener('click', function () { if (bar) bar.classList.add('hidden'); });

    // Размер шрифта
    var fontLevels = ['', 'text-size-large', 'text-size-xlarge'];
    var fontLabels = ['100%', '120%', '140%'];
    var fontIdx = 0;
    function applyFont() {
      root.classList.remove('text-size-large', 'text-size-xlarge');
      if (fontLevels[fontIdx]) root.classList.add(fontLevels[fontIdx]);
      var lbl = $('[data-font-label]'); if (lbl) lbl.textContent = fontLabels[fontIdx];
    }
    $$('[data-font]').forEach(function (b) {
      b.addEventListener('click', function () {
        fontIdx = b.getAttribute('data-font') === 'inc' ? Math.min(2, fontIdx + 1) : Math.max(0, fontIdx - 1);
        applyFont();
      });
    });

    // Контрастные схемы
    $$('[data-contrast]').forEach(function (b) {
      b.addEventListener('click', function () {
        root.classList.remove('contrast-dark', 'contrast-yellow', 'contrast-blue');
        var v = b.getAttribute('data-contrast');
        if (v !== 'normal') root.classList.add(v);
      });
    });

    // Скрыть изображения
    var hi = $('[data-hide-images]');
    if (hi) hi.addEventListener('click', function () { root.classList.toggle('hide-images'); });

    /* ---------- Модалки ---------- */
    function openModal(name) {
      var m = $('[data-modal="' + name + '"]');
      if (m) { m.classList.remove('hidden'); document.body.style.overflow = 'hidden'; }
    }
    function closeModals() {
      $$('[data-modal]').forEach(function (m) { m.classList.add('hidden'); });
      document.body.style.overflow = '';
    }
    $$('[data-donation-open]').forEach(function (b) { b.addEventListener('click', function () { openModal('donation'); }); });
    $$('[data-search-open]').forEach(function (b) { b.addEventListener('click', function () { openSearch(); }); });
    $$('[data-service-open]').forEach(function (b) { b.addEventListener('click', function () { closeModals(); openModal(b.getAttribute('data-service-open')); }); });
    $$('[data-consult-open]').forEach(function (b) {
      b.addEventListener('click', function () {
        openModal('consult');
        // кнопка филиала подставляет свой филиал в селект
        var pre = b.getAttribute('data-consult-open');
        var sel = $('[data-modal="consult"] [data-wa-branch]');
        if (pre && sel) {
          Array.prototype.forEach.call(sel.options, function (o) {
            if (o.value === pre) sel.value = o.value;
          });
        }
      });
    });
    $$('[data-inforequest-open]').forEach(function (b) { b.addEventListener('click', function () { openModal('inforequest'); }); });
    $$('[data-umay-open]').forEach(function (b) { b.addEventListener('click', function () { openModal('umay'); }); });
    $$('[data-modal-close]').forEach(function (b) { b.addEventListener('click', closeModals); });
    $$('[data-modal]').forEach(function (m) {
      m.addEventListener('click', function (e) { if (e.target === m) closeModals(); });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeModals();
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); openSearch(); }
    });

    /* ---------- Поиск (как SearchModal.tsx): ищем по ru и kk, выводим на языке страницы ---------- */
    var sm = $('[data-modal="search"]');
    var sIndex = [], sQuery = '', sCat = 'all';
    if (sm) {
      try { sIndex = JSON.parse($('[data-search-index]', sm).textContent) || []; } catch (err) { sIndex = []; }
      sIndex.forEach(function (it) { it.f = it.f.map(function (s) { return String(s || '').toLowerCase(); }); });
    }
    var sInput = sm && $('[data-search-input]', sm);
    var sBody = sm && $('[data-search-body]', sm);
    var sBlocks = sm ? {
      empty: $('[data-search-empty]', sm), count: $('[data-search-count]', sm),
      results: $('[data-search-results]', sm), none: $('[data-search-none]', sm)
    } : {};
    // ссылки заранее: блоки, снятые из тела, в DOM модалки уже не ищутся
    var sNum = sm && $('[data-search-num]', sm), sNone = sm && $('[data-search-none-text]', sm);
    function renderSearch() {
      if (!sm) return;
      var q = sQuery.trim().toLowerCase();
      $('[data-search-clear]', sm).classList.toggle('hidden', !sQuery);
      $('[data-search-cats]', sm).classList.toggle('hidden', !q);
      $$('[data-search-cat]', sm).forEach(function (b) {
        b.className = b.getAttribute('data-cls-base') + (b.getAttribute('data-search-cat') === sCat ? b.getAttribute('data-cls-on') : b.getAttribute('data-cls-off'));
      });
      if (!q) { sBody.replaceChildren(sBlocks.empty); return; }
      var hits = sIndex.filter(function (it) {
        return (sCat === 'all' || sCat === it.c) && it.f.some(function (s) { return s.indexOf(q) !== -1; });
      });
      sNum.textContent = hits.length;
      var tpl = $('[data-search-row]', sm);
      sBlocks.results.replaceChildren.apply(sBlocks.results, hits.map(function (it) {
        var row = tpl.content.firstElementChild.cloneNode(true);
        row.setAttribute('href', it.u);
        if (it.svc) row.setAttribute('data-search-svc', it.svc);
        $('[data-row-icon]', row).appendChild($('[data-search-icon="' + it.t + '"]', sm).content.cloneNode(true));
        $('[data-row-badge]', row).textContent = it.b;
        $('[data-row-title]', row).textContent = it.h;
        $('[data-row-desc]', row).textContent = it.d;
        return row;
      }));
      sNone.textContent = sNone.getAttribute('data-pre') + sQuery + sNone.getAttribute('data-post');
      sBody.replaceChildren(sBlocks.count, hits.length ? sBlocks.results : sBlocks.none);
    }
    function openSearch() {
      if (!sm) return;
      sQuery = ''; sCat = 'all'; sInput.value = '';
      renderSearch();
      openModal('search');
      setTimeout(function () { sInput.focus(); }, 100);
    }
    if (sm) {
      sInput.addEventListener('input', function () { sQuery = sInput.value; renderSearch(); });
      $('[data-search-clear]', sm).addEventListener('click', function () { sQuery = ''; sInput.value = ''; renderSearch(); });
      $$('[data-search-chip]', sm).forEach(function (b) {
        b.addEventListener('click', function () { sQuery = b.getAttribute('data-search-chip'); sInput.value = sQuery; renderSearch(); });
      });
      $$('[data-search-cat]', sm).forEach(function (b) {
        b.addEventListener('click', function () { sCat = b.getAttribute('data-search-cat'); renderSearch(); });
      });
      // Услуга: карточка открывается на месте, если секция услуг есть на странице, иначе — переход на «Услуги»
      sBlocks.results.addEventListener('click', function (e) {
        var row = e.target.closest('[data-search-svc]');
        if (!row) return;
        var id = row.getAttribute('data-search-svc');
        if ($('[data-modal="' + id + '"]')) { e.preventDefault(); closeModals(); openModal(id); }
      });
      renderSearch();
    }
    var svcHash = location.hash.match(/^#(svc-\d+)$/);
    if (svcHash && $('[data-modal="' + svcHash[1] + '"]')) openModal(svcHash[1]);


    /* ---------- Список WhatsApp методистов в баннере ---------- */
    $$('[data-wa-list-toggle]').forEach(function (btn) {
      var menu = $('[data-wa-list-menu]', btn.parentElement);
      btn.addEventListener('click', function (e) {
        e.stopPropagation();
        if (menu) menu.classList.toggle('hidden');
      });
    });
    document.addEventListener('click', function () {
      $$('[data-wa-list-menu]').forEach(function (m) { m.classList.add('hidden'); });
    });

    /* ---------- Заявки форм уходят в WhatsApp ---------- */
    $$('[data-wa-form]').forEach(function (form) {
      form.addEventListener('submit', function (e) {
        e.preventDefault();

        // номер: либо фиксированный у формы, либо у выбранного филиала
        var num = form.getAttribute('data-wa') || '';
        if (form.getAttribute('data-wa-from') === 'branch') {
          var bs = $('[data-wa-branch]', form);
          var opt = bs && bs.options[bs.selectedIndex];
          num = (opt && opt.getAttribute('data-wa')) || '';
        }
        if (!num) return;

        var lines = [form.getAttribute('data-wa-title') || '', ''];
        var groups = {}, order = [];

        $$('[data-wa-field]', form).forEach(function (el) {
          var label = el.getAttribute('data-wa-label') || '';
          var val = '';
          if (el.type === 'checkbox' && el.hasAttribute('data-wa-yes')) {
            val = el.checked ? el.getAttribute('data-wa-yes') : el.getAttribute('data-wa-no'); // как в React: «да / нет»
          } else if (el.type === 'checkbox') {
            if (!el.checked) return;
            val = el.value && el.value !== 'on' ? el.value : 'да';
          } else if (el.type === 'radio') {
            if (!el.checked) return;
            val = el.value;
          } else {
            val = (el.value || '').trim();
          }
          if (!val) return;
          if (!groups[label]) { groups[label] = []; order.push(label); }
          groups[label].push(val);
        });

        order.forEach(function (label) {
          lines.push(label + ': ' + groups[label].join(', '));
        });

        window.open('https://wa.me/' + num + '?text=' + encodeURIComponent(lines.join('\n')), '_blank', 'noopener,noreferrer');
        closeModals();
        form.reset();
      });
    });

    /* ---------- FAQ (как FaqSection.tsx): открыт только один вопрос + поиск ---------- */
    var setFaq = function (item, open) {
      [item].concat($$('[data-cls-base]', item)).forEach(function (el) {
        el.className = el.getAttribute('data-cls-base') + (open ? el.getAttribute('data-cls-on') : el.getAttribute('data-cls-off'));
      });
      $('[data-faq-body]', item).classList.toggle('hidden', !open);
      $('[data-faq-up]', item).classList.toggle('hidden', !open);
      $('[data-faq-down]', item).classList.toggle('hidden', open);
    };
    $$('[data-faq-toggle]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var item = btn.closest('[data-faq]');
        var wasOpen = !$('[data-faq-body]', item).classList.contains('hidden');
        $$('[data-faq]').forEach(function (it) { setFaq(it, false); });
        if (!wasOpen) setFaq(item, true);
      });
    });
    $$('[data-faq-search]').forEach(function (input) {
      input.addEventListener('input', function () {
        var q = input.value.toLowerCase();
        var sec = input.closest('section'); var shown = 0;
        $$('[data-faq]', sec).forEach(function (it) {
          var hit = it.textContent.toLowerCase().indexOf(q) !== -1;
          it.style.display = hit ? '' : 'none'; if (hit) shown++;
        });
        var empty = $('[data-faq-empty]', sec); if (empty) empty.classList.toggle('hidden', shown > 0);
      });
    });

    /* ---------- Правила: аккордеон разделов ---------- */
    // как RulesPage.tsx: стрелка раздела — класс rotate-180; кнопка «Развернуть/Свернуть всё» зависит от того, открыты ли все разделы
    var rulesWrap = $('[data-rules]');
    var setRule = function (item, open) {
      var body = $('[data-rule-body]', item), chev = $('[data-rule-toggle] svg', item);
      body.classList.toggle('hidden', !open); body.classList.toggle('flex', open);
      if (chev) chev.classList.toggle('rotate-180', open);
    };
    var syncRulesBtn = function () {
      var btn = $('[data-rules-expand]'); if (!btn || !rulesWrap) return;
      var allOpen = $$('[data-rule-body]', rulesWrap).every(function (b) { return !b.classList.contains('hidden'); });
      $('[data-rules-expand-label]', btn).textContent = allOpen ? rulesWrap.getAttribute('data-label-collapse') : rulesWrap.getAttribute('data-label-expand');
      $('[data-rules-icon-expand]', btn).classList.toggle('hidden', allOpen);
      $('[data-rules-icon-collapse]', btn).classList.toggle('hidden', !allOpen);
      btn.setAttribute('data-all-open', allOpen ? '1' : '');
    };
    $$('[data-rule-toggle]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var item = btn.closest('[data-rule]');
        setRule(item, $('[data-rule-body]', item).classList.contains('hidden'));
        syncRulesBtn();
      });
    });

    /* ---------- Правила: развернуть/свернуть всё ---------- */
    $$('[data-rules-expand]').forEach(function (btn) {
      if (!rulesWrap) return;
      btn.addEventListener('click', function () {
        var open = btn.getAttribute('data-all-open') !== '1';
        $$('[data-rule]', rulesWrap).forEach(function (it) { setRule(it, open); });
        syncRulesBtn();
      });
    });

    /* ---------- Переключение филиалов ---------- */
    $$('[data-branch-btn]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var id = btn.getAttribute('data-branch-btn');
        // как в React: у кнопки и её значков меняется набор классов (выбран / не выбран)
        $$('[data-branch-btn]').forEach(function (b) {
          var active = b === btn;
          [b].concat($$('[data-cls-base]', b)).forEach(function (el) {
            el.className = el.getAttribute('data-cls-base') + (active ? el.getAttribute('data-cls-on') : el.getAttribute('data-cls-off'));
          });
        });
        $$('[data-branch-detail]').forEach(function (d) {
          d.classList.toggle('hidden', d.getAttribute('data-branch-detail') !== id);
        });
      });
    });

    /* ---------- Фильтры (услуги, новости, галерея): как в React — набор классов on/off ---------- */
    $$('[data-filter-group]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var group = btn.getAttribute('data-filter-group');
        var cat = btn.getAttribute('data-filter');
        $$('[data-filter-group="' + group + '"]').forEach(function (b) {
          b.className = b.getAttribute('data-cls-base') + (b === btn ? b.getAttribute('data-cls-on') : b.getAttribute('data-cls-off'));
        });
        $$('[data-filter-item="' + group + '"]').forEach(function (item) {
          item.style.display = (cat === 'all' || item.getAttribute('data-cat') === cat) ? '' : 'none';
        });
      });
    });

    /* ---------- Просмотр фото галереи (как GallerySection.tsx) ---------- */
    var lb = $('[data-lightbox]');
    if (lb) {
      $$('[data-lightbox-src]').forEach(function (item) {
        item.addEventListener('click', function () {
          var img = $('[data-lightbox-img]', lb);
          img.src = item.getAttribute('data-lightbox-src');
          img.alt = item.getAttribute('data-lightbox-title') || '';
          $('[data-lightbox-caption]', lb).textContent = item.getAttribute('data-lightbox-title') || '';
          openModal('lightbox');
        });
      });
      // пустое место вокруг фото (контейнер data-backdrop) тоже считается фоном
      var downOnBackdrop = false;
      var isBackdrop = function (e) { return e.target === lb || (e.target.hasAttribute && e.target.hasAttribute('data-backdrop')); };
      lb.addEventListener('mousedown', function (e) { downOnBackdrop = isBackdrop(e); });
      lb.addEventListener('click', function (e) { if (downOnBackdrop && isBackdrop(e)) closeModals(); });
    }

    /* ---------- Копирование реквизитов (как DonationModal.tsx: галочка на 2 секунды) ---------- */
    $$('[data-copy]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        if (navigator.clipboard) navigator.clipboard.writeText(btn.getAttribute('data-copy'));
        $('[data-copy-icon]', btn).classList.add('hidden'); $('[data-copy-done]', btn).classList.remove('hidden');
        setTimeout(function () { $('[data-copy-icon]', btn).classList.remove('hidden'); $('[data-copy-done]', btn).classList.add('hidden'); }, 2000);
      });
    });

    /* ---------- Наверх ---------- */
    var top = $('[data-scroll-top]');
    if (top) top.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });

    /* ---------- Плавное появление секций ---------- */
    var faders = $$('.fade-in');
    if ('IntersectionObserver' in window && faders.length) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) { if (en.isIntersecting) { en.target.classList.add('is-visible'); io.unobserve(en.target); } });
      }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
      faders.forEach(function (f) { io.observe(f); });
    } else {
      faders.forEach(function (f) { f.classList.add('is-visible'); });
    }
  });
})();
