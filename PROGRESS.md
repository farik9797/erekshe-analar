# PROGRESS

> Рабочая память между сессиями. Обновляй по ходу работы, читай в начале новой сессии.

## Статус (актуальное — WordPress + Polylang)
Идёт работа над **WordPress-версией** сайта (`wordpress/erekshe-theme/`), запущена в **LocalWP**: `http://erekshe-analar.local/`.

### Двуязычность через Polylang — ✅ ПОДКЛЮЧЕНА
- Активна **Polylang Pro 3.5.1** (не Free!). Языки: **ru** (по умолчанию, без префикса) + **kk** (`/kk/…`). URL-режим: язык в директории, `hide_default=1`, `redirect_lang=1`.
- Языки созданы через `new PLL_Admin_Model($opt)->add_language(...)` в wp-cli-контексте (в CLI `PLL()->model` — базовый `PLL_Model` без `add_language`; метод только в `PLL_Admin_Model`).
- Созданы и связаны **12 KZ-страниц** (перевод RU-оригиналов, те же шаблоны, чистые слаги: `/kk/about`, `/kk/services`, …). Front page (id 4→19) отдаётся на `/kk/`.
- Контент двуязычный: `inc/data.php` и `inc/strings.php` перегенерированы из `src/data/*.ts` (ru+kk), выбор языка через `erekshe_lang()` = `pll_current_language()`.
- Строки шаблонов интернационализированы через `erekshe_t('key')`. Доп. строки (которых нет в translations.ts) — в `inc/i18n-extra-{a,b,c,d,nav}.php` через фильтр `erekshe_tr_extra` (functions.php авто-подключает `glob('inc/i18n-extra-*.php')`).
- `inc/nav.php`: метки меню двуязычные, URL ведут на перевод страницы (`erekshe_nav_url`), функция `erekshe_language_switcher()` (Polylang, `pll_the_languages(raw)`), вставлена в шапку вместо статичных RU/ҚАЗ.
- Проверено (curl): `/kk/*` — контент/меню/футер/модалки на казахском, `/` — RU без изменений, переключатель связывает RU↔KZ страницы, протечек русского UI нет.
- Генераторы (scratchpad): `gen-i18n.js` (data/strings), `build-map.js` (key2ru/ru2key), `coverage.js` (аудит).

### Исправленная регрессия (важно для будущих сессий)
- Слаг казахского языка «уплыл» с `kk` на `kz` (и локаль стала `kz`) — из-за этого Polylang не признавал префикс `/kk/` и все KZ-страницы 301-редиректили на RU. Исправлено: переименовал term'ы (`language` id=5 slug→`kk`, locale→`kk`; `term_language` id=6 slug→`pll_kk`), пересобрал связи переводов (`pll_save_post_translations` для 12 пар), сбросил кэш/rewrite. `erekshe_lang()` теперь нормализует `kz`/`kaz`→`kk` (страховка).
- Баннеры 12 страниц (`page-*.php`) передавали захардкоженный русский `badge`/`title`/`desc` — эти обёртки не были в батчах агентов. Переведены через `erekshe_t('p_…')`, ключи в `inc/i18n-extra-p.php`.
- Итог аудита (curl): все 12 `/kk/*` — HTTP 200, `<html lang="kk">`, протечек русского UI нет; переключатель RU↔KZ и меню/футер/CTA язык-зависимы.

### Реквизиты запуска WordPress (LocalWP)
- Тема-источник: `wordpress/erekshe-theme/` → синхронизируется в `~/Local Sites/erekshe-analar/app/public/wp-content/themes/erekshe-theme/` через `rsync -a --delete`.
- wp-cli снаружи LocalWP: bundled php + сокет: `-d mysqli.default_socket="$SOCK"` где `SOCK=~/Library/Application Support/Local/run/vkMFWBie0/mysql/mysqld.sock`. `wp eval-file` требует файл С открывающим `<?php` (иначе печатает исходник).
- Плагины: `polylang-pro` 3.5.1, `advanced-custom-fields-pro` 6.3.6.

---

## Статус (React-версия, задеплоена)
✅ Сайт задеплоен и проверен онлайн.
**Онлайн-адрес: https://farik9797.github.io/erekshe-analar/**
Проверено: главная (200), прямой заход на подстраницу /team (SPA-fallback работает), все ассеты грузятся, HTTPS.

