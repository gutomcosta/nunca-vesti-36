<?php
class uniwidget_social_links_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'uniwidget_social_links_widget', 'description' => __('Displays links to social profiles', 'francoise') );
		parent::__construct( 'uniwidget_social_links_widget', 'Uni Theme: "Social Links"', $widget_ops );
	}

    // front end
	function widget( $args, $state ) {
		extract( $args );

		$sTitle = apply_filters('widget_title', $state['title'] );

        echo $before_widget;

		if ( $sTitle )
			echo $before_title . $sTitle . $after_title;

        ?>
		        <div class="followMeSocialLinks">
                    <?php if ( ot_get_option( 'uni_fb_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_fb_link' ) ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_youtube_link' ) ) { ?>
			        <a href="<?php echo ot_get_option( 'uni_youtube_link' ) ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_vimeo_link' ) ) { ?>
			        <a href="<?php echo ot_get_option( 'uni_vimeo_link' ) ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_tw_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_tw_link' ) ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_in_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_in_link' ) ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_li_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_li_link' ) ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_bl_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_bl_link' ) ?>" target="_blank"><i class="fa fa-heart"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_pi_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_pi_link' ) ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_gp_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_gp_link' ) ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_fs_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_fs_link' ) ?>" target="_blank"><i class="fa fa-foursquare"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_fl_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_fl_link' ) ?>" target="_blank"><i class="fa fa-flickr"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_dr_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_dr_link' ) ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_be_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_be_link' ) ?>" target="_blank"><i class="fa fa-behance"></i></a>
                    <span></span>
                    <?php } ?>

                    <?php if ( ot_get_option( 'uni_vk_link' ) ) { ?>
        			<a href="<?php echo ot_get_option( 'uni_vk_link' ) ?>" target="_blank"><i class="fa fa-vk"></i></a>
                    <span></span>
                    <?php } ?>
				</div>
        <?php

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
            'title' => __('Follow me', 'francoise')
        );

		$state = wp_parse_args( (array) $state, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:', 'francoise') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $state['title'] ); ?>" />
		</p>

	<?php
	}
}
?>