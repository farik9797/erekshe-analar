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
    $$('[data-enroll-open]').forEach(function (b) { b.addEventListener('click', function () { openModal('enroll'); }); });
    $$('[data-donation-open]').forEach(function (b) { b.addEventListener('click', function () { openModal('donation'); }); });
    $$('[data-search-open]').forEach(function (b) { b.addEventListener('click', function () { openModal('search'); }); });
    $$('[data-service-open]').forEach(function (b) { b.addEventListener('click', function () { closeModals(); openModal(b.getAttribute('data-service-open')); }); });
    $$('[data-modal-close]').forEach(function (b) { b.addEventListener('click', closeModals); });
    $$('[data-modal]').forEach(function (m) {
      m.addEventListener('click', function (e) { if (e.target === m) closeModals(); });
    });
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeModals();
      if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') { e.preventDefault(); openModal('search'); }
    });

    /* ---------- FAQ аккордеон ---------- */
    $$('[data-faq-toggle]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var item = btn.closest('[data-faq]');
        var body = $('[data-faq-body]', item);
        if (body) body.classList.toggle('hidden');
        item.classList.toggle('bg-emerald-50/50');
        item.classList.toggle('border-emerald-300');
        item.classList.toggle('bg-slate-50/80');
        item.classList.toggle('border-slate-200');
      });
    });

    /* ---------- Переключение филиалов ---------- */
    $$('[data-branch-btn]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var id = btn.getAttribute('data-branch-btn');
        $$('[data-branch-btn]').forEach(function (b) {
          var active = b === btn;
          b.classList.toggle('bg-emerald-700', active);
          b.classList.toggle('text-white', active);
          b.classList.toggle('border-emerald-600', active);
          b.classList.toggle('bg-white', !active);
          b.classList.toggle('text-slate-800', !active);
          b.classList.toggle('border-slate-200', !active);
        });
        $$('[data-branch-detail]').forEach(function (d) {
          d.classList.toggle('hidden', d.getAttribute('data-branch-detail') !== id);
        });
      });
    });

    /* ---------- Фильтр услуг ---------- */
    $$('[data-svc-filter]').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var cat = btn.getAttribute('data-svc-filter');
        $$('[data-svc-filter]').forEach(function (b) {
          var active = b === btn;
          b.classList.toggle('bg-emerald-600', active);
          b.classList.toggle('text-white', active);
          b.classList.toggle('shadow-md', active);
          b.classList.toggle('bg-white', !active);
          b.classList.toggle('text-slate-700', !active);
          b.classList.toggle('border', !active);
          b.classList.toggle('border-slate-200', !active);
        });
        $$('[data-svc-cat]').forEach(function (card) {
          card.style.display = (cat === 'all' || card.getAttribute('data-svc-cat') === cat) ? '' : 'none';
        });
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
