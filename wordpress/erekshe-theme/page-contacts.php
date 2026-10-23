<?php /**
 * Template Name: EREKSHE — Контакты
 * 1:1 с src/pages/ContactsPage.tsx
 */ if (!defined('ABSPATH')) exit; get_header(); ?>
<div class="bg-slate-50 min-h-screen py-10 space-y-12">
  <div class="fade-in">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-gradient-to-r from-emerald-900 via-teal-900 to-slate-900 text-white rounded-3xl p-4 md:p-12 shadow-xl">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300 text-xs font-bold border border-emerald-400/30 mb-4">
          <?php echo erekshe_icon('Phone', 'w-4 h-4'); ?><?php echo esc_html(erekshe_field('banner_badge', erekshe_t('contactsBadge'))); ?>
        </span>
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4"><?php echo esc_html(erekshe_field('banner_title', erekshe_t('contactsTitle'))); ?></h1>
        <p class="text-slate-200 text-base md:text-lg leading-relaxed max-w-2xl mb-6"><?php echo esc_html(erekshe_field('banner_desc', erekshe_t('contactsDesc'))); ?></p>
        <div class="flex flex-wrap items-center gap-4 text-xs font-semibold">
          <a href="https://wa.me/77053089733" target="_blank" rel="noopener noreferrer" class="px-4 py-2.5 rounded-xl bg-emerald-500 text-slate-950 font-bold hover:bg-emerald-400 transition flex items-center gap-2">
            <?php echo erekshe_icon('MessageCircle', 'w-4 h-4 fill-slate-950'); ?><span>WhatsApp +7 (705) 308-97-33</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="fade-in"><?php get_template_part('template-parts/section-contact', null, ['hide_header' => true]); ?></div>
  <div class="fade-in"><?php get_template_part('template-parts/section-branches'); ?></div>
</div>
<?php get_footer();
