<?php get_header();
$sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' ); ?>

	<section class="container">
		<div class="wrapper clear">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="contentLeft">
				<div id="post-<?php the_ID(); ?>" <?php post_class('singlePostMeta') ?>>
                    <time class="singlePostTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
					<h1><?php the_title() ?></h1>
					<div class="postCategoryWrap">

					

        <?php
        $aTags = wp_get_post_terms( $post->ID, 'category' );
        if ( $aTags && !is_wp_error( $aTags ) ) :
        $s = count($aTags);
        $i = 1;
	    foreach ( $aTags as $oTerm ) {
	        echo '<a href="'.get_term_link( $oTerm->slug, 'category' ).'" class="singlePostCategory">'.esc_html( $oTerm->name ).'</a>';
            if ($i < $s) echo ', ';
            $i++;
	    }
        endif;
        ?>

					</div>
				</div>
				<div class="singlePostWrap clear">

                    <?php the_content() ?>

				</div>

                <div class="singleLinkPages">
                    <?php wp_link_pages(); ?>
                </div>

				<div class="singlePostTags">
                    <?php the_tags( '<span>'.__('Tags', 'francoise').':</span><br>', ', ', '' ); ?>
				</div>

				<div class="pageSocial">
					<div class="pageSocialWrapper">
						<?php include(locate_template('includes/social-links.php')); ?>
					</div>
				</div>

        <?php
        $oAdjacentPost  = get_adjacent_post(false,'',true);
        $sPrevPostId    = ( isset($oAdjacentPost) && !empty($oAdjacentPost) ) ? $oAdjacentPost->ID : '';
        $oAdjacentPost  = get_adjacent_post(false,'',false);
        $sNextPostId    = ( isset($oAdjacentPost) && !empty($oAdjacentPost) ) ? $oAdjacentPost->ID : '';
        ?>
				<div class="singlePostNavigation clear">
                <?php if ( isset($sPrevPostId) && !empty($sPrevPostId) ) { ?>
					<div class="fcell">
						<div class="postNavigationItem">
                        <?php if ( has_post_thumbnail($sPrevPostId) ) { ?>
                            <?php echo get_the_post_thumbnail( $sPrevPostId, 'unithumb-adjacentposts', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                        <?php } else { ?>
					        <img src="http://placehold.it/60x60/8acace/ffffff" alt="<?php the_title_attribute(array('post' => $sPrevPostId)) ?>" width="60" height="60">
                        <?php } ?>
							<p><?php echo get_the_title($sPrevPostId) ?></p>
							<a class="previousPostLink" href="<?php echo get_permalink( $sPrevPostId ); ?>"><?php _e('Previous post', 'francoise') ?></a>
						</div>
					</div>
                <?php } ?>
                <?php if ( isset($sNextPostId) && !empty($sNextPostId) ) { ?>
					<div class="scell">
						<div class="postNavigationItem">
                        <?php if ( has_post_thumbnail($sNextPostId) ) { ?>
                            <?php echo get_the_post_thumbnail( $sNextPostId, 'unithumb-adjacentposts', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                        <?php } else { ?>
					        <img src="http://placehold.it/60x60/8acace/ffffff" alt="<?php the_title_attribute(array('post' => $sNextPostId)) ?>" width="60" height="60">
                        <?php } ?>
							<p><?php echo get_the_title($sNextPostId) ?></p>
							<a class="newerPostLink" href="<?php echo get_permalink( $sNextPostId ); ?>"><?php _e('Newer post', 'francoise') ?></a>
						</div>
					</div>
                <?php } ?>
				</div>

				<?php uni_related_posts_by_tags(); ?>

                <?php comments_template(); ?>

			</div>
        <?php endwhile; endif; ?>

        <?php if ( ot_get_option( 'uni_single_archive_style' ) != 'wo-sidebar' ) { ?>
            <?php get_sidebar() ?>
        <?php } ?>

		</div>
		<div class="clear"></div>

        <?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>