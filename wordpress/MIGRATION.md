# Перенос WordPress-версии EREKSHE ANALAR на хостинг → https://ereksheanalar.kz

Пакет собран 23.10.2026 из LocalWP (тема 1.7.0) и проверен: распакован отдельно, запущен под адресом
`ereksheanalar.kz` с HTTPS — 26 страниц (13 RU + 13 KK) отвечают 200, ошибок PHP нет, старых адресов `erekshe-analar.local` нет.

## Что в пакете (`deploy/`, в git не попадает)

| Файл | Что это |
|---|---|
| `ereksheanalar-site.zip` (≈40 МБ) | Все файлы сайта для `public_html`: WordPress 7.0.3, тема `erekshe-theme`, плагины **ACF Pro 6.3.6** и **Polylang Pro 3.5.1**, `.htaccess`, готовый `wp-config.php` (свои ключи безопасности, отладка выключена) |
| `ereksheanalar-db.sql` (≈120 КБ) | База данных. Все адреса уже заменены на `https://ereksheanalar.kz` |

Из пакета убраны: неактивные бесплатные ACF и Polylang (дубли Pro), темы 2023/2024, служебный `local-xdebuginfo.php` от LocalWP.

## Требования к хостингу

- PHP **8.1–8.3** (минимум 7.4), расширения mysqli, mbstring, gd/imagick, zip
- MySQL 5.7+ или MariaDB 10.4+ (кодировка `utf8mb4`)
- Apache с `mod_rewrite` (`.htaccess` уже в архиве) или nginx — см. ниже
- SSL-сертификат для `ereksheanalar.kz` и `www.ereksheanalar.kz` (Let's Encrypt в панели) — **обязателен до запуска**: в базе адреса уже `https://`
- Место на диске: от 300 МБ

## Шаги

1. **Домен.** Направить `ereksheanalar.kz` на хостинг (NS или A-запись — по инструкции хостинга). Дождаться, пока домен откроется.
2. **SSL.** Выпустить сертификат в панели хостинга и включить редирект HTTP → HTTPS (если в панели есть такая галочка).
3. **База данных.** В панели создать базу и пользователя, дать пользователю все права на базу. Записать имя базы, пользователя и пароль в `password.md` проекта.
4. **Импорт базы.** phpMyAdmin → выбрать созданную базу → «Импорт» → `ereksheanalar-db.sql`. В начале файла уже есть `SET SQL_MODE`, так что импорт проходит и на строгом режиме MySQL.
5. **Файлы.** Файловый менеджер → `public_html` (удалить заглушку хостинга, если есть) → загрузить `ereksheanalar-site.zip` → «Извлечь» прямо в `public_html` (без вложенной папки).
6. **wp-config.php.** Открыть `public_html/wp-config.php` и заполнить три строки: `DB_NAME`, `DB_USER`, `DB_PASSWORD`. `DB_HOST` оставить `localhost`, если хостинг не указал другой адрес сервера БД.
7. **Открыть сайт** https://ereksheanalar.kz — главная на русском, https://ereksheanalar.kz/kk/ — на казахском.
8. **Админка** https://ereksheanalar.kz/wp-admin — вход тем же логином, что в LocalWP (см. `password.md`).
9. **Сразу после входа** (делаете вы, не я):
   - сменить пароль администратора на новый надёжный; логин сейчас `admin` — лучше создать нового администратора с другим логином и удалить `admin`;
   - «Настройки → Общие» → **E-mail администратора**: сейчас стоит служебный адрес LocalWP (`…@wpengine.local`) — указать настоящую почту;
   - «Настройки → Постоянные ссылки» → «Сохранить» (пересобрать правила ссылок).
10. **Проверка:** пройти меню на RU и KK, переключатель языков, кнопки WhatsApp в формах, страницу правил `/rules/` (кнопка «Просмотреть» в «Документах»).

### Если хостинг на nginx (без Apache)

В конфиг сайта (или попросить поддержку хостинга):

```nginx
location / {
    try_files $uri $uri/ /index.php?$args;
}
```

## После запуска

- **Резервные копии** — включить ежедневный бэкап в панели хостинга (или плагин UpdraftPlus).
- **Корзина** — в «Страницах» лежит стандартная «Sample Page» в корзине: можно очистить.
- **SEO** — ✅ 23.10: Yoast SEO установлен, title/description заполнены для 13 страниц × 2 языка (`wordpress/seo/`). Осталось: добавить сайт в Google Search Console и Яндекс.Вебмастер, отправить `https://ereksheanalar.kz/sitemap_index.xml`; загрузить логотип в Yoast (схема Organization).
- **Дубль на GitHub Pages** — превью `farik9797.github.io/erekshe-analar` повторяет весь сайт. После запуска закрыть его от индексации или снять, чтобы поисковики не считали боевой сайт копией.
- **Лицензии** — ACF Pro и Polylang Pro работают без ключей, но обновления приходят только с лицензией. Ввести ключи клиента: ACF → Updates, «Языки → Лицензии».
- **Обновления** — после ввода лицензий обновить ACF Pro (6.3.6 → 6.8.x). Перед обновлением — бэкап.
- **Формы** — все заявки уходят в WhatsApp (wa.me), почта/SMTP для форм не нужна.

## Как пересобрать пакет (если сайт в LocalWP поменяется)

1. Запустить сайт в Local.
2. База: `wp search-replace '(https?:)?//erekshe-analar\.local' 'https://ereksheanalar.kz' --regex --all-tables --export=deploy/ereksheanalar-db.sql` (wp-cli с PHP и сокетом MySQL из LocalWP — см. PROGRESS.md), затем добавить в начало файла `SET NAMES utf8mb4; SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO'; SET FOREIGN_KEY_CHECKS=0;`.
3. Файлы: скопировать `~/Local Sites/erekshe-analar/app/public` без `wp-config.php`, `local-xdebuginfo.php`, неактивных ACF/Polylang Free и `wp-content/upgrade`, положить hosting-`wp-config.php`, упаковать в `ereksheanalar-site.zip`.