## Изменения после деплоя
- Удалена функция «Озвучивание текста (Web Speech)» из панели доступности. Затронуты: `AccessibilityContext.tsx` (speakText/stopSpeech/speechEnabled/isSpeaking + speechSynthesis), `AccessibilityBar.tsx` (кнопка + иконки Volume2/VolumeX), `types.ts` (поле speechEnabled), `translations.ts` (speechLabel ru+kk). tsc чист, live передеплоен.
- Панель доступности (`AccessibilityBar.tsx`): размер шрифта заменён с трёх кнопок на компактный `A− 100% A+` (индикатор процента, блокировка на границах). Раскладка адаптивная: на десктопе один ряд (`md:flex-nowrap`), на мобильном перенос в строки (`flex-wrap`), кнопки контраста тоже переносятся (`w-full md:w-auto` на блоке контраста). Проверено на 375px и 1280px. Live передеплоен.

## Адаптивность (проверено на всех 12 страницах)
Диагностика overflow показала: у всех страниц контент адаптивен, проблема была только в общих `Header` и `Footer`. Фиксы:
- `Header.tsx`: поле поиска `hidden sm:block` (на мобильном скрыто, доступно в drawer-меню); кнопки действий `hidden lg:flex` (на планшете/мобильном — в меню); навигация Row3 компактнее на lg (`px-2 xl:px-3`, `gap-0.5 xl:gap-1`, `whitespace-nowrap`).
- `Footer.tsx`: десктопная раскладка колонок сдвинута с `lg` на `xl` (`xl:flex-nowrap`, `xl:w-[300px]`, `xl:w-[400px]`) — в диапазоне 1024–1279px колонки переносятся без overflow.
- Проверено: 0 горизонтального overflow на ширинах 360, 375, 760, 1016, 1144, 1272, 1432. Live передеплоен.

## Модальные окна на телефоне
Проверены все 4 модалки на 375px — все адаптивны, изменений не требовали: EnrollmentModal (форма записи), DonationModal (QR + реквизиты), SearchModal (поиск + результаты), ServiceDetailModal (детали услуги). Помещаются в экран, вертикальный скролл, крестики видны.

## Правка мобильного меню
`Header.tsx`: из drawer-меню удалена кнопка WhatsApp, телефон теперь на всю ширину (был grid-cols-2 «телефон + WhatsApp»). Убран неиспользуемый импорт `MessageCircle`. Live передеплоен.

## Проверка секций на мобильном (375px)
Все 12 секций главной проверены — адаптивны, overflow нет, контент в колонку: Hero, About (карточки), Services (фильтры 2 кол + карточки), RehabProcess (этапы), Branches (сетка 2×2 + детали), Team (карточка директора), Charity (проект + прогресс), News (фильтры + карточки), Reviews (отзывы), FAQ (аккордеон), Contacts (контакты + форма). Правок вёрстки не потребовалось.
Примечание: программный `window.scrollTo(0,Y)` на этой странице не срабатывает (что-то перехватывает) — для прокрутки использовать `element.scrollIntoView()`.

## Доп. мобильные правки
- `Header.tsx`: обе строки топбара на мобильном распределены во всю ширину (`w-full justify-between sm:w-auto`): 1-я — город слева / телефон справа; 2-я — АА слева / соцсети центр (order-2) / язык справа (order-3). Десктоп без изменений.
- `Hero.tsx`: мобильный padding 20px/15px (`py-5`, `px-[15px] sm:px-4`), h1 = 1.7rem (`text-[1.7rem] sm:text-4xl`); CTA-кнопки на мобильном во всю ширину до 390px по центру (`w-full max-w-[390px] justify-center sm:w-auto sm:max-w-none`), контейнер `flex-col items-center sm:flex-row`.
- Все правки передеплоены.

