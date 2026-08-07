<?php
/**
 * Регистрация полей ACF.
 * Текстовые поля (баннеры, заголовки, тексты) работают и на ACF Free.
 * Repeater/Gallery/Options — функции ACF Pro (активируются при установке Pro).
 * Дефолты берутся из inc/data.php, поэтому страницы рендерятся до заполнения полей.
 */
if (!defined('ABSPATH')) exit;

/* ---------- Хелперы полей ---------- */
function ef_text($key, $name, $label, $default = '')     { return ['key' => 'field_' . $key, 'name' => $name, 'label' => $label, 'type' => 'text', 'default_value' => $default]; }
function ef_textarea($key, $name, $label, $default = '') { return ['key' => 'field_' . $key, 'name' => $name, 'label' => $label, 'type' => 'textarea', 'default_value' => $default, 'rows' => 3]; }
function ef_image($key, $name, $label)                   { return ['key' => 'field_' . $key, 'name' => $name, 'label' => $label, 'type' => 'image', 'return_format' => 'url', 'preview_size' => 'medium']; }
function ef_url($key, $name, $label, $default = '')       { return ['key' => 'field_' . $key, 'name' => $name, 'label' => $label, 'type' => 'url', 'default_value' => $default]; }
function ef_number($key, $name, $label, $default = 0)     { return ['key' => 'field_' . $key, 'name' => $name, 'label' => $label, 'type' => 'number', 'default_value' => $default]; }
function ef_repeater($key, $name, $label, $subfields, $button = 'Добавить') {
    return ['key' => 'field_' . $key, 'name' => $name, 'label' => $label, 'type' => 'repeater', 'layout' => 'block', 'button_label' => $button, 'sub_fields' => $subfields];
}
/** Три стандартных поля баннера страницы */
function ef_banner($prefix, $default_title = '', $default_desc = '', $default_badge = '') {
    return [
        ef_text($prefix . '_btitle', 'banner_title', 'Баннер: заголовок', $default_title),
        ef_textarea($prefix . '_bdesc', 'banner_desc', 'Баннер: описание', $default_desc),
        ef_text($prefix . '_bbadge', 'banner_badge', 'Баннер: бейдж', $default_badge),
    ];
}
/** Локация по шаблону страницы */
function ef_loc_tpl($tpl) { return [[['param' => 'page_template', 'operator' => '==', 'value' => $tpl]]]; }

