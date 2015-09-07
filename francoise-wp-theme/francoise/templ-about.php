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
			<div class="pageAboutImg">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail( 'unithumb-pagebigimage', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
            <?php } else { ?>
			    <img src="http://placehold.it/840x560/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="840" height="560">
            <?php } ?>
			</div>
			<div class="pageAboutDesc">
				<h1><?php the_title() ?></h1>

				<i class="iconLocation"></i>
                <?php if ( !empty($aPostCustom['uni_my_location'][0]) ) { ?>
                <div class="locationDesc"><?php echo esc_html( $aPostCustom['uni_my_location'][0] ); ?></div>
                <?php } else { ?>
				<div class="locationDesc">San francisco, California</div>
                <?php } ?>

				<?php the_content() ?>

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