<?php
/*
*  Template Name: Home Page Slider
*/
get_header();
$sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' ); ?>

	<section class="container">
		<div class="wrapper clear">
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
		$aPostCustom = get_post_custom( $post->ID );
    endwhile; endif;
    ?>
	<?php
    $aSelectedPosts = array();
    $aSelectedPosts = ( !empty($aPostCustom['uni_templates_slider_posts'][0]) ) ? maybe_unserialize($aPostCustom['uni_templates_slider_posts'][0]) : array();
	$aHomeSlidesArgs = array(
	    'post_type' => 'post',
	    'post__in' => $aSelectedPosts,
        'posts_per_page' => -1,
        'ignore_sticky_posts' => 1
	);
	$oHomeSlides = new WP_Query( $aHomeSlidesArgs );
	if ( $oHomeSlides->have_posts() && !empty($aSelectedPosts) ) :
        $i = 0;
    ?>
			<div class="homeV2Slider">
				<div class="homeV2SliderWrap">
    <?php
	    while ( $oHomeSlides->have_posts() ) : $oHomeSlides->the_post();
        $aPostCustom = get_post_custom( $post->ID );
	    $sThumbId = get_post_thumbnail_id( $post->ID );
	    $aImage = wp_get_attachment_image_src( $sThumbId, 'full' );
	?>
					<a href="<?php the_permalink() ?>" data-slide="<?php echo esc_attr( $i ); ?>" class="homeV2SliderItem<?php if ($i == 0) echo ' active'; ?>">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'unithumb-homeslider', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                        <?php } else { ?>
						    <img src="http://placehold.it/1170x570/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="1170" height="570">
                        <?php } ?>
                        <div class="dark-overlay"></div>
						<div class="homeV1PostDesc">
                            <time class="postTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
							<h3><?php the_title() ?></h3>
						</div>
					</a>
	<?php
        $i++;
	    endwhile;
    ?>
				</div>
			</div>
    <?php
    else :
        if ( !empty($aPostCustom['uni_templates_image'][0]) && !empty($aPostCustom['uni_templates_title'][0]) && !empty($aPostCustom['uni_templates_uri'][0]) ) {
            $aCustomImage = wp_get_attachment_image_src( $aPostCustom['uni_templates_image'][0], 'unithumb-homeslider' );
    ?>
			<a href="<?php echo esc_url( $aPostCustom['uni_templates_uri'][0] ) ?>" id="post-0" class="homeV1MainPost">
			    <img src="<?php echo esc_url( $aCustomImage[0] ) ?>" alt="<?php echo esc_attr( $aPostCustom['uni_templates_title'][0] ) ?>" width="<?php echo esc_attr( $aCustomImage[1] ) ?>" height="<?php echo esc_attr( $aCustomImage[2] ) ?>">
				<div class="dark-overlay"></div>
                <style type="text/css">
                    .overlayBox:hover {background: <?php echo esc_attr( $aPostCustom["uni_templates_title_bg_color"][0] ) ?>;}
                    .homeV1PostDesc h3 {color: <?php echo esc_attr( $aPostCustom["uni_templates_title_standard_color"][0] ) ?>;}
                    .overlayBox:hover .homeV1PostDesc h3 {color: <?php echo esc_attr( $aPostCustom["uni_templates_title_hover_color"][0] ) ?>;}
                </style>
                <div class="overlayBox">
					<div class="homeV1PostDesc">
						<h3><?php echo esc_html( $aPostCustom['uni_templates_title'][0] ) ?></h3>
					</div>
				</div>
			</a>
    <?php
        } else {
    ?>
			<a href="#" id="post-0" class="homeV1MainPost">
			    <img src="http://placehold.it/1170x570/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="1170" height="570">
				<div class="dark-overlay"></div>
                <div class="overlayBox">
					<div class="homeV1PostDesc">
						<h3><?php _e('No slides found', 'francoise') ?></h3>
					</div>
				</div>
			</a>
    <?php
        }
    endif;
	wp_reset_postdata();
    ?>

			<div class="clear"></div>

			<div class="contentLeft">
				<div class="archivePostWrap">
        <?php
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
        $aBlogArgs = array(
            'post_type' => 'post',
            'post__not_in' => $aSelectedPosts,
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

				<div class="postPagination">
					<?php uni_pagination( $oBlogQuery->max_num_pages ); ?>
				</div>

			</div>

            <?php get_sidebar() ?>

		</div>
		<div class="clear"></div>

        <?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>