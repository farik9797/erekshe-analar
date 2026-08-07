<?php
if (!defined('ABSPATH')) exit;
$logo   = EREKSHE_URI . '/assets/images/regenerated_image_1785993330916.png';
$phone  = erekshe_opt('phone', '+7 (7172) 70-80-90');
$phone_tel = preg_replace('/[^0-9+]/', '', $phone);
$wa     = erekshe_opt('whatsapp_url', 'https://wa.me/77084251212');
$insta  = erekshe_opt('instagram_url', 'https://instagram.com/erekshe_analar');
$hours  = erekshe_opt('work_hours', erekshe_t('workingHours'));
$city   = erekshe_opt('city', erekshe_t('astanaCity'));
$nav    = erekshe_nav_items();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class('min-h-screen flex flex-col bg-white text-slate-900 font-sans antialiased'); ?>>
<?php wp_body_open(); ?>

<header class="w-full bg-white border-b border-slate-100 shadow-xs sticky top-0 z-40 transition-all">
  <!-- Top Bar -->
  <div class="bg-slate-900 text-slate-200 text-xs py-2 px-4 border-b border-slate-800">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
      <!-- Left info -->
      <div class="flex flex-wrap items-center gap-4 w-full justify-between sm:w-auto sm:justify-normal">
        <a href="<?php echo esc_url(erekshe_nav_url('branches')); ?>" class="flex items-center gap-1.5 text-emerald-400 hover:text-emerald-300 font-semibold transition">
          <?php echo erekshe_icon('MapPin', 'w-3.5 h-3.5'); ?>
          <?php echo esc_html($city); ?> (<?php echo esc_html(erekshe_t('branchesCountShort')); ?>)
        </a>
        <span class="hidden md:flex items-center gap-1.5 text-slate-400">
          <?php echo erekshe_icon('Clock', 'w-3.5 h-3.5 text-slate-400'); ?>
          <?php echo esc_html($hours); ?>
        </span>
        <a href="tel:<?php echo esc_attr($phone_tel); ?>" class="flex items-center gap-1 text-slate-200 hover:text-emerald-400 font-semibold transition">
          <?php echo erekshe_icon('Phone', 'w-3.5 h-3.5 text-emerald-400'); ?>
          <?php echo esc_html($phone); ?>
        </a>
      </div>

      <!-- Right actions -->
      <div class="flex items-center gap-2.5 w-full justify-between sm:w-auto sm:justify-normal">
        <button type="button" data-a11y-toggle class="flex items-center gap-1.5 px-2.5 py-1 rounded text-xs font-semibold transition border cursor-pointer bg-slate-800 text-slate-200 hover:bg-slate-700 border-slate-700 hover:border-emerald-500" title="<?php echo esc_attr(erekshe_t('visuallyImpairedVersion')); ?>">
          <?php echo erekshe_icon('Eye', 'w-3.5 h-3.5 text-amber-400'); ?>
          <span class="hidden sm:inline"><?php echo esc_html(erekshe_t('visuallyImpairedVersion')); ?></span>
          <span class="sm:hidden">АА</span>
        </button>

        <?php erekshe_language_switcher(); ?>

        <div class="order-2 sm:order-3 flex items-center gap-1.5 sm:ml-1">
          <a href="<?php echo esc_url($wa); ?>" target="_blank" rel="noopener noreferrer" class="w-6 h-6 rounded-lg bg-emerald-500 text-white flex items-center justify-center hover:scale-110 transition cursor-pointer" title="WhatsApp" aria-label="WhatsApp">
            <?php echo erekshe_icon('MessageCircle', 'w-3.5 h-3.5'); ?>
          </a>
          <a href="<?php echo esc_url($insta); ?>" target="_blank" rel="noopener noreferrer" class="w-6 h-6 rounded-lg bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] text-white flex items-center justify-center shadow-xs hover:scale-105 transition cursor-pointer" title="Instagram" aria-label="Instagram">
            <?php echo erekshe_icon('Instagram', 'w-3.5 h-3.5'); ?>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Row 2: Logo + Search + Actions + Burger -->
  <div class="max-w-7xl mx-auto px-4 py-3 flex items-center justify-between gap-3 sm:gap-4">
    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3 group flex-shrink-0">
      <div class="w-10 h-10 sm:w-11 sm:h-11 rounded-2xl bg-white p-0.5 border border-slate-200/80 shadow-md shadow-emerald-600/10 group-hover:scale-105 transition-transform flex items-center justify-center overflow-hidden">
        <img src="<?php echo esc_url($logo); ?>" alt="EREKSHE ANALAR" class="w-full h-full object-contain" />
      </div>
      <div class="flex flex-col">
        <span class="font-extrabold text-base sm:text-lg md:text-xl text-slate-900 tracking-tight leading-none group-hover:text-emerald-700 transition-colors">EREKSHE ANALAR</span>
        <span class="text-[11px] text-slate-500 font-medium tracking-normal mt-0.5 hidden md:block"><?php echo esc_html(erekshe_t('d_headerLogoSubtitle')); ?></span>
      </div>
    </a>

    <!-- Search (скрыт на мобильном, доступен в drawer) -->
    <div class="hidden sm:block flex-1 max-w-md mx-1 sm:mx-4">
      <button type="button" data-search-open class="w-full flex items-center justify-between gap-2 px-3 sm:px-4 py-2 rounded-xl bg-slate-100/90 hover:bg-slate-200/80 border border-slate-200 text-slate-500 hover:text-slate-800 text-xs transition shadow-2xs group cursor-pointer">
        <div class="flex items-center gap-2 overflow-hidden">
          <?php echo erekshe_icon('Search', 'w-4 h-4 text-emerald-600 flex-shrink-0'); ?>
          <span class="truncate text-slate-600"><?php echo esc_html(erekshe_t('searchPlaceholder')); ?></span>
        </div>
      </button>
    </div>

    <!-- Header action buttons (десктоп) -->
    <div class="hidden lg:flex items-center gap-2 flex-shrink-0">
      <button type="button" data-donation-open class="flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-bold text-emerald-700 bg-emerald-50 border border-emerald-200 hover:bg-emerald-100 hover:border-emerald-300 transition shadow-xs cursor-pointer">
        <?php echo erekshe_icon('HeartHandshake', 'w-4 h-4 text-emerald-600'); ?>
        <span class="hidden md:inline"><?php echo esc_html(erekshe_t('btnSupport')); ?></span>
        <span class="md:hidden"><?php echo esc_html(erekshe_t('btnSupportShort')); ?></span>
      </button>
      <button type="button" data-enroll-open class="flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-md shadow-emerald-600/20 transition hover:scale-[1.02] active:scale-[0.98] cursor-pointer">
        <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?>
        <span><?php echo esc_html(erekshe_t('btnEnroll')); ?></span>
      </button>
    </div>

    <!-- Burger -->
    <button type="button" data-menu-toggle class="lg:hidden p-2 rounded-xl text-slate-700 hover:bg-slate-100 transition cursor-pointer flex-shrink-0" aria-label="Toggle Navigation Menu">
      <span data-menu-icon-open><?php echo erekshe_icon('Menu', 'w-6 h-6 text-slate-700'); ?></span>
      <span data-menu-icon-close class="hidden"><?php echo erekshe_icon('X', 'w-6 h-6 text-emerald-700'); ?></span>
    </button>
  </div>

  <!-- Row 3: Navigation (десктоп) -->
  <div class="hidden lg:block bg-slate-50/90 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 py-1.5">
      <nav class="flex items-center justify-between gap-0.5 xl:gap-1 text-xs font-semibold text-slate-700">
        <?php foreach ($nav as $item):
          $active = erekshe_nav_is_active($item['slug']); ?>
          <a href="<?php echo esc_url($item['url']); ?>" class="px-2 xl:px-3 py-1.5 rounded-lg whitespace-nowrap transition <?php echo $active ? 'bg-emerald-600 text-white font-bold shadow-xs' : 'hover:bg-emerald-100/80 hover:text-emerald-800 text-slate-700'; ?>">
            <?php echo esc_html($item['label']); ?>
          </a>
        <?php endforeach; ?>
      </nav>
    </div>
  </div>

  <!-- Mobile Drawer -->
  <div data-mobile-menu class="hidden lg:hidden bg-white border-t border-slate-100 shadow-xl px-4 pt-3 pb-6">
    <div class="grid grid-cols-2 gap-2 mb-4">
      <?php foreach ($nav as $item):
        $active = erekshe_nav_is_active($item['slug']); ?>
        <a href="<?php echo esc_url($item['url']); ?>" class="px-3 py-2.5 rounded-lg text-xs font-semibold flex items-center justify-between border transition <?php echo $active ? 'bg-emerald-600 text-white border-emerald-600 font-bold' : 'bg-slate-50 hover:bg-emerald-50 hover:text-emerald-700 text-slate-700 border-slate-100'; ?>">
          <span><?php echo esc_html($item['label']); ?></span>
          <?php echo erekshe_icon('ChevronRight', 'w-3.5 h-3.5 opacity-60'); ?>
        </a>
      <?php endforeach; ?>
    </div>
    <div class="flex flex-col gap-2 pt-3 border-t border-slate-100">
      <button type="button" data-enroll-open class="w-full py-3 rounded-xl text-xs font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 flex items-center justify-center gap-2 shadow-md shadow-emerald-600/20 transition cursor-pointer">
        <?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('btnEnroll')); ?></span>
      </button>
      <a href="tel:<?php echo esc_attr($phone_tel); ?>" class="w-full py-2.5 px-3 rounded-xl text-xs font-bold text-slate-800 bg-slate-100 hover:bg-slate-200 border border-slate-200 flex items-center justify-center gap-2 transition">
        <?php echo erekshe_icon('Phone', 'w-3.5 h-3.5 text-emerald-600'); ?><span><?php echo esc_html($phone); ?></span>
      </a>
      <button type="button" data-search-open class="w-full py-2.5 rounded-xl text-xs font-bold text-slate-700 bg-slate-50 hover:bg-slate-100 border border-slate-200 flex items-center justify-center gap-2 cursor-pointer transition">
        <?php echo erekshe_icon('Search', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('searchLabel')); ?></span>
      </button>
      <button type="button" data-donation-open class="w-full py-2.5 rounded-xl text-xs font-bold text-amber-900 bg-amber-50 hover:bg-amber-100 border border-amber-200 flex items-center justify-center gap-2 transition cursor-pointer">
        <?php echo erekshe_icon('HeartHandshake', 'w-4 h-4 text-amber-600'); ?><span><?php echo esc_html(erekshe_t('btnSupport')); ?></span>
      </button>
    </div>
  </div>

  <!-- Панель доступности -->
  <?php get_template_part('template-parts/accessibility-bar'); ?>
</header>

<main class="flex-1">
