<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title(); ?></title>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<!--[if lte IE 8]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<!--[if lt IE 8]>
			<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script>
		<![endif]-->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo get_stylesheet_directory_uri(); ?>/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-16x16.png" sizes="16x16" />

        <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php echo bloginfo('rss2_url'); ?>">

        <!-- wp_header -->
        <?php
        if ( is_singular() ) wp_enqueue_script( "comment-reply" );
        wp_head(); ?>

	</head>
<body <?php body_class(); ?>>
	<header id="header" style="padding-bottom: 68px; min-height:229px; padding-top:77px;margin-bottom:35px">
		<div class="siteHeader">
			<div class="wrapper clear">
				<a href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url() ); } ?>" class="mobile-logo">
                <?php
                $iLogoMobileAttachId = ( ot_get_option( 'uni_logo_mobile' ) ) ? ot_get_option( 'uni_logo_mobile' ) : '';
                if ( !empty($iLogoMobileAttachId) ) {
                    $aLogoMobileImage = wp_get_attachment_image_src( $iLogoMobileAttachId, 'full' );
                    $sLogoMobileImage = $aLogoMobileImage[0];
                    echo '<img src="'.esc_url($sLogoMobileImage).'" alt="'.esc_attr(get_bloginfo('description')).'">';     
                } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/images/mobile-logo.png" alt="<?php echo esc_attr( get_bloginfo('name') ) ?>">
                <?php } ?>
				</a>

                <?php $iSocialsCount = 0; ?>
				<div class="pull-right clear">
					<div class="headerSocialLinks clear">
                    <?php if ( ot_get_option( 'uni_fb_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_fb_link' ) ?>"><i class="fa fa-facebook"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_tw_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_tw_link' ) ?>"><i class="fa fa-twitter"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_in_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_in_link' ) ?>"><i class="fa fa-instagram"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_li_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_li_link' ) ?>"><i class="fa fa-linkedin"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_bl_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_bl_link' ) ?>"><i class="fa fa-heart"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_pi_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_pi_link' ) ?>"><i class="fa fa-pinterest"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_gp_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_gp_link' ) ?>"><i class="fa fa-google-plus"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_fs_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_fs_link' ) ?>"><i class="fa fa-foursquare"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_fl_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_fl_link' ) ?>"><i class="fa fa-flickr"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_dr_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_dr_link' ) ?>"><i class="fa fa-dribbble"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_be_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_be_link' ) ?>"><i class="fa fa-behance"></i></a>
                    <?php } ?>
                    <?php if ( ot_get_option( 'uni_vk_link' ) ) { $iSocialsCount++; ?>
        			<a href="<?php echo ot_get_option( 'uni_vk_link' ) ?>"><i class="fa fa-vk"></i></a>
                    <?php } ?>
					</div>
					<div class="searchIcon"></div>
				</div>

                <?php $sClassForMenu = 'width-11-' . $iSocialsCount; ?>
                <?php if ( has_nav_menu('primary') ) {
                    wp_nav_menu( array( 'container' => 'nav', 'container_class' => $sClassForMenu, 'menu_class' => 'mainMenu clear', 'theme_location' => 'primary', 'depth' => 3, 'fallback_cb'=> '' ) );
                    } else {
                        uni_nav_fallback( $sClassForMenu );
                    } ?>

				<span class="showMobileMenu">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</span>
			</div>
		</div>
		<a href="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url() ); } ?>" class="logo">
        <?php
        $iLogoAttachId = ( ot_get_option( 'uni_logo_desktop' ) ) ? ot_get_option( 'uni_logo_desktop' ) : '';
        if ( !empty($iLogoAttachId) ) {
            $aLogoImage = wp_get_attachment_image_src( $iLogoAttachId, 'full' );
            $sLogoImage = $aLogoImage[0];
            echo '<img src="'.esc_url($sLogoImage).'" alt="'.esc_attr(get_bloginfo('description')).'">';
        } else { ?>
		    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php echo esc_attr( get_bloginfo('name') ) ?>">
        <?php } ?>
        </a>
	</header>
