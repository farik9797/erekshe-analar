# PROGRESS

> Рабочая память между сессиями. Обновляй по ходу работы, читай в начале новой сессии.

## Статус
✅ ГОТОВО. Сайт задеплоен и проверен онлайн.
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