## Текущие мобильные раскладки секций (итог итераций)
- **Hero**: весь блок по центру на мобильном (`text-center lg:text-left`, badge `mx-auto lg:mx-0`, benefits `justify-items-center`); padding 20/15px (`py-5`, `px-[15px]`); h1 1.9rem по центру; CTA-кнопки на всю ширину по центру (`w-full ... sm:w-auto`).
- **Услуги (ServicesSection)**: фильтры-категории по 2 в ряд (`w-[calc(50%-0.25rem)] sm:w-auto`); карточки услуг — ГОРИЗОНТАЛЬНЫЙ СЛАЙДЕР на мобильном (`w-[85vw] max-w-[340px]`, snap), сетка `sm:grid ... lg:grid-cols-3` на десктопе.
- **Филиалы (BranchesSection)**: селектор филиалов — СЛАЙДЕР на мобильном (`w-[65vw] max-w-[240px]`), сетка `sm:grid-cols-2 md:grid-cols-4` на десктопе; инфо-карточки филиала (адрес/режим/тел/whatsapp) — сетка 2×2 (`grid-cols-2`).
- **Команда (TeamSection)**: карточки специалистов — СЛАЙДЕР на мобильном (`w-[85vw] max-w-[320px]`, snap; исходный вид), сетка `sm:grid-cols-2 lg:grid-cols-3` на десктопе.
- **Новости (NewsSection)**: карточки — СЛАЙДЕР (`w-[85vw] max-w-[340px]`), сетка `sm:grid-cols-2 md:grid-cols-3` на десктопе.
- **Отзывы (ReviewsSection)**: карточки — СЛАЙДЕР (`w-[85vw] max-w-[340px]`), сетка `sm:grid-cols-2 md:grid-cols-3`.
- **Благотворительность (CharitySection)**: карточки проектов — СЛАЙДЕР (`w-[85vw] max-w-[400px]`), сетка `sm:grid-cols-2`.
- **FAQ (FaqSection)**: удалён сортировщик (кнопки-фильтры по темам) вместе с логикой `activeCategory`/`categories`; оставлен только поиск + аккордеон.
- Общий паттерн слайдера: `flex overflow-x-auto snap-x snap-mandatory gap-4 pb-4 -mx-4 px-4 sm:mx-0 sm:px-0 sm:grid ... sm:overflow-visible sm:pb-0 scrollbar-none` на контейнере + `flex-shrink-0 w-[..vw] max-w-[..px] sm:w-auto sm:max-w-none snap-center sm:snap-none` на карточке.
- Заголовки всех секций уже центрированы (`text-center max-w-3xl mx-auto`) — содержимое карточек намеренно слева (читаемость).

## WordPress-порт (в работе) — wordpress/erekshe-theme/
Задача: переделать React-сайт в WordPress-тему (PHP + ACF Pro). Подход утверждён пользователем: PHP-тема + ACF Pro, весь сайт, локально @wordpress/env — НО Docker не установлен (есть LocalWP). ACF Pro-файл не найден. php CLI доступен (проверка синтаксиса + мок-рендер работают).
**Сделано (проверено мок-рендером, hero 1:1 с оригиналом):**
- Каркас темы: style.css (заголовок + доступность), functions.php (enqueue, erekshe_field/opt хелперы), inc/nav.php, inc/icons.php (67 lucide-иконок извлечены verbatim из node_modules), inc/data.php (весь контент из mockData, русская версия, авто-сгенерирован), inc/acf-fields.php (Options Page + Home).
- header.php (топбар+шапка+навигация+drawer, с мобильными правками), footer.php (4 колонки), template-parts/accessibility-bar.php, 3 модалки (enroll/donation/search).
- front-page.php — ГЛАВНАЯ целиком (все 12 секций: hero, о фонде, услуги-слайдер, филиалы, команда, благотворительность, новости, отзывы, FAQ, партнёры, контакты).
- assets/js/main.js (vanilla: меню, доступность, модалки, FAQ, наверх, fade-in), assets/css/tailwind.css (собранный, визуал 1:1), index.php/page.php fallback.
- Все 14 PHP-файлов: `php -l` без ошибок. Мок-рендер: 154KB HTML, весь контент, 0 ошибок.
**ВСЕ 12 страниц готовы (проверено мок-рендером: HTTP 200, 0 PHP-ошибок, весь контент):**
- front-page.php + 11× page-{slug}.php (about/services/process/branches/team/umay/charity/documents/news/reviews-faq/contacts).
- 14 переиспользуемых секций в template-parts/section-*.php (about, services, process, branches, team, charity, news, reviews, faq, partners, documents, gallery, umay, contact).
- template-parts/page-banner.php (универсальный градиентный баннер, args через get_template_part).
- inc/strings.php (45 строк: 9 этапов маршрута + заголовки/описания страниц, извлечены из translations.ts).
- JS: переключение филиалов (data-branch-btn), фильтр услуг (data-svc-filter) добавлены в main.js.
- Все 41 PHP-файл: `php -l` без ошибок. Активная навигация (is_page) работает. Баннеры страниц 1:1 с оригиналом.
**ACF-поля для ВСЕХ страниц добавлены (inc/acf-fields.php):**
- Группы: Options, Home (hero+stats), About, Services, Process, Branches, Team, UMAY, Charity, Documents, News, Reviews+FAQ, Contacts. Хелперы ef_text/ef_textarea/ef_image/ef_repeater/ef_banner. Локация — по page_template (в page-*.php добавлены `Template Name`, шаблоны назначены страницам через wp-cli).
- Секции читают ACF через `erekshe_get_rows($key, $fallback)` / `erekshe_field()` с fallback на data.php. Баннеры — из banner_title/desc/badge.
- Проверено end-to-end: задал ACF banner_title → отобразилось на фронте; удалил → вернулся дефолт. Все страницы HTTP 200.
- **ВАЖНО (Free vs Pro):** текстовые поля (баннеры, тексты About/UMAY/Contacts) РАБОТАЮТ на ACF Free. **Repeater-карточки (услуги/команда/филиалы/отзывы/новости/проекты/документы) требуют ACF PRO** — на Free поле показывается без кнопки «Добавить». Карточки сейчас из data.php-дефолтов; заработают на редактирование при установке ACF Pro.
**Осталось:**
- Двуязычность КАЗ (Polylang) — v1 на русском.
- Запуск в реальном WordPress: Docker нет → LocalWP (GUI, вручную) ИЛИ поставить Docker; нужен acf-pro.zip для Repeater/Options.
- Мелочи: section-umay использует цветовые классы (rose/purple/blue/amber-100), которых может не быть в собранном tailwind.css — проверить/добавить.
**Превью локально (без WP):** `php -S 127.0.0.1:8899 -t wordpress/erekshe-theme /tmp/preview-router.php` (router мокает WP-функции).

