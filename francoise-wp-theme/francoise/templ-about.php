<?php
/*
*  Template Name: About Page
*/
get_header(); ?>

	<section class="container">
		<div class="wrapper clear">

        <?php if (have_posts()) : while (have_posts()) : the_post();
        $aPostCustom = get_post_custom( $post->ID );
        ?>
			<div class="pageAboutDesc" style="margin-top: 180px">
				<h1><?php the_title() ?></h1>


				<?php the_content() ?>

            <i class="iconLocation"></i>
                <?php if ( !empty($aPostCustom['uni_my_location'][0]) ) { ?>
                <div class="locationDesc"><?php echo esc_html( $aPostCustom['uni_my_location'][0] ); ?></div>
                <?php } else { ?>
        <div class="locationDesc">San francisco, California</div>
                <?php } ?>


			</div>
			<div class="pageSocial">
				<div class="pageSocialWrapper">
					<?php include(locate_template('includes/social-links.php')); ?>
				</div>
			</div>
        <?php endwhile; endif; ?>

		</div>

        <?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>