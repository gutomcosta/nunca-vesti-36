<?php get_header(); ?>

	<section class="container">
		<div class="page404Wrap">
			<img src="<?php echo get_template_directory_uri(); ?>/images/404.png" alt="<?php _e('Error 404', 'francoise') ?>">
			<p><?php _e('The requested page has <br> not been found', 'francoise') ?></p>
			<a href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url() ); } ?>" class="homePageLink"><?php _e('Homepage', 'francoise') ?></a>
		</div>
		<div class="clear"></div>

		<?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>