        <?php if ( ot_get_option( 'uni_instagram_section_enable' ) == 'on' ) { ?>
		<div class="ourInstagram">
			<div class="sb_instagram_header">
            <?php $sInstagramTitle = ( ot_get_option( 'uni_instagram_title' ) ) ? ot_get_option( 'uni_instagram_title' ) : __('Follow on instagram', 'francoise'); ?>
				<a class="sbi_header_link" href="<?php echo ot_get_option( 'uni_instagram_url' ); ?>"><?php echo esc_html( $sInstagramTitle ); ?></a>
			</div>
			<?php echo do_shortcode('[instagram-feed showheader=true widthunit=273 heightunit=273 imagepadding=0 showfollow=true showbutton=false]'); ?>
		</div>
        <?php } ?>