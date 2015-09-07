<?php
class uniwidget_subscribe_form_widget extends WP_Widget {


	function __construct() {
		$widget_ops = array( 'classname' => 'uniwidget_subscribe_form_widget', 'description' => __('Adds Mailchimp subscribe form', 'francoise') );
		parent::__construct( 'uniwidget_subscribe_form_widget', 'Uni Theme: "Mailchimp Subcribe"', $widget_ops );
	}

    // front end
	function widget( $args, $state ) {
		extract( $args );

		$sTitle     = apply_filters('widget_title', $state['title'] );
		$sSubtitle  = $state['subtitle'];

        echo $before_widget;

		if ( $sTitle )
			echo $before_title . $sTitle . $after_title;
        ?>
					<div class="subscribeWidget">
                        <?php if ( !empty($sSubtitle) ) { ?>
						<p><?php echo esc_html( $sSubtitle ); ?></p>
                        <?php } ?>
		                <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="clear uni_form">
                            <input type="hidden" name="action" value="uni_mailchimp_subscribe_user" />
							<input type="text" name="uni_input_email" size="32" value="" placeholder="<?php _e('Your email', 'francoise' ); ?>" data-parsley-required="true" data-parsley-trigger="change focusout submit" data-parsley-type="email">
							<input class="subscribeWidgetSubmit uni_input_submit" type="button" value="<?php _e('Submit', 'francoise' ); ?>">
							<span></span>
						</form>
					</div>
        <?php
        echo $after_widget;
	}

	// save data
	function update( $state_new, $state_old ) {
		$state = $state_old;

		$state['title'] = strip_tags( $state_new['title'] );
		$state['subtitle'] = strip_tags( $state_new['subtitle'] );

		return $state;
	}

	// back end
	function form( $state ) {

		$defaults = array(
            'title' => __( 'Subscribe', 'francoise' ),
            'subtitle' => __( 'Follow my latest news', 'francoise' )
        );

		$state = wp_parse_args( (array) $state, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:', 'francoise') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $state['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'subtitle' ); ?>"><?php echo __('Subtitle:', 'francoise') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" value="<?php echo $state['subtitle']; ?>" />
		</p>

	<?php
	}
}
?>