<?php
class uniwidget_popular_posts_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'uniwidget_popular_posts_widget', 'description' => __('Displays your popular posts', 'francoise') );
		parent::__construct( 'uniwidget_popular_posts_widget', 'Uni Theme: "Popular Posts"', $widget_ops );
	}

    // front end
	function widget( $args, $state ) {
		extract( $args );

		$sTitle = apply_filters('widget_title', $state['title'] );
		$iCount = (int)$state['count'];

        echo $before_widget;

		if ( $sTitle )
			echo $before_title . $sTitle . $after_title;

            $sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' );

            $aPopularArgs = array(
                'post_type' => 'post',
	            'orderby'    => 'comment_count',
	            'order'      => 'DESC',
                'posts_per_page' => $iCount,
                'ignore_sticky_posts' => 1,
                'paged' => 1
            );

            $oPopularQuery = new wp_query( $aPopularArgs );
            if( $oPopularQuery->have_posts() ) {
                echo '<div class="popularPostsWidget">';
                while( $oPopularQuery->have_posts() ) {
                $oPopularQuery->the_post();
                $aPostCustom = get_post_custom( get_the_ID() );
        ?>
						<div class="popularPostsWidgetItem">
							<a href="<?php the_permalink() ?>" class="popularPostsItemImg">
                            <?php if ( has_post_thumbnail() ) { ?>
                                <?php the_post_thumbnail( 'unithumb-adjacentposts', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                            <?php } else { ?>
			                    <img src="http://placehold.it/60x60/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="60" height="60">
                            <?php } ?>
                            </a>
                            <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
							<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
						</div>
        <?php
                }
                echo '</div>';
            } else {
                _e('No popular posts', 'francoise');
            }
            wp_reset_postdata();

        echo $after_widget;
	}

	// save data
	function update( $state_new, $state_old ) {
		$state = $state_old;

		$state['title'] = strip_tags( $state_new['title'] );
		$state['count'] = $state_new['count'];
		
		return $state;
	}

	// back end
	function form( $state ) {

		$defaults = array(
            'title' => __('Popular posts', 'francoise'),
            'count' => '5'
        );

		$state = wp_parse_args( (array) $state, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:', 'francoise') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $state['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php echo __('Posts count:', 'francoise') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $state['count']; ?>" />
		</p>

	<?php
	}
}
?>