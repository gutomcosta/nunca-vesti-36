<?php get_header();
$sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' ); ?>

	<section class="container">
		<div class="wrapper clear">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="contentLeft">
				<div class="singlePostMeta">
					<h1><?php the_title() ?></h1>
				</div>
				<div id="post-<?php the_ID(); ?>" <?php post_class('singlePostWrap clear') ?>>
					<div class="singlePostImg">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <?php the_post_thumbnail( 'unithumb-pagebigimage', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                    <?php } ?>
					</div>

                    <?php the_content() ?>

				</div>

				<div class="pageSocial">
					<div class="pageSocialWrapper">
						<?php include(locate_template('includes/social-links.php')); ?>
					</div>
				</div>

                <?php comments_template(); ?>

			</div>
        <?php endwhile; endif; ?>

            <?php get_sidebar() ?>

		</div>
		<div class="clear"></div>

        <?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>