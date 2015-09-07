<?php
/*
*  Template Name: Home Page Grid
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
    $bCustomContentDefined = false;
    if ( !empty($aPostCustom['uni_templates_image_lite'][0]) && !empty($aPostCustom['uni_templates_title_lite'][0]) && !empty($aPostCustom['uni_templates_uri_lite'][0]) ) {
        $aCustomImage = wp_get_attachment_image_src( $aPostCustom['uni_templates_image_lite'][0], 'unithumb-homeslider' );
        $bCustomContentDefined = true;
    ?>
			<a href="<?php echo esc_url( $aPostCustom['uni_templates_uri_lite'][0] ) ?>" id="post-0" class="homeV1MainPost">
			    <img src="<?php echo esc_url( $aCustomImage[0] ) ?>" alt="<?php echo esc_attr( $aPostCustom['uni_templates_title_lite'][0] ) ?>" width="<?php echo esc_attr( $aCustomImage[1] ) ?>" height="<?php echo esc_attr( $aCustomImage[2] ) ?>">
				<div class="dark-overlay"></div>
                <style type="text/css">
                    .overlayBox:hover {background: <?php echo esc_attr( $aPostCustom["uni_templates_title_bg_color_lite"][0] ) ?>;}
                    .homeV1PostDesc h3 {color: <?php echo esc_attr( $aPostCustom["uni_templates_title_standard_color_lite"][0] ) ?>;}
                    .overlayBox:hover .homeV1PostDesc h3 {color: <?php echo esc_attr( $aPostCustom["uni_templates_title_hover_color_lite"][0] ) ?>;}
                </style>
                <div class="overlayBox">
					<div class="homeV1PostDesc">
						<h3><?php echo esc_html( $aPostCustom['uni_templates_title_lite'][0] ) ?></h3>
					</div>
				</div>
			</a>
    <?php
    }
    ?>
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
            'paged' => $paged
        );

        $oBlogQuery = new wp_query( $aBlogArgs );
        if ( $oBlogQuery->have_posts() ) :
        $iPostsFound = count($oBlogQuery->posts);
        $i = 1;
        while ( $oBlogQuery->have_posts() ) : $oBlogQuery->the_post();
        ?>
            <?php if ( $i == 1 && !$bCustomContentDefined  ) { ?>
			<a href="<?php the_permalink() ?>" class="homeV1MainPost">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail( 'unithumb-homeslider', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
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

            <?php if ( $i == 1 ) { ?>
			<div class="blogPostBox clear">
            <?php } ?>

                <?php if ( ( $i != 1 && !$bCustomContentDefined ) || $bCustomContentDefined ) { ?>
				<div class="blogPostItem">
					<a href="<?php the_permalink() ?>" class="blogPostImg">
                    <?php if ( has_post_thumbnail() ) { ?>
                        <?php the_post_thumbnail( 'unithumb-bloggrid', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                    <?php } else { ?>
					    <img src="http://placehold.it/370x250/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="370" height="250">
                    <?php } ?>
					</a>
                    <time class="blogPostTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
					<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
					<?php the_excerpt() ?>
				</div>
                <?php } ?>

            <?php if ( $i == $iPostsFound ) { ?>
			</div>
            <?php } ?>

            <?php if ( $i == $iPostsFound ) { ?>
			<div class="postPagination">
				<?php uni_pagination( $oBlogQuery->max_num_pages ); ?>
			</div>
            <?php } ?>
        <?php
        $i++;
        endwhile;
        else :
        ?>

            <?php get_template_part( 'no-results', 'archive' ); ?>

        <?php
        endif;
        ?>

		</div>

        <?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>