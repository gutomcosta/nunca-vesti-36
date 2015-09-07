<?php
   /*
   *  Template Name: Home Page List
   */
   get_header();
   $sDateAndTimeFormat = get_option( 'date_format' ); ?>
<section class="container" style="margin-top: 10px">
   <div class="wrapper clear">
      <?php
         if (have_posts()) : while (have_posts()) : the_post();
         $aPostCustom = get_post_custom( $post->ID );
         endwhile; endif;
         ?>
      <?php
         wp_reset_postdata();
         ?>
      
      <div class="contentLeft">
         <div class="blogPostListWrap clear">
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
            <div class="blogPostListItem clear">
               <a href="<?php the_permalink() ?>" class="blogPostListImg">
               <?php if ( has_post_thumbnail() ) { ?>
               <?php the_post_thumbnail( 'unithumb-bloglist', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
               <?php } else { ?>
               <img src="http://placehold.it/420x256/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="420" height="256">
               <?php } ?>
               </a>
               <div class="blogPostListText">
                  <time class="blogPostListTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
                  <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
                  <?php the_excerpt() ?>
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


<style type="text/css">
  #header: {
    min-height: 260px;
    padding-bottom: 68px;
  }

</style>
