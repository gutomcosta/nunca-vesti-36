	<footer id="footer">
        <?php
        global $sc_object;
        $aCountersSettings = get_option('apsc_settings'); ?>
        <?php if ( ot_get_option( 'uni_counters_section_enable' ) == 'on' && class_exists('SC_PRO_Class') ) { ?>
		<div class="footerSocial">
			<div class="wrapper clear">
            <?php if ( !empty($aCountersSettings['social_profile']['instagram']['active']) && isset($aCountersSettings['social_profile']['instagram']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-instagram"></i>
						Instagram <br>
						<?php echo $sc_object->get_count('instagram'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['facebook']['active']) && isset($aCountersSettings['social_profile']['facebook']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-facebook"></i>
						Facebook <br>
						<?php echo $sc_object->get_count('facebook'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['twitter']['active']) && isset($aCountersSettings['social_profile']['twitter']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-twitter"></i>
						Twitter <br>
						<?php echo $sc_object->get_count('twitter'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['youtube']['active']) && isset($aCountersSettings['social_profile']['youtube']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-youtube-play"></i>
						YouTube <br>
						<?php echo $sc_object->get_count('youtube'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['soundcloud']['active']) && isset($aCountersSettings['social_profile']['soundcloud']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-soundcloud"></i>
						Soundcloud <br>
						<?php echo $sc_object->get_count('soundcloud'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['googlePlus']['active']) && isset($aCountersSettings['social_profile']['googlePlus']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-google-plus"></i>
						Google+ <br>
						<?php echo $sc_object->get_count('googlePlus'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['dribbble']['active']) && isset($aCountersSettings['social_profile']['dribbble']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-dribbble"></i>
						Dribbble <br>
						<?php echo $sc_object->get_count('dribbble'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['steam']['active']) && isset($aCountersSettings['social_profile']['steam']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-steam"></i>
						Steam <br>
						<?php echo $sc_object->get_count('steam'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['vimeo']['active']) && isset($aCountersSettings['social_profile']['vimeo']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-vimeo-square"></i>
						Vimeo <br>
						<?php echo $sc_object->get_count('vimeo'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['pinterest']['active']) && isset($aCountersSettings['social_profile']['pinterest']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-pinterest"></i>
						Pinterest <br>
						<?php echo $sc_object->get_count('pinterest'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['forrst']['active']) && isset($aCountersSettings['social_profile']['forrst']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="icon-forrst"></i>
						Forrst <br>
						<?php echo $sc_object->get_count('forrst'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['vk']['active']) && isset($aCountersSettings['social_profile']['vk']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-vk"></i>
						Vkontakte <br>
						<?php echo $sc_object->get_count('vk'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['flickr']['active']) && isset($aCountersSettings['social_profile']['flickr']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-flickr"></i>
						Flickr <br>
						<?php echo $sc_object->get_count('flickr'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['behance']['active']) && isset($aCountersSettings['social_profile']['behance']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-behance"></i>
						Behance <br>
						<?php echo $sc_object->get_count('behance'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['github']['active']) && isset($aCountersSettings['social_profile']['github']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-github"></i>
						Github <br>
						<?php echo $sc_object->get_count('github'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['envato']['active']) && isset($aCountersSettings['social_profile']['envato']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="icon-envato"></i>
						Envato <br>
						<?php echo $sc_object->get_count('envato'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['posts']['active']) && isset($aCountersSettings['social_profile']['posts']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-pencil-square-o"></i>
						<?php _e('Posts', 'francoise') ?> <br>
						<?php echo $sc_object->get_count('posts'); ?>
					</span>
				</div>
            <?php } ?>
            <?php if ( !empty($aCountersSettings['social_profile']['comments']['active']) && isset($aCountersSettings['social_profile']['comments']['active']) ) { ?>
				<div class="footerSocialItem">
					<span>
						<i class="fa fa-comments"></i>
						<?php _e('Comments', 'francoise') ?> <br>
					    <?php echo $sc_object->get_count('comments'); ?>
					</span>
				</div>
            <?php } ?>
			</div>
		</div>
        <?php } ?>
		<div class="wrapper">
            <?php if ( has_nav_menu('footer') ) {
                wp_nav_menu( array( 'container' => '', 'container_class' => '', 'menu_class' => 'footerMenu', 'theme_location' => 'footer', 'depth' => 1, 'fallback_cb'=> 'uni_nav_footer_fallback' ) );
            } ?>
            <div class="copyright">
            <?php if ( ot_get_option( 'uni_footer_text' ) ) { ?>
				<?php echo ot_get_option( 'uni_footer_text' ) ?>
            <?php } else { ?>
				&copy; <?php echo date('Y') ?> <?php _e('Francoise', 'francoise' ); ?>
            <?php } ?>
            </div>
		</div>
	</footer>
	<div class="loaderWrap">
        <div class="la-ball-clip-rotate la-dark">
            <div></div>
        </div>    
    </div>
	<div class="mobileMenu">

		<div class="mobileSearch">
			<form method="get" action="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url() ); } ?>">
				<input type="text" name="s" size="32" value="" placeholder="Search">
				<input type="submit" value="">
			</form>
		</div>

        <?php wp_nav_menu( array( 'container' => '', 'container_class' => '', 'menu_class' => '', 'theme_location' => 'primary', 'depth' => 3, 'fallback_cb'=> 'uni_nav_fallback' ) ); ?>

		<div class="mobileSocial clear">
            <?php if ( ot_get_option( 'uni_email_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_email_link' ) ?>" target="_blank"><i class="fa fa-envelope"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_fb_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_fb_link' ) ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_youtube_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_youtube_link' ) ?>" target="_blank"><i class="fa fa-youtube-play"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_vimeo_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_vimeo_link' ) ?>" target="_blank"><i class="fa fa-vimeo"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_tw_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_tw_link' ) ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_in_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_in_link' ) ?>" target="_blank"><i class="fa fa-instagram"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_li_link' ) ) { ?>
        	<a href="<?php echo ot_get_option( 'uni_li_link' ) ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_bl_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_bl_link' ) ?>" target="_blank"><i class="fa fa-heart"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_pi_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_pi_link' ) ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_gp_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_gp_link' ) ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_fs_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_fs_link' ) ?>" target="_blank"><i class="fa fa-foursquare"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_fl_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_fl_link' ) ?>" target="_blank"><i class="fa fa-flickr"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_dr_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_dr_link' ) ?>" target="_blank"><i class="fa fa-dribbble"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_be_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_be_link' ) ?>" target="_blank"><i class="fa fa-behance"></i></a>
            <?php } ?>
            <?php if ( ot_get_option( 'uni_vk_link' ) ) { ?>
			<a href="<?php echo ot_get_option( 'uni_vk_link' ) ?>" target="_blank"><i class="fa fa-vk"></i></a>
            <?php } ?>
		</div>
	</div>

	<div class="searchPopup">
		<span class="closeBtn"></span>
		<div class="wrapper">
			<form method="get" action="<?php if ( function_exists('icl_get_languages') ) { echo esc_url( icl_get_home_url() ); } else { echo esc_url( home_url() ); } ?>">
				<input type="text" name="s" size="32" value="" placeholder="Search">
			</form>
		</div>
	</div>

	<?php wp_footer(); ?>

</body>
</html>