<?php get_header(); ?>
<main class="section">
	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<?php if (has_post_thumbnail()) the_post_thumbnail('large'); ?>
				<div class="lead">
					<?php if (function_exists('get_field')): ?>
						<strong>Location:</strong> <?php echo esc_html(get_field('location')); ?>
						&nbsp;|&nbsp;
						<strong>Price:</strong> $<?php echo number_format((float) get_field('price')); ?>
					<?php endif; ?>
				</div>
				<div><?php the_content(); ?></div>

				<section class="section" style="padding-top:24px;">
					<h2>Checkout</h2>
					<p class="lead">Test mode payment using Stripe Payments plugin.</p>
					<?php 
					// Render a simple buy button using Stripe Payments shortcode in test mode.
					$amount = (float) (function_exists('get_field') ? get_field('price') : 9.99);
					echo do_shortcode('[accept_stripe_payment name="'.esc_attr(get_the_title()).'" price="'.esc_attr($amount).'" currency="USD" description="Property booking deposit (test)" button_text="Pay Test $'.esc_attr(number_format($amount,2)).'" class="btn" ]');
					?>
				</section>
			</article>
		<?php endwhile; endif; ?>
	</div>
</main>
<?php get_footer(); ?>


