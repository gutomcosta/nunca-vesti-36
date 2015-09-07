<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array.
   */
  $saved_settings = get_option( 'option_tree_settings', array() );

  /**
   * Custom settings array that will eventually be
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array(
    'contextual_help' => array(
      'content'       => array(
        array(
          'id'        => 'general_help',
          'title'     => __('General', 'francoise'),
          'content'   => __('Theme options here.', 'francoise')
        )
      ),
      'sidebar'       => '',
    ),
    'sections'        => array(
      array(
        'id'          => 'general',
        'title'       => __('General', 'francoise')
      ),
      array(
        'id'          => 'footer',
        'title'       => __('Footer settings', 'francoise')
      ),
      array(
        'id'          => 'logo',
        'title'       => __('Logo settings', 'francoise')
      ),
      array(
        'id'          => 'color',
        'title'       => __('Colour schemes', 'francoise')
      ),
      array(
        'id'          => 'fonts',
        'title'       => __('Fonts', 'francoise')
      ),
      array(
        'id'          => 'home',
        'title'       => __('"Home" page settings', 'francoise')
      ),
      array(
        'id'          => 'contact',
        'title'       => __('"Contact" page settings', 'francoise')
      ),
      array(
        'id'          => 'mailchimp',
        'title'       => __('Mailchimp settings', 'francoise')
      ),
      array(
        'id'          => 'social',
        'title'       => __('Socials', 'francoise')
      )
    ),
    'settings'        => array(
      array(
        'id'          => 'uni_general_info_textblock',
        'label'       => __( 'General information about hosting environment', 'francoise' ),
        'desc'        => sprintf( __( 'Curl extension is required for Mailchimp subscribe form to function properly. Status of curl extension: %s', 'francoise' ), (function_exists('curl_version') ? '<span style="color:green">Enabled<span>' : '<span style="color:red">Disabled<span>')),
        'std'         => '',
        'type'        => 'textblock-titled',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_single_archive_style',
        'label'       => __( 'Single post template/Archive templates style', 'francoise' ),
        'desc'        => __( 'Enables/disables sidebar on single post template and archive templates (categories, tags). It is a global option and it will be applied for ALL single/archive templates', 'francoise' ),
        'std'         => 'with-sidebar',
        'type'        => 'radio',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and',
        'choices'     => array(
          array(
            'value'       => 'with-sidebar',
            'label'       => __( 'With a sidebar', 'francoise' ),
            'src'         => ''
          ),
          array(
            'value'       => 'wo-sidebar',
            'label'       => __( 'Without a sidebar', 'francoise' ),
            'src'         => ''
          )
        )
      ),
      array(
        'id'          => 'uni_instagram_section_enable',
        'label'       => __( 'Show/hide instagram section', 'francoise' ),
        'desc'        => __( 'You have to install and activate plugin "Instagram Feed" (free on wordpress.org) to use this functionality.', 'francoise' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_instagram_title',
        'label'       => __( 'Add custom title for Instagram section. Default is "Follow on instagram"', 'francoise' ),
        'desc'        => '',
        'std'         => __('Follow on instagram', 'francoise'),
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_instagram_url',
        'label'       => __( 'Add custom URI for Instagram section. There is no default URI.', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_share_fb_enable',
        'label'       => __( 'Show/hide Facebook social share link everywhere on the website (on Contact page, at the bottom of the post etc)', 'francoise' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_share_tw_enable',
        'label'       => __( 'Show/hide Twitter social share link everywhere on the website (on Contact page, at the bottom of the post etc)', 'francoise' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_share_pi_enable',
        'label'       => __( 'Show/hide Pinterest social share link everywhere on the website (on Contact page, at the bottom of the post etc)', 'francoise' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_share_gp_enable',
        'label'       => __( 'Show/hide Google+ social share link everywhere on the website (on Contact page, at the bottom of the post etc)', 'francoise' ),
        'desc'        => '',
        'std'         => 'on',
        'type'        => 'on-off',
        'section'     => 'general',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_footer_textblock',
        'label'       => __( 'Footer Textblock', 'francoise' ),
        'desc'        => __( 'Below are some settings for the footer.', 'francoise' ),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_counters_section_enable',
        'label'       => __( 'Show/hide "Social counters" section', 'francoise' ),
        'desc'        => __( 'You have to install and activate plugin "AccessPress Social Counter" (free from wordpress.org) to use this functionality.', 'francoise' ),
        'std'         => 'off',
        'type'        => 'on-off',
        'section'     => 'footer',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_footer_text',
        'label'       => __( 'Text in the footer', 'francoise' ),
        'desc'        => __( 'Add your own text to the footer', 'francoise' ),
        'std'         => '',
        'type'        => 'textarea-simple',
        'section'     => 'footer',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_logo_textblock',
        'label'       => __( 'Textblock', 'francoise' ),
        'desc'        => __( 'This theme displays two different logo images for desktop and mobile version. For the desktop version of the logo there is enough space for literally any size. However for the mobile version it is better to upload an image not larger then 180x30 px.', 'francoise' ),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_logo_desktop',
        'label'       => __( 'Logo image for desktop', 'francoise' ),
        'desc'        => __( 'This image will be used for desktop version.', 'francoise' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'ot-upload-attachment-id',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_logo_mobile',
        'label'       => __( 'Logo image for mobile version', 'francoise' ),
        'desc'        => __( 'This image will be used for mobile version of the website.', 'francoise' ),
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'logo',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => 'ot-upload-attachment-id',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_color_schemes',
        'label'       => __( 'Colour schemes', 'francoise' ),
        'desc'        => __( 'You can choose a desired colour scheme here. The default is the first one.', 'francoise' ),
        'std'         => 'default',
        'type'        => 'radio-image',
        'section'     => 'color',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_google_fonts',
        'label'       => __( 'Custom Google Fonts', 'francoise' ),
        'desc'        => __( 'You can define custom Google fonts here. Please, use the first for regular text and the second for headings. Default are: Merriweather (regular) and Josefin Sans (600, regular)', 'francoise' ),
        'std'         => array(
          array(
            'family'    => 'merriweather',
            'variants'  => array( 'regular' ),
            'subsets'   => array( 'latin' )
          ),
          array(
            'family'    => 'josefinsans',
            'variants'  => array( '600', 'regular' ),
            'subsets'   => array( 'latin' )
          )
        ),
        'type'        => 'google-fonts',
        'section'     => 'fonts',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_home_promo_posts_textblock',
        'label'       => __( '4 promo posts for unique grid on home page', 'francoise' ),
        'desc'        => __( 'Below you can see 4 dropdowns. Please, select 4 posts here, these posts will be shown on home page in unique grid below the slider. Otherwise, 4 recent posts will be shown. Attention: if you don\'t have at least 4 published posts, this section doesn\'t appear at all!', 'francoise' ),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_home_posts_1',
        'label'       => __( 'Post #1', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => 'post',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_home_posts_2',
        'label'       => __( 'Post #2', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => 'post',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_home_posts_3',
        'label'       => __( 'Post #3', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => 'post',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_home_posts_4',
        'label'       => __( 'Post #4', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'custom-post-type-select',
        'section'     => 'home',
        'rows'        => '',
        'post_type'   => 'post',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_phone',
        'label'       => __( 'Phone number to be displayed on the "Contact Us" page', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_email',
        'label'       => __( 'Email to be displayed on the "Contact Us" page', 'francoise' ),
        'desc'        => __( 'Also an information submitted via contact form will be sent to this email address', 'francoise' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_contact_form_seven_id',
        'label'       => __( 'OR you can utilise Contact Form 7 form...', 'francoise' ),
        'desc'        => __( '... Just activate your Contact Form 7 plugin and define here the ID of the form', 'francoise' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'contact',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_mailchimp_api_key',
        'label'       => __( 'MailChimp API Key', 'francoise' ),
        'desc'        => __( 'Add your MailChimp API Key', 'francoise' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mailchimp',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_mailchimp_list_id',
        'label'       => __( 'MailChimp List ID', 'francoise' ),
        'desc'        => __( 'Add your MailChimp List ID', 'francoise' ),
        'std'         => '',
        'type'        => 'text',
        'section'     => 'mailchimp',
        'rows'        => '5',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_socials_textblock',
        'label'       => __( 'Socials Textblock', 'francoise' ),
        'desc'        => __( 'Below you can add links to your social profiles. The icon of certain social media will appear only if an uri added and saved to this field.', 'francoise' ),
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_email_link',
        'label'       => __( 'Add an Email link', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_fb_link',
        'label'       => __( 'Add a link to Facebook profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_youtube_link',
        'label'       => __( 'Add a link to YouTube profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_vimeo_link',
        'label'       => __( 'Add a link to Vimeo profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_tw_link',
        'label'       => __( 'Add a link to Twitter account', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_gp_link',
        'label'       => __( 'Add a link to Google Plus profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_in_link',
        'label'       => __( 'Add a link to Instagram profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_li_link',
        'label'       => __( 'Add a link to LinkedIn profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_pi_link',
        'label'       => __( 'Add a link to Pinterest profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_bl_link',
        'label'       => __( 'Add a link to Bloglovin account', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_fs_link',
        'label'       => __( 'Add a link to Foursquare profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_fl_link',
        'label'       => __( 'Add a link to Flickr profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_dr_link',
        'label'       => __( 'Add a link to Dribble profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_be_link',
        'label'       => __( 'Add a link to Behance profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
      array(
        'id'          => 'uni_vk_link',
        'label'       => __( 'Add a link to Vkontakte profile', 'francoise' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    )
  );

  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings );
  }

}
?>