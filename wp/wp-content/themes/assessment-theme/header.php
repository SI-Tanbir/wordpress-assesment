<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
	<div class="container header-inner">
		<a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
			<span><?php bloginfo('name'); ?></span>
		</a>
		<nav class="nav" aria-label="Primary">
			<?php wp_nav_menu([
				'theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'menu',
				'items_wrap' => '<ul class="menu flex">%3$s</ul>',
			]); ?>
		</nav>
		<button class="hamburger" aria-controls="mobile-menu" aria-expanded="false" id="hamburger">
			<span aria-hidden="true">☰</span>
			<span class="screen-reader-text">Menu</span>
		</button>
	</div>
	<div class="offcanvas" id="mobile-menu" hidden>
		<div class="offcanvas-panel">
			<?php wp_nav_menu([
				'theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'menu',
				'items_wrap' => '<ul class="menu">%3$s</ul>',
			]); ?>
		</div>
	</div>
</header>


