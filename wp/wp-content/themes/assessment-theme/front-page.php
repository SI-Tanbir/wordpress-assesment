<?php get_header(); ?>

<section class="hero">
	<div class="swiper">
		<div class="swiper-wrapper">
			<?php for ($i = 1; $i <= 3; $i++) : ?>
				<div class="swiper-slide">
					<div class="slide-inner" style="background:url('https://picsum.photos/seed/<?php echo $i; ?>/1600/800') center/cover no-repeat;">
						<div class="container">
							<h1>Beautiful Properties</h1>
							<p>Discover your next home with us.</p>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
		<div class="swiper-pagination"></div>
		<div class="swiper-button-prev"></div>
		<div class="swiper-button-next"></div>
	</div>
</section>

<section class="section">
	<div class="container">
		<h2>Featured Properties</h2>
		<p class="lead">Dynamic listing powered by Custom Post Type.</p>
		<div class="grid cols-3">
			<?php
			$props = new WP_Query([
				'post_type' => 'property',
				'posts_per_page' => 6,
			]);
			if ($props->have_posts()) :
				while ($props->have_posts()) : $props->the_post(); ?>
					<article class="card">
						<a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()) { the_post_thumbnail('large'); } else { echo '<img src="https://picsum.photos/seed/'.get_the_ID().'/800/600" alt=""/>'; } ?>
						</a>
						<div class="card-body">
							<h3><?php the_title(); ?></h3>
							<?php if (function_exists('get_field')): ?>
								<p class="lead">
									<?php echo esc_html(get_field('location')); ?> — $<?php echo number_format((float) get_field('price')); ?>
								</p>
							<?php endif; ?>
							<a class="btn" href="<?php the_permalink(); ?>">View Details</a>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); endif; ?>
		</div>
	</div>
</section>

<section class="section" style="background: var(--light)">
	<div class="container">
		<h2>Why Choose Us</h2>
		<p class="lead">We provide curated listings, expert guidance, and seamless purchase experience.</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<h2>How It Works</h2>
		<ol>
			<li>Browse properties</li>
			<li>View details and schedule visits</li>
			<li>Checkout securely in test mode</li>
		</ol>
	</div>
</section>

<section class="section" style="background: var(--light)">
	<div class="container">
		<h2>Testimonials</h2>
		<p class="lead">“Great experience! Smooth from start to finish.”</p>
	</div>
</section>

<section class="section">
	<div class="container">
		<h2>Get in Touch</h2>
		<p class="lead">Have questions? Contact our team for assistance.</p>
	</div>
</section>

<?php get_footer(); ?>


