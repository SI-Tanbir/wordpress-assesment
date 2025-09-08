<footer class="footer section">
	<div class="container">
		<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
		<nav aria-label="Footer">
			<?php wp_nav_menu([
				'theme_location' => 'footer',
				'container' => false,
				'menu_class' => '',
			]); ?>
		</nav>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>


