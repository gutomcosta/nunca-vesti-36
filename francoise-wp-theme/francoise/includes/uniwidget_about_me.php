<?php
class uniwidget_about_me_widget extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'uniwidget_about_me_widget', 'description' => __('Displays some information about chosen user', 'francoise') );
		parent::__construct( 'uniwidget_about_me_widget', 'Uni Theme: "About Me"', $widget_ops );
	}

    // front end
	function widget( $args, $state ) {
		extract( $args );

		$sTitle = apply_filters('widget_title', $state['title'] );
        $iUserId = $state['user_id'];

        echo $before_widget;

		if ( $sTitle )
			echo $before_title . $sTitle . $after_title;

            $oUser = get_user_by('id', $iUserId);
            if ( !empty($oUser) && !is_wp_error($oUser) ) {
        ?>
					<div class="aboutMeWidget">
						<?php echo do_shortcode('[uav-display-avatar id="'.$iUserId.'" size="160"]') ?>
						<p><?php echo esc_html( $oUser->description ); ?></p>
					</div>
        <?php
            } else {
                _e('It seems that user with such ID doesn\'t exist', 'francoise');
            }

        echo $after_widget;
	}

	// save data
	function update( $state_new, $state_old ) {
		$state = $state_old;

		$state['title'] = strip_tags( $state_new['title'] );
		$state['user_id'] = absint( $state_new['user_id'] );
		
		return $state;
	}

	// back end
	function form( $state ) {

		$defaults = array(
            'title' => __('About me', 'francoise'),
            'user_id' => 1
        );

		$state = wp_parse_args( (array) $state, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo __('Title:', 'francoise') ?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $state['title'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'user_id' ); ?>"><?php echo __('User:', 'francoise') ?></label>
    <?php
    $aUserQuery = get_users();
    if ( ! empty( $aUserQuery ) ) {
    ?>
            <select class="widefat" id="<?php echo $this->get_field_id( 'user_id' ); ?>" name="<?php echo $this->get_field_name( 'user_id' ); ?>">
    <?php
        foreach ( $aUserQuery as $oUser ) {
    ?>
			    <option value="<?php echo $oUser->ID ?>"<?php echo selected( $oUser->ID, $state['user_id'] ) ?>><?php echo $oUser->display_name ?></option>
    <?php
        }
    ?>
            </select>
    <?php
    }
    ?>
		</p>

	<?php
	}
}
?>