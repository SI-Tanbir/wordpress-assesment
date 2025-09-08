<?php get_header(); ?>
<main class="section">
	<div class="container">
		<h1><?php post_type_archive_title(); ?></h1>
		<div class="grid cols-3">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article class="card">
					<a href="<?php the_permalink(); ?>">
						<?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } else { echo '<img src="https://picsum.photos/seed/'.get_the_ID().'/800/600" alt=""/>'; } ?>
					</a>
					<div class="card-body">
						<h3><?php the_title(); ?></h3>
						<?php if (function_exists('get_field')): ?>
							<p class="lead"><?php echo esc_html(get_field('location')); ?> — $<?php echo number_format((float) get_field('price')); ?></p>
						<?php endif; ?>
						<a class="btn" href="<?php the_permalink(); ?>">View Details</a>
					</div>
				</article>
			<?php endwhile; endif; ?>
		</div>
		<?php the_posts_pagination(); ?>
	</div>
</main>
<?php get_footer(); ?>


