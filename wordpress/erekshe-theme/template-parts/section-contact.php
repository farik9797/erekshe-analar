<?php if (!defined('ABSPATH')) exit;
$phone = erekshe_opt('phone', '+7 (7172) 70-80-90');
$email = erekshe_opt('email', 'info@ereksheanalar.kz');
$wa_num = erekshe_opt('whatsapp_num', '+7 (708) 425-12-12');
$org = erekshe_field('contact_org', erekshe_t('donationOrgName'));
$addr = erekshe_field('contact_address', erekshe_t('c_ContactAddress'));
$hours = erekshe_field('contact_hours', erekshe_t('workingHours'));
?>
<section class="fade-in py-16 md:py-24 bg-white">
  <div class="max-w-7xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold mb-3"><?php echo erekshe_icon('PhoneCall', 'w-4 h-4 text-emerald-600'); ?><span><?php echo esc_html(erekshe_t('contactBadge')); ?></span></div>
      <h2 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php echo esc_html(erekshe_t('contactTitle', 'Свяжитесь с нами или запишитесь на прием')); ?></h2>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
      <div class="bg-slate-900 text-white p-4 sm:p-8 rounded-3xl shadow-xl">
        <p class="text-emerald-400 text-xs font-bold uppercase tracking-wider mb-2"><?php echo esc_html(erekshe_t('contactHeadquarters')); ?></p>
        <h3 class="text-2xl font-extrabold mb-6"><?php echo esc_html($org); ?></h3>
        <div class="flex flex-col gap-4">
          <?php
          $contacts = [['MapPin',erekshe_t('c_ContactAddressLabel'),$addr],['Clock',erekshe_t('c_ContactScheduleLabel'),$hours],['Phone',erekshe_t('contactPhoneTitle'),$phone],['MessageCircle',erekshe_t('c_ContactWhatsappLabel'),$wa_num],['Mail',erekshe_t('contactEmailTitle'),$email],['Instagram','Instagram:','@erekshe_analar_astana']];
          foreach ($contacts as $c): ?>
            <div class="flex items-start gap-3"><?php echo erekshe_icon($c[0], 'w-5 h-5 text-emerald-400 flex-shrink-0 mt-0.5'); ?><div><p class="text-xs font-bold text-slate-400 uppercase tracking-wider"><?php echo esc_html($c[1]); ?></p><p class="text-sm font-bold text-white mt-0.5"><?php echo esc_html($c[2]); ?></p></div></div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="bg-slate-50 p-4 sm:p-8 rounded-3xl border border-slate-200/80 shadow-sm flex flex-col justify-center items-center text-center gap-4">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-emerald-100 text-emerald-800 text-xs font-bold"><?php echo erekshe_icon('Sparkles', 'w-4 h-4'); ?><span><?php echo esc_html(erekshe_t('c_EnrollBadge')); ?></span></div>
        <h3 class="text-2xl font-extrabold text-slate-900"><?php echo esc_html(erekshe_t('formTitle')); ?></h3>
        <p class="text-sm text-slate-600"><?php echo esc_html(erekshe_t('formSubtitle')); ?></p>
        <button type="button" data-enroll-open class="w-full py-3.5 rounded-xl text-sm font-bold text-white bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-700 hover:to-teal-700 shadow-lg transition flex items-center justify-center gap-2"><?php echo erekshe_icon('Send', 'w-5 h-5'); ?><span><?php echo esc_html(erekshe_t('btnEnroll')); ?></span></button>
      </div>
    </div>
  </div>
</section>
