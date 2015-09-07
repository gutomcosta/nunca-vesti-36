<?php
/**
 * Initialize the custom Meta Boxes.
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {

  $about_meta_box = array(
    'id'          => 'about_meta_box',
    'title'       => __( 'Parameters for "About" page', 'francoise' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Additional info', 'francoise' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => __( 'Add your location', 'francoise' ),
        'id'          => 'uni_my_location',
        'type'        => 'text',
        'desc'        => '',
        'std'         => ''
      )
    )
  );

  $contact_meta_box = array(
    'id'          => 'contact_meta_box',
    'title'       => __( 'Parameters for "Contact" page', 'francoise' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Additional info', 'francoise' ),
        'id'          => 'tab_add_info',
        'type'        => 'tab'
      ),
      array(
        'label'       => '',
        'id'          => 'contact_textblock',
        'type'        => 'textblock',
        'desc'        => sprintf (__( 'A lot of options for this page is also located on <a href="%s">theme options page</a>.', 'francoise' ), trailingslashit(home_url()).'wp-admin/themes.php?page=ot-theme-options#section_contact' ),
        'operator'    => 'and',
        'condition'   => ''
      ),
      array(
        'label'       => __( 'Enable contact form?', 'francoise' ),
        'id'          => 'uni_form_enable',
        'type'        => 'on-off',
        'desc'        => __( 'Show or hide contact form', 'francoise' ),
        'std'         => 'on'
      ),
      array(
        'label'       => __( 'Custom title above the contact form', 'francoise' ),
        'id'          => 'uni_form_custom_title',
        'type'        => 'text',
        'std'        => __( 'Say hello', 'francoise' )
      )
    )
  );

  $templates_meta_box = array(
    'id'          => 'templates_meta_box',
    'title'       => __( 'Parameters for home page templates', 'francoise' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Posts content', 'francoise' ),
        'id'          => 'tab_posts_content',
        'type'        => 'tab'
      ),
      array(
        'id'          => 'uni_templates_slider_posts',
        'label'       => __( 'Posts for slider', 'francoise' ),
        'desc'        => __( 'Chosen posts will be added to slider and excluded from the second query on this page (if this second query exists).', 'francoise' ),
        'std'         => '',
        'type'        => 'custom-post-type-checkbox',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => 'post',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'label'       => __( 'Custom content', 'francoise' ),
        'id'          => 'tab_custom_content',
        'type'        => 'tab'
      ),
      array(
        'label'       => '',
        'id'          => 'tab_custom_content_textblock',
        'type'        => 'textblock',
        'desc'        => __( 'It is possible to define a custom content here. You have to choose/upload image, add title and URI, otherwise custom content won\'t be displayed! Also it will be shown ONLY if no posts have been selected on "Posts content" tab!', 'francoise' ),
        'operator'    => 'and',
        'condition'   => ''
      ),
      array(
        'id'          => 'uni_templates_image',
        'label'       => __( 'Upload Image', 'francoise' ),
        'desc'        => __( 'Upload custom image', 'francoise' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'tab_custom_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'ot-upload-attachment-id',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'label'       => __( 'Title', 'francoise' ),
        'id'          => 'uni_templates_title',
        'type'        => 'text',
        'desc'        => __( 'Add custom title', 'francoise' )
      ),
      array(
        'id'          => 'uni_templates_title_standard_color',
        'label'       => __( 'Standard colour of the title', 'francoise' ),
        'desc'        => __( 'Choose standard colour of the title.', 'francoise' ),
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_templates_title_hover_color',
        'label'       => __( 'Hover colour of the title', 'francoise' ),
        'desc'        => __( 'Choose hover colour of the title.', 'francoise' ),
        'std'         => '#000000',
        'type'        => 'colorpicker',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_templates_title_bg_color',
        'label'       => __( 'Colour and opacity for overlay', 'francoise' ),
        'desc'        => __( 'Choose colour and opacity for overlay', 'francoise' ),
        'desc'        => '',
        'std'         => 'rgba(255, 255, 255, 0.9)',
        'type'        => 'colorpicker-opacity',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'label'       => __( 'URI', 'francoise' ),
        'id'          => 'uni_templates_uri',
        'type'        => 'text',
        'desc'        => __( 'Add custom URI', 'francoise' )
      )
    )
  );

  $templates_meta_box_lite = array(
    'id'          => 'templates_meta_box_lite',
    'title'       => __( 'Parameters for home page templates', 'francoise' ),
    'desc'        => '',
    'pages'       => array( 'page' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Custom content', 'francoise' ),
        'id'          => 'tab_custom_content',
        'type'        => 'tab'
      ),
      array(
        'label'       => '',
        'id'          => 'tab_custom_content_textblock',
        'type'        => 'textblock',
        'desc'        => __( 'It is possible to define a custom content here. You have to choose/upload image, add title and URI, otherwise custom content won\'t be displayed! Also it will be shown ONLY if no posts have been selected on "Posts content" tab!', 'francoise' ),
        'operator'    => 'and',
        'condition'   => ''
      ),
      array(
        'id'          => 'uni_templates_image_lite',
        'label'       => __( 'Upload Image', 'francoise' ),
        'desc'        => __( 'Upload custom image', 'francoise' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'tab_custom_content',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'ot-upload-attachment-id',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'label'       => __( 'Title', 'francoise' ),
        'id'          => 'uni_templates_title_lite',
        'type'        => 'text',
        'desc'        => __( 'Add custom title', 'francoise' )
      ),
      array(
        'id'          => 'uni_templates_title_standard_color_lite',
        'label'       => __( 'Standard colour of the title', 'francoise' ),
        'desc'        => __( 'Choose standard colour of the title.', 'francoise' ),
        'std'         => '#ffffff',
        'type'        => 'colorpicker',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_templates_title_hover_color_lite',
        'label'       => __( 'Hover colour of the title', 'francoise' ),
        'desc'        => __( 'Choose hover colour of the title.', 'francoise' ),
        'std'         => '#000000',
        'type'        => 'colorpicker',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_templates_title_bg_color_lite',
        'label'       => __( 'Colour and opacity for overlay', 'francoise' ),
        'desc'        => __( 'Choose colour and opacity for overlay', 'francoise' ),
        'desc'        => '',
        'std'         => 'rgba(255, 255, 255, 0.9)',
        'type'        => 'colorpicker-opacity',
        'section'     => 'option_types',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'label'       => __( 'URI', 'francoise' ),
        'id'          => 'uni_templates_uri_lite',
        'type'        => 'text',
        'desc'        => __( 'Add custom URI', 'francoise' )
      )
    )
  );

  /**
   * Register our meta boxes using the
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $about_meta_box );
    ot_register_meta_box( $contact_meta_box );
    ot_register_meta_box( $templates_meta_box );
    ot_register_meta_box( $templates_meta_box_lite );
}