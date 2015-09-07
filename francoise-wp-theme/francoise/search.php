<?php get_header();
$sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' ); ?>

	<section class="container">
		<div class="wrapper clear">
			<div class="contentLeft">

				<div class="archivePageTitle">
                    <h1><?php printf( __( 'Search results for: "%s"', 'francoise' ), get_search_query() ); ?></h1>
                </div>

				<div class="archivePostWrap">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('archivePostItem') ?>>
                        <time class="archivePostTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
						<h3 class="archivePostTitle">
                            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                        </h3>
                        <div class="postCategoryWrap">
        <?php
        $aTags = wp_get_post_terms( $post->ID, 'category' );
        if ( $aTags && !is_wp_error( $aTags ) ) :
        $s = count($aTags);
        $i = 1;
	    foreach ( $aTags as $oTerm ) {
	        echo '<a href="'.get_term_link( $oTerm->slug, 'category' ).'" class="archivePostCategory">'.esc_html( $oTerm->name ).'</a>';
            if ($i < $s) echo ', ';
            $i++;
	    }
        endif;
        ?>
						</div>
						<a href="<?php the_permalink() ?>" class="archivePostImg">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'unithumb-blog', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                        <?php } else { ?>
						    <img src="http://placehold.it/840x512/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="840" height="512">
                        <?php } ?>
						</a>
						<?php the_excerpt(); ?>
						<div class="archivePostItemMeta">
							<a href="<?php comments_link(); ?>" class="archivePostItemComments"><?php comments_number(); ?></a>

							<div class="archivePostItemShareLinks">
								<?php include(locate_template('includes/social-links.php')); ?>
							</div>

							<a href="<?php the_permalink() ?>" class="archivePostReadMore"><?php _e('Read More', 'francoise') ?></a>
						</div>
					</div>
        <?php
        endwhile;
        else :
        ?>

            <?php get_template_part( 'no-results', 'archive' ); ?>

        <?php
        endif;
        ?>
				</div>

				<div class="postPagination">
					<ul class="clear">
						<li class="newPosts"><?php previous_posts_link( __('Newer posts', 'francoise') ); ?></li>
						<li class="olderPosts"><?php next_posts_link( __('Older posts', 'francoise')  ); ?></li>
					</ul>
				</div>

			</div>

            <?php get_sidebar() ?>

		</div>
		<div class="clear"></div>

        <?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>