<?php get_header(); ?>
<main class="container section">
	<h1><?php bloginfo('name'); ?></h1>
	<p class="lead"><?php bloginfo('description'); ?></p>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class('section'); ?>>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div><?php the_excerpt(); ?></div>
		</article>
	<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>