## Сайт перенесён в LocalWP GUI (полноценный сайт на MySQL)
- Сайт создан пользователем в LocalWP («erekshe-analar», id vkMFWBie0, домен **erekshe-analar.local**, MySQL, php 8.2, nginx, hosts прописан).
- Перенос: тема + ACF скопированы, активированы; 12 страниц созданы с шаблонами; главная + ЧПУ настроены (скрипт /tmp/migrate-to-localwp.sh).
- **Нюанс подключения wp-cli к LocalWP MySQL:** wp-config DB_HOST=localhost работает только внутри LocalWP (php-fpm с его socket). Внешний wp-cli (bundled php) подключается через socket: `-d mysqli.default_socket="$HOME/Library/Application Support/Local/run/vkMFWBie0/mysql/mysqld.sock"`.
- Проверено: главная 200 (174KB, hero, 11 секций, 125 иконок), все страницы 200. Управляется через приложение Local (Start/Stop, Adminer, Open site shell).
- **ACF PRO 6.3.6 установлен и активен** (из ~/Downloads/advanced-custom-fields-pro.zip; Free деактивирован). Repeater + Options Page работают. Проверено end-to-end: Options Page (телефон) → шапка фронта; Repeater (услуги) → карточки фронта; при очистке — возврат к дефолтам data.php. Теперь ВЕСЬ контент редактируется из админки: глобальные настройки (Options Page «Настройки сайта») + все карточки (Repeater на каждой странице).
- **Доступ:** http://erekshe-analar.local/ · админка http://erekshe-analar.local/wp-admin (доступы — в password.md).
- Автономный SQLite-вариант — бэкап в /tmp/erekshe-standalone-backup (больше не нужен).

