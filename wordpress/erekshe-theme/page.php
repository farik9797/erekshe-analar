<?php
/* Fallback-шаблон для страниц без отдельного шаблона.
   Порт отдельных страниц (about/services/…) — следующий этап. */
if (!defined('ABSPATH')) exit;
get_header(); ?>
<section class="py-16 md:py-24 bg-white">
  <div class="max-w-4xl mx-auto px-4">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <h1 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 tracking-tight"><?php the_title(); ?></h1>
    </div>
    <div class="text-slate-700 leading-relaxed prose max-w-none">
      <?php if (have_posts()): while (have_posts()): the_post(); the_content(); endwhile; endif; ?>
    </div>
  </div>
</section>
<?php get_footer();
