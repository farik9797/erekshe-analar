<?php
if (!defined('ABSPATH')) exit;
get_header(); ?>
<div class="max-w-4xl mx-auto px-4 py-16">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article class="prose max-w-none">
      <h1 class="text-[1.2rem] sm:text-4xl font-extrabold text-slate-900 mb-6"><?php the_title(); ?></h1>
      <div class="text-slate-700 leading-relaxed"><?php the_content(); ?></div>
    </article>
  <?php endwhile; else: ?>
    <p class="text-slate-600">Записи не найдены.</p>
  <?php endif; ?>
</div>
<?php get_footer();