## (Прежний) Локальный WordPress автономно — заменён на LocalWP выше
- Расположение: `~/Local Sites/erekshe-analar/app/public` (папка LocalWP), WordPress 7.0.3 ru_RU на **SQLite** (без mysql).
- Стек: bundled php 8.2 из LocalWP + wp-cli. БД — sqlite-database-integration (db.php drop-in).
- Тема `erekshe-theme` активна, плагин ACF (Free 6.8.7) активен. Все 12 страниц созданы (slug'и совпадают с page-*.php), главная = front page, permalinks `/%postname%/`.
- Проверено в браузере: главная + /team/ рендерятся 1:1; ACF Hero-поля (badge/title/desc/image) редактируются на главной (location исправлен `page_type == front_page`).
- **Доступ (локальные тестовые):** сайт http://127.0.0.1:8080/ · админка http://127.0.0.1:8080/wp-admin (доступы — в password.md).
- **Запуск сервера** (wp server живёт только пока процесс запущен):
  ```
  BPHP="/Users/farik/Library/Application Support/Local/lightning-services/php-8.2.29+0/bin/darwin-arm64/bin/php"
  "$BPHP" -d memory_limit=1024M "$(command -v wp)" server --path="$HOME/Local Sites/erekshe-analar/app/public" --host=127.0.0.1 --port=8080
  ```
- Отличия от буквального запроса: развёрнут автономно через bundled-стек LocalWP (не через LocalWP GUI, т.к. создание сайта в нём только вручную), на SQLite; ACF **Free** (Pro-файла нет → Options Page не активна, контент-поля работают). Для полного LocalWP GUI + mysql + ACF Pro: создать сайт в LocalWP вручную и мигрировать / поставить ACF Pro-плагин.

## Как устроен деплой (важно для повторной публикации)
- GitHub Pages, source = ветка **gh-pages** (в неё пушится содержимое dist), path=/.
- Правки под Pages: `vite.config.ts` → `base: '/erekshe-analar/'` при build; `App.tsx` → `BrowserRouter basename={import.meta.env.BASE_URL}`.
- SPA-fallback: `cp dist/index.html dist/404.html` (иначе прямой заход на подстраницы даст 404). Также `dist/.nojekyll`.
- Команда повторной публикации:
  ```
  bun run build && cp dist/index.html dist/404.html && touch dist/.nojekyll
  cd dist && rm -rf .git && git init -q -b gh-pages && git add -A \
    && git -c user.email="farik9797@users.noreply.github.com" -c user.name="farik9797" commit -q -m "Deploy" \
    && git push -f https://github.com/farik9797/erekshe-analar.git gh-pages
  ```
- Известное ограничение: HTTP-статус подстраниц = 404 (контент отображается корректно). Это особенность GitHub Pages + BrowserRouter. Чистый 200 дают HashRouter или хостинг с rewrites (Vercel/Netlify).
- Исходники закоммичены в `main` (коммит 641d5b4). `.gitignore` дополнен: node_modules/, dist/ игнорируются; password.md по-прежнему игнорируется. `.claude/launch.json`, PROGRESS.md — в репозитории.
- Деплой (собранный сайт) по-прежнему отдельно в ветке gh-pages; исходники — в main.

## Что за проект
**EREKSHE ANALAR — Реабилитационный фонд** (г. Астана). Официальный сайт общественного фонда: бесплатная комплексная реабилитация и социальная адаптация детей 1,5–18 лет с особыми образовательными потребностями, ДЦП, психоневрологическими патологиями; поддержка семей. 4 центра в Астане + Центр UMAY для матерей.

## Стек
- React 19 + Vite 6 + TailwindCSS 4 + react-router-dom 7
- Motion (анимации), lucide-react (иконки), @google/genai (Gemini API — поиск/чат)
- Пакетный менеджер: **bun** (есть bun.lock)
- Многостраничное SPA: src/pages/* (Home, About, Services, Process, Branches, Team, Charity, Documents, News, FaqReviews, Contacts, Umay)
- Разделы навигации: Главная, О фонде, Услуги, Маршрут, Филиалы, Команда, Центр UMAY, Благотворительность, Документы, Новости, Отзывы, Контакты

## Сделано
- Клонирован репозиторий `github.com/farik9797/erekshe-analar` (владелец — аккаунт farik9797, gh авторизован)
- Скопирован в рабочую папку вместе с .git; сохранены PROGRESS.md, password.md, .gitignore
- `bun install` — 212 пакетов установлено
- Создан `.claude/launch.json` (конфиг erekshe-dev, порт 3000)
- Dev-сервер: `bun run dev` → http://localhost:3000 (Vite, host 0.0.0.0). Рендерится корректно, ошибок нет.
- Мой ранний черновой лендинг (ошибочно начатый с нуля) убран в scratchpad — не используется.

## Следующие шаги (ждём уточнения смысла «дублировать»)
- Уточнить, что значит «дублировать»: (A) рабочая копия локально — уже готово; (B) отдельный репозиторий-дубликат на GitHub; (C) шаблон для нового сайта (другой фонд/город).

## Ключевые решения (и почему)
- НЕ создавать сайт с нуля: готовый сайт уже существует в репозитории. Первая интерпретация задачи была ошибочной.
- bun вместо npm — в репо лежит bun.lock (воспроизводимая установка).

## Открытые вопросы
- Точный смысл слова «дублировать» (см. Следующие шаги).
- Нужен ли GEMINI_API_KEY (.env.local) — для фич на @google/genai (поиск/чат). Для статики не требуется.
