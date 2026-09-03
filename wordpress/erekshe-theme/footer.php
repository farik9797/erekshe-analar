<?php
if (!defined('ABSPATH')) exit;
$logo   = EREKSHE_URI . '/assets/images/regenerated_image_1785993330916.png';
$phone  = erekshe_opt('phone', '+7 (7172) 70-80-90');
$email  = erekshe_opt('email', 'info@ereksheanalar.kz');
$nav    = erekshe_nav_items();
$services = [
  ['url' => 'services', 'key' => 'd_svcLogoped'],
  ['url' => 'services', 'key' => 'd_svcPsychologist'],
  ['url' => 'services', 'key' => 'd_svcDefectolog'],
  ['url' => 'services', 'key' => 'd_svcAfk'],
  ['url' => 'services', 'key' => 'd_svcPhysio'],
  ['url' => 'services', 'key' => 'd_svcMassage'],
  ['url' => 'services', 'key' => 'd_svcHydro'],
  ['url' => 'services', 'key' => 'd_svcSocial'],
];
?>
</main>

<footer class="bg-emerald-950 text-emerald-100 pt-16 pb-8 border-t border-emerald-900">
  <div class="max-w-7xl mx-auto px-4">
    <div class="flex flex-wrap xl:flex-nowrap justify-between gap-8 pb-12 border-b border-emerald-900/80">
      <!-- Col 1: Foundation info -->
      <div class="w-full xl:w-[300px] xl:max-w-[300px] flex flex-col gap-4 flex-shrink-0">
        <a href="<?php echo esc_url(erekshe_nav_url('')); ?>" class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-2xl bg-white p-0.5 flex items-center justify-center overflow-hidden shadow-sm">
            <img src="<?php echo esc_url($logo); ?>" alt="EREKSHE ANALAR" class="w-full h-full object-contain" />
          </div>
          <span class="font-extrabold text-xl text-white tracking-tight">EREKSHE ANALAR</span>
        </a>
        <p class="text-xs text-emerald-200/80 leading-relaxed"><?php echo esc_html(erekshe_t('d_footerDesc')); ?></p>
        <div class="flex items-center gap-3 pt-2">
          <button type="button" data-a11y-toggle class="flex items-center gap-2 px-3 py-1.5 rounded-lg text-xs font-bold bg-emerald-900/80 hover:bg-emerald-800 text-emerald-100 border border-emerald-700 transition cursor-pointer">
            <?php echo erekshe_icon('Eye', 'w-4 h-4 text-amber-400'); ?><span><?php echo esc_html(erekshe_t('visuallyImpairedVersion')); ?></span>
          </button>
        </div>
      </div>

      <!-- Col 2: Navigation -->
      <div class="w-full sm:w-auto flex flex-col gap-3 flex-shrink-0">
        <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-1"><?php echo esc_html(erekshe_t('d_footerNav')); ?></h4>
        <ul class="flex flex-col gap-2 text-xs font-medium text-emerald-200/80">
          <?php foreach ($nav as $item): if ($item['slug'] === 'reviews-faq') continue; ?>
            <li><a href="<?php echo esc_url($item['url']); ?>" class="hover:text-amber-300 transition"><?php echo esc_html($item['label']); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Col 3: Services -->
      <div class="w-full sm:w-auto flex flex-col gap-3 flex-1 min-w-[200px]">
        <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-1"><?php echo esc_html(erekshe_t('d_footerServices')); ?></h4>
        <ul class="flex flex-col gap-2 text-xs font-medium text-emerald-200/80">
          <?php foreach ($services as $s): ?>
            <li><a href="<?php echo esc_url(erekshe_nav_url($s['url'])); ?>" class="hover:text-amber-300 transition flex items-center gap-1.5">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span><?php echo esc_html(erekshe_t($s['key'])); ?>
            </a></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <!-- Col 4: Branches -->
      <div class="w-full xl:w-[400px] xl:max-w-[400px] flex flex-col gap-3 flex-shrink-0">
        <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-1"><?php echo esc_html(erekshe_t('d_footerBranches')); ?></h4>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
          <?php foreach (erekshe_branches() as $b): ?>
            <a href="<?php echo esc_url(erekshe_nav_url('branches')); ?>" class="bg-emerald-900/60 p-3 rounded-xl border border-emerald-800/80 hover:border-amber-400 transition group">
              <p class="font-bold text-white group-hover:text-amber-300 transition"><?php echo esc_html($b['name']); ?></p>
              <p class="text-[11px] text-emerald-200/70 mt-1 flex items-center gap-1">
                <?php echo erekshe_icon('MapPin', 'w-3 h-3 text-emerald-400 flex-shrink-0'); ?>
                <span><?php echo esc_html($b['address']); ?></span>
              </p>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!-- Bottom bar -->
    <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-emerald-300/70 font-medium">
      <p>© <?php echo esc_html(date('Y')); ?> <?php echo esc_html(erekshe_t('foundationName')); ?>. <?php echo esc_html(erekshe_t('d_rightsReserved')); ?></p>
      <button type="button" data-scroll-top class="flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-900 hover:bg-emerald-800 text-emerald-100 border border-emerald-800 transition cursor-pointer">
        <span><?php echo esc_html(erekshe_t('d_toTop')); ?></span><?php echo erekshe_icon('ArrowUp', 'w-3.5 h-3.5'); ?>
      </button>
    </div>
  </div>
</footer>

<?php
get_template_part('template-parts/modal-enroll');
get_template_part('template-parts/modal-donation');
get_template_part('template-parts/modal-search');
wp_footer();
?>
</body>
</html>
