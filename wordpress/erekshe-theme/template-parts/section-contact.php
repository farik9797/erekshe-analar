<?php if (!defined('ABSPATH')) exit;
// 1:1 с src/components/ContactSection.tsx (на «Контактах» шапку заменяет баннер страницы)
$hide_header = !empty($args['hide_header']);
$email  = erekshe_opt('email', 'info@ereksheanalar.kz');
$wa_num = erekshe_opt('whatsapp_num', '+7 (705) 308-97-33');
$wa_link = 'https://wa.me/' . preg_replace('/\D/', '', $wa_num);
$rows = [
  ['MapPin', erekshe_t('contactAddressLabel'), erekshe_field('contact_address', erekshe_t('contactHeadAddress')), '', ''],
  ['Clock', erekshe_t('contactHoursLabel'), erekshe_field('contact_hours', erekshe_t('workingHours')), '', ''],
  ['MessageCircle', erekshe_t('contactWhatsappLabel'), $wa_num, $wa_link, 'text-emerald-300'],
  ['Mail', erekshe_t('contactEmailTitle'), $email, 'mailto:' . $email, 'text-slate-200'],
  ['Instagram', 'Instagram:', '@erekshe.analar', 'https://www.instagram.com/erekshe.analar', 'text-emerald-300'],
];
?>
<section id="contacts" class="py-16 md:py-24 bg-white border-b border-slate-100">
  <div class="max-w-7xl mx-auto px-4">
    <?php if (!$hide_header): ?>
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3">
        <?php echo erekshe_icon('Phone', 'w-4 h-4 text-emerald-600'); ?>
        <span><?php echo esc_html(erekshe_t('contactBadge')); ?></span>
      </div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('contactTitle')); ?></h2>
    </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      <div class="lg:col-span-12 flex flex-col gap-6">
        <div class="bg-slate-900 text-white p-4 rounded-3xl shadow-xl relative overflow-hidden">
          <div class="absolute top-0 right-0 w-64 h-64 bg-emerald-600/20 rounded-full blur-3xl pointer-events-none"></div>
          <span class="text-xs font-bold uppercase tracking-widest text-emerald-400"><?php echo esc_html(erekshe_t('contactHeadquarters')); ?></span>
          <h3 class="text-2xl font-extrabold text-white mt-1 mb-6"><?php echo esc_html(erekshe_field('contact_org', erekshe_t('donationOrgName'))); ?></h3>
          <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 text-sm font-medium">
            <?php foreach ($rows as $c): ?>
              <div class="flex items-start gap-3">
                <?php echo erekshe_icon($c[0], 'w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5'); ?>
                <div>
                  <p class="text-xs text-slate-400 uppercase font-bold"><?php echo esc_html($c[1]); ?></p>
                  <?php if ($c[3]): ?>
                    <a href="<?php echo esc_url($c[3]); ?>"<?php echo strpos($c[3], 'mailto:') === 0 ? '' : ' target="_blank" rel="noopener noreferrer"'; ?> class="<?php echo esc_attr($c[4]); ?> font-bold hover:underline block mt-0.5"><?php echo esc_html($c[2]); ?></a>
                  <?php else: ?>
                    <p class="text-white font-bold mt-0.5"><?php echo esc_html($c[2]); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
