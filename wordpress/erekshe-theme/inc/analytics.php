<?php
if (!defined('ABSPATH')) exit;
/**
 * Яндекс.Метрика + Google Analytics 4 и цели.
 * Пока номер пустой — соответствующий счётчик не выводится.
 * Выводится только на боевом домене и не для вошедших редакторов (не засоряем статистику).
 *
 * Цели (JS-события, такие же идентификаторы заведены в Метрике):
 *   whatsapp          — клик по ссылке WhatsApp (шапка, филиалы, методисты и т.д.)
 *   form_consult      — отправлена форма «Консультация по центру»
 *   form_inforequest  — отправлена форма «Запрос информации»
 *   form_umay         — отправлена форма Центра UMAY
 *   donation          — открыто окно реквизитов («Поддержать фонд»)
 * В GA4 те же имена уходят событиями (gtag event).
 */

define('EREKSHE_YM_ID', '');   // номер счётчика Метрики, например 12345678
define('EREKSHE_GA4_ID', '');  // идентификатор потока GA4, например G-XXXXXXXXXX

function erekshe_analytics_enabled() {
    $on = wp_parse_url(home_url(), PHP_URL_HOST) === 'ereksheanalar.kz' && !current_user_can('edit_posts');
    return (bool) apply_filters('erekshe_analytics_enabled', $on);
}

add_action('wp_head', function () {
    if (!erekshe_analytics_enabled()) return;
    $ym = preg_replace('/\D/', '', EREKSHE_YM_ID);
    $ga = preg_replace('/[^A-Z0-9-]/', '', strtoupper(EREKSHE_GA4_ID));
    if ($ym) { ?>
<script>
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};m[i].l=1*new Date();
for(var j=0;j<document.scripts.length;j++){if(document.scripts[j].src===r){return;}}
k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
(window,document,"script","https://mc.yandex.ru/metrika/tag.js","ym");
ym(<?php echo $ym; ?>,"init",{clickmap:true,trackLinks:true,accurateTrackBounce:true,webvisor:true});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/<?php echo $ym; ?>" style="position:absolute;left:-9999px" alt="" /></div></noscript>
<?php }
    if ($ga) { ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga; ?>"></script>
<script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?php echo $ga; ?>');</script>
<?php }
}, 1);

add_action('wp_footer', function () {
    if (!erekshe_analytics_enabled() || (!EREKSHE_YM_ID && !EREKSHE_GA4_ID)) return; ?>
<script>
(function () {
  var YM = <?php echo (int) preg_replace('/\D/', '', EREKSHE_YM_ID); ?>;
  function goal(name, params) {
    if (YM && window.ym) ym(YM, 'reachGoal', name, params || {});
    if (window.gtag) gtag('event', name, params || {});
  }
  // Вебвизор: содержимое полей форм не записываем (имена, телефоны, вопросы о ребёнке)
  document.querySelectorAll('[data-wa-form] input, [data-wa-form] textarea').forEach(function (el) {
    el.classList.add('ym-disable-keys', 'ym-hide-content');
  });
  document.addEventListener('click', function (e) {
    var a = e.target.closest('a[href]');
    if (a) {
      var h = a.getAttribute('href');
      if (/wa\.me|whatsapp\.com/i.test(h)) goal('whatsapp', { url: location.pathname });
    }
    if (e.target.closest('[data-donation-open]')) goal('donation', { url: location.pathname });
  }, true);
  // формы заявок уходят в WhatsApp (main.js); цель — по успешной отправке (браузер уже проверил обязательные поля)
  document.addEventListener('submit', function (e) {
    var f = e.target.closest('[data-wa-form]'), m = f && f.closest('[data-modal]');
    if (m) goal('form_' + m.getAttribute('data-modal'), { url: location.pathname });
  }, true);
})();
</script>
<?php }, 99);