add_action('acf/init', 'erekshe_register_acf');
function erekshe_register_acf() {
    if (!function_exists('acf_add_local_field_group')) return;

    /* ===== Options Page (Pro) — глобальные настройки ===== */
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(['page_title' => 'Настройки сайта', 'menu_title' => 'Настройки сайта', 'menu_slug' => 'erekshe-settings', 'icon_url' => 'dashicons-admin-generic']);
    }
    acf_add_local_field_group(['key' => 'group_erekshe_options', 'title' => 'Глобальные настройки', 'fields' => [
        ef_text('opt_phone', 'phone', 'Телефон', '+7 (7172) 70-80-90'),
        ef_text('opt_email', 'email', 'Email', 'info@ereksheanalar.kz'),
        ef_text('opt_city', 'city', 'Город', 'г. Астана'),
        ef_text('opt_hours', 'work_hours', 'Часы работы', 'Пн - Пт: 09:00 - 18:00'),
        ef_url('opt_wa', 'whatsapp_url', 'WhatsApp URL', 'https://wa.me/77084251212'),
        ef_text('opt_wanum', 'whatsapp_num', 'WhatsApp номер', '+7 (708) 425-12-12'),
        ef_url('opt_insta', 'instagram_url', 'Instagram URL', 'https://instagram.com/erekshe_analar'),
    ], 'location' => [[['param' => 'options_page', 'operator' => '==', 'value' => 'erekshe-settings']]]]);

    /* ===== Главная — Hero + статистика + преимущества ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_home', 'title' => 'Главная страница', 'fields' => [
        ef_text('hero_badge', 'hero_badge', 'Hero: бейдж', 'Бесплатные специальные социальные услуги'),
        ef_text('hero_title', 'hero_title', 'Hero: заголовок', 'Раскрываем потенциал каждого ребенка в окружении заботы и профессионализма'),
        ef_textarea('hero_desc', 'hero_desc', 'Hero: описание', 'Оказываем комплексную помощь детям от 1,5 до 18 лет с особыми образовательными потребностями, ДЦП и психоневрологическими патологиями в 4 центрах г. Астана.'),
        ef_image('hero_image', 'hero_image', 'Hero: фото'),
        ef_repeater('home_stats', 'home_stats', 'Статистика (4 карточки)', [
            ef_text('stat_val', 'value', 'Значение', ''),
            ef_text('stat_lbl', 'label', 'Подпись', ''),
        ], 'Добавить показатель'),
    ], 'location' => [[['param' => 'page_type', 'operator' => '==', 'value' => 'front_page']]]]);

    /* ===== О фонде ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_about', 'title' => 'Страница «О фонде»', 'fields' => array_merge(
        ef_banner('about', 'О фонде «EREKSHE ANALAR»', 'Мы объединяем заботу о детях с особыми образовательными потребностями и всестороннюю поддержку матерей.', 'Общественный фонд'),
        [
            ef_text('about_htitle', 'history_title', 'История: заголовок', 'История фонда'),
            ef_textarea('about_htext', 'history_text', 'История: текст', 'Название «EREKSHE ANALAR» появилось не случайно...'),
            ef_text('about_mtitle', 'mission_title', 'Миссия: заголовок', 'Наша Миссия'),
            ef_textarea('about_mtext', 'mission_text', 'Миссия: текст', 'Создание доступной, эффективной системы комплексной реабилитации...'),
            ef_image('about_image', 'about_image', 'Фото секции'),
        ]
    ), 'location' => ef_loc_tpl('page-about.php')]);

    /* ===== Услуги (Repeater — Pro) ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_services', 'title' => 'Страница «Услуги»', 'fields' => array_merge(
        ef_banner('svc', 'Комплексный спектр реабилитационных и коррекционных услуг', 'Все занятия проводят сертифицированные специалисты.', 'Каталог услуг'),
        [ ef_repeater('svc_items', 'services', 'Услуги', [
            ef_text('svc_title', 'title', 'Название', ''),
            ef_textarea('svc_desc', 'shortDesc', 'Краткое описание', ''),
            ef_text('svc_icon', 'iconName', 'Иконка (Lucide)', 'Sparkles'),
            ef_text('svc_age', 'targetAge', 'Возраст', ''),
            ef_text('svc_dur', 'duration', 'Длительность', ''),
            ef_image('svc_img', 'image', 'Фото'),
        ], 'Добавить услугу') ]
    ), 'location' => ef_loc_tpl('page-services.php')]);

    /* ===== Маршрут (9 этапов) ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_process', 'title' => 'Страница «Маршрут»', 'fields' => array_merge(
        ef_banner('proc', erekshe_t('stepsTitle', '9 этапов реабилитационного маршрута'), erekshe_t('stepsSubtitle', ''), 'Как проходит реабилитация'),
        [ ef_repeater('proc_steps', 'steps', 'Этапы маршрута', [
            ef_text('step_num', 'num', 'Номер', ''),
            ef_text('step_title', 'title', 'Заголовок', ''),
            ef_textarea('step_desc', 'desc', 'Описание', ''),
            ef_text('step_icon', 'icon', 'Иконка (Lucide)', 'CheckCircle2'),
        ], 'Добавить этап') ]
    ), 'location' => ef_loc_tpl('page-process.php')]);

    /* ===== Филиалы ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_branches', 'title' => 'Страница «Филиалы»', 'fields' => array_merge(
        ef_banner('br', '4 современных филиала для удобства семей', 'Все филиалы оборудованы с учётом требований доступной среды.', 'Наша сеть в Астане'),
        [ ef_repeater('br_items', 'branches', 'Филиалы', [
            ef_text('br_name', 'name', 'Название', ''),
            ef_text('br_addr', 'address', 'Адрес', ''),
            ef_text('br_dist', 'district', 'Район', ''),
            ef_text('br_phone', 'phone', 'Телефон', ''),
            ef_text('br_wa', 'whatsapp', 'WhatsApp', ''),
            ef_text('br_hours', 'workHours', 'Часы работы', ''),
            ef_textarea('br_feat', 'features_text', 'Оснащение (через запятую)', ''),
        ], 'Добавить филиал') ]
    ), 'location' => ef_loc_tpl('page-branches.php')]);

    /* ===== Команда ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_team', 'title' => 'Страница «Команда»', 'fields' => array_merge(
        ef_banner('team', 'Руководство и междисциплинарная команда фонда', 'Логопеды, дефектологи, психологи, инструкторы АФК/ЛФК и педагоги.', '45+ специалистов'),
        [ ef_repeater('team_items', 'specialists', 'Специалисты', [
            ef_text('sp_name', 'name', 'ФИО', ''),
            ef_text('sp_role', 'role', 'Должность', ''),
            ef_text('sp_exp', 'experience', 'Опыт', ''),
            ef_text('sp_edu', 'education', 'Образование', ''),
            ef_textarea('sp_bio', 'bio', 'О специалисте', ''),
            ef_image('sp_img', 'image', 'Фото'),
        ], 'Добавить специалиста') ]
    ), 'location' => ef_loc_tpl('page-team.php')]);

    /* ===== Центр UMAY ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_umay', 'title' => 'Страница «Центр UMAY»', 'fields' => array_merge(
        ef_banner('umay', 'Центр поддержки матерей UMAY', 'Пространство психологической, юридической и социальной поддержки для матерей.', 'Мать и Дитя'),
        [ ef_repeater('umay_dirs', 'directions', 'Направления', [
            ef_text('umd_title', 'title', 'Заголовок', ''),
            ef_textarea('umd_text', 'text', 'Описание', ''),
            ef_text('umd_icon', 'icon', 'Иконка (Lucide)', 'Heart'),
        ], 'Добавить направление') ]
    ), 'location' => ef_loc_tpl('page-umay.php')]);

    /* ===== Благотворительность ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_charity', 'title' => 'Страница «Благотворительность»', 'fields' => array_merge(
        ef_banner('char', 'Социальные проекты и инициативы фонда', 'Ваше пожертвование помогает закупать оборудование и поддерживать семьи.', 'Прозрачность и отчётность'),
        [ ef_repeater('char_items', 'projects', 'Проекты', [
            ef_text('pr_title', 'title', 'Название', ''),
            ef_textarea('pr_desc', 'description', 'Описание', ''),
            ef_number('pr_target', 'targetAmount', 'Цель (₸)', 0),
            ef_number('pr_current', 'currentAmount', 'Собрано (₸)', 0),
            ef_number('pr_ben', 'beneficiariesCount', 'Детей в проекте', 0),
            ef_text('pr_status', 'status', 'Статус (active/completed)', 'active'),
            ef_image('pr_img', 'image', 'Фото'),
        ], 'Добавить проект') ]
    ), 'location' => ef_loc_tpl('page-charity.php')]);

    /* ===== Документы ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_documents', 'title' => 'Страница «Документы»', 'fields' => array_merge(
        ef_banner('doc', 'Уставные документы и прозрачная отчётность', 'Учредительные документы, стандарты, правила и годовые отчёты.', 'Документы'),
        [ ef_repeater('doc_items', 'documents', 'Документы', [
            ef_text('doc_title', 'title', 'Название', ''),
            ef_text('doc_cat', 'category', 'Категория', ''),
            ef_text('doc_size', 'fileSize', 'Размер', ''),
            ef_text('doc_date', 'date', 'Дата', ''),
            ef_url('doc_url', 'fileUrl', 'Ссылка на файл', '#'),
        ], 'Добавить документ') ]
    ), 'location' => ef_loc_tpl('page-documents.php')]);

    /* ===== Новости ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_news', 'title' => 'Страница «Новости»', 'fields' => array_merge(
        ef_banner('news', 'Новости, акции и полезные статьи', 'Свежие события, наборы на курсы и фоторепортажи.', 'События фонда'),
        [ ef_repeater('news_items', 'news', 'Новости', [
            ef_text('nw_title', 'title', 'Заголовок', ''),
            ef_textarea('nw_sum', 'summary', 'Краткое', ''),
            ef_textarea('nw_content', 'content', 'Полный текст', ''),
            ef_text('nw_date', 'date', 'Дата', ''),
            ef_text('nw_badge', 'badge', 'Бейдж', ''),
            ef_image('nw_img', 'image', 'Фото'),
        ], 'Добавить новость') ]
    ), 'location' => ef_loc_tpl('page-news.php')]);

    /* ===== Отзывы и FAQ ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_reviews', 'title' => 'Страница «Отзывы и FAQ»', 'fields' => array_merge(
        ef_banner('rev', 'Отзывы родителей и ответы на вопросы', 'Реальные результаты реабилитации и ответы на частые вопросы.', 'Истории семей'),
        [
            ef_repeater('rev_items', 'reviews', 'Отзывы', [
                ef_text('rv_name', 'parentName', 'Имя родителя', ''),
                ef_text('rv_child', 'childAgeDiagnosis', 'Ребёнок (возраст, диагноз)', ''),
                ef_textarea('rv_text', 'text', 'Текст отзыва', ''),
                ef_text('rv_result', 'result', 'Результат', ''),
                ef_number('rv_rating', 'rating', 'Оценка (1-5)', 5),
                ef_image('rv_avatar', 'avatar', 'Аватар'),
            ], 'Добавить отзыв'),
            ef_repeater('faq_items', 'faqs', 'Вопросы (FAQ)', [
                ef_text('fq_q', 'question', 'Вопрос', ''),
                ef_textarea('fq_a', 'answer', 'Ответ', ''),
            ], 'Добавить вопрос'),
        ]
    ), 'location' => ef_loc_tpl('page-reviews-faq.php')]);

    /* ===== Контакты ===== */
    acf_add_local_field_group(['key' => 'group_erekshe_contacts', 'title' => 'Страница «Контакты»', 'fields' => array_merge(
        ef_banner('cnt', 'Свяжитесь с нами или запишитесь на прием', '4 филиала в Астане. Головной офис принимает документы и заявки.', 'Контакты и запись'),
        [
            ef_text('cnt_org', 'contact_org', 'Организация', 'ОФ «EREKSHE ANALAR»'),
            ef_text('cnt_addr', 'contact_address', 'Адрес головного центра', 'г. Астана, ул. Аманат, 12/1'),
            ef_text('cnt_hours', 'contact_hours', 'График работы', 'Пн - Пт: 09:00 - 18:00'),
        ]
    ), 'location' => ef_loc_tpl('page-contacts.php')]);
}
