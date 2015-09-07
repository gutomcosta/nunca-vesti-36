<?php
/*
*  Template Name: Home Page One
*/
get_header();
$sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' ); ?>

	<section class="container">
		<div class="wrapper clear">

    <?php
    $aSelectedPosts = $aPostsToExcludeRecent = array();
    for ( $l = 1; $l <= 4; $l++ ) {
        if ( ot_get_option( 'uni_home_posts_'.$l ) ) $aSelectedPosts[] = ot_get_option( 'uni_home_posts_'.$l );
    }
    $iNumberOfPosts = count($aSelectedPosts);
    if ( $iNumberOfPosts == 4 ) {
        $aFeaturedArgs = array(
            'post_type'	=> 'post',
            'post_status' => 'publish',
            'ignore_sticky_posts'	=> 1,
            'posts_per_page' => 4,
            'post__in' => $aSelectedPosts,
            'orderby' => 'post__in',
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array(
                        'post-format-aside',
                        'post-format-audio',
                        'post-format-chat',
                        'post-format-gallery',
                        'post-format-image',
                        'post-format-link',
                        'post-format-quote',
                        'post-format-status',
                        'post-format-video'
                    ),
                    'operator' => 'NOT IN'
                )
            )
        );
    } else {
        $aFeaturedArgs = array(
            'post_type'	=> 'post',
            'post_status' => 'publish',
            'ignore_sticky_posts'	=> 1,
            'posts_per_page' => 4,
            'tax_query' => array(
                array(
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array(
                        'post-format-aside',
                        'post-format-audio',
                        'post-format-chat',
                        'post-format-gallery',
                        'post-format-image',
                        'post-format-link',
                        'post-format-quote',
                        'post-format-status',
                        'post-format-video'
                    ),
                    'operator' => 'NOT IN'
                )
            )
        );
    }

    $oFeaturedQuery = new WP_Query( $aFeaturedArgs );
    if ( $oFeaturedQuery->have_posts() ) :
    $iPostsFound = count($oFeaturedQuery->posts);
    $i = 1;
    while ( $oFeaturedQuery->have_posts() ) : $oFeaturedQuery->the_post();
        $aPostsToExcludeRecent[] = get_the_ID();
    ?>
        <?php if ( $i == 1 ) { ?>
			<a href="<?php the_permalink() ?>" id="post-<?php the_ID(); ?>" class="homeV1MainPost">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail( 'unithumb-homeonebig', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
            <?php } else { ?>
			    <img src="http://placehold.it/1170x570/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="1170" height="570">
            <?php } ?>
            	<div class="dark-overlay"></div>
				<div class="overlayBox">
					<div class="homeV1PostDesc">
                        <time class="postTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
						<h3><?php the_title() ?></h3>
					</div>
				</div>
			</a>
        <?php } ?>
        <?php if ( $i == 2 ) { ?>
			<div class="homeV1PostGrid clear">
        <?php } ?>
            <?php if ( $i == 2 ) { ?>
				<a href="<?php the_permalink() ?>" id="post-<?php the_ID(); ?>" class="homeV1PostGridItem">
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'unithumb-homeonesquare', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                <?php } else { ?>
			        <img src="http://placehold.it/570x570/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="570" height="570">
                <?php } ?>
                	<div class="dark-overlay"></div>
					<div class="overlayBox">
						<div class="homeV1PostDesc">
							<time class="postTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
							<h3><?php the_title() ?></h3>
						</div>
					</div>
				</a>
            <?php } ?>
            <?php if ( $i == 3 ) { ?>
				<a href="<?php the_permalink() ?>" id="post-<?php the_ID(); ?>" class="homeV1PostGridItem homeV1PostGridItemSmall">
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'unithumb-homeonehalf', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                <?php } else { ?>
			        <img src="http://placehold.it/570x270/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="570" height="270">
                <?php } ?>
                	<div class="dark-overlay"></div>
					<div class="overlayBox">
						<div class="homeV1PostDesc">
							<time class="postTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
							<h3><?php the_title() ?></h3>
						</div>
					</div>
				</a>
            <?php } ?>
            <?php if ( $i == 4 ) { ?>
				<a href="<?php the_permalink() ?>" id="post-<?php the_ID(); ?>" class="homeV1PostGridItem homeV1PostGridItemSmall">
                <?php if ( has_post_thumbnail() ) { ?>
                    <?php the_post_thumbnail( 'unithumb-homeonehalf', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                <?php } else { ?>
			        <img src="http://placehold.it/570x270/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="570" height="270">
                <?php } ?>
                	<div class="dark-overlay"></div>
					<div class="overlayBox">
						<div class="homeV1PostDesc">
							<time class="postTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
							<h3><?php the_title() ?></h3>
						</div>
					</div>
				</a>
            <?php } ?>
            <?php if ( $i == 4 ) { ?>
			</div>
            <?php } ?>
	<?php
    $i++;
    endwhile;
    else : ?>
			<a href="#" id="post-0" class="homeV1MainPost">
			    <img src="http://placehold.it/1170x570/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="1170" height="570">
				<div class="overlayBox">
					<div class="homeV1PostDesc">
                        <time class="postTime" datetime=""><?php echo date( $sDateAndTimeFormat ); ?></time>
						<h3><?php _e('Nothing found', 'francoise') ?></h3>
					</div>
				</div>
			</a>
    <?php
    endif;
	wp_reset_postdata(); ?>

			<div class="clear"></div>

			<div class="contentLeft">
				<div class="archivePostWrap">
        <?php
        //$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
        $aBlogArgs = array(
            'post_type' => 'post',
            'post__not_in' => $aPostsToExcludeRecent,
            'paged' => $paged
        );

        $oBlogQuery = new wp_query( $aBlogArgs );
        if ( $oBlogQuery->have_posts() ) :
        while ( $oBlogQuery->have_posts() ) : $oBlogQuery->the_post();
        ?>
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
                <?php if ( !empty($oBlogQuery->posts) ) { ?>
				<div class="postPagination">
					<?php uni_pagination( $oBlogQuery->max_num_pages ); ?>
				</div>
                <?php } ?>

			</div>

            <?php get_sidebar() ?>

		</div>
		<div class="clear"></div>

        <?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>