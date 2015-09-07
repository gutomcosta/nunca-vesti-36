<?php
/*
*  Template Name: Contact Page
*/
get_header();
?>

	<section class="container">
		<div class="wrapper clear">

    <?php if (have_posts()) : while (have_posts()) : the_post();
		$aPostCustom = get_post_custom( $post->ID );
    ?>
			<div class="pageContactImg">
            <?php if ( has_post_thumbnail() ) { ?>
                <?php the_post_thumbnail( 'unithumb-pagebigimage', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
            <?php } else { ?>
			    <img src="http://placehold.it/840x560/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="840" height="560">
            <?php } ?>
			</div>
			<div class="pageContactDesc">
				<h1><?php the_title() ?></h1>
				<?php the_content() ?>
			</div>
			<div class="pageSocial">
				<div class="pageSocialWrapper">
					<?php include(locate_template('includes/social-links.php')); ?>
				</div>
			</div>

    <?php if ( !empty($aPostCustom['uni_form_enable'][0]) && $aPostCustom['uni_form_enable'][0] == 'on' ) { ?>
		<?php if( in_array('contact-form-7/wp-contact-form-7.php', get_option('active_plugins')) && ot_get_option( 'uni_contact_form_seven_id' ) ) { ?>
			<div class="contactForm">

                <?php if ( !empty($aPostCustom['uni_form_custom_title'][0]) ) { ?>
                <h3><?php echo esc_html( $aPostCustom['uni_form_custom_title'][0] ); ?></h3>
                <?php } else { ?>
				<h3><?php _e('Say hello', 'francoise') ?></h3>
                <?php } ?>

                <?php echo do_shortcode('[contact-form-7 id="'.ot_get_option( 'uni_contact_form_seven_id' ).'"]'); ?>
			</div>
            <?php } else { ?>
			<div class="contactForm">

                <?php if ( !empty($aPostCustom['uni_form_custom_title'][0]) ) { ?>
                <h3><?php echo esc_html( $aPostCustom['uni_form_custom_title'][0] ); ?></h3>
                <?php } else { ?>
				<h3><?php _e('Say hello', 'francoise') ?></h3>
                <?php } ?>

		        <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" method="post" class="clear uni_form">
                    <input type="hidden" name="uni_contact_nonce" value="<?php echo wp_create_nonce('uni_nonce') ?>" />
                    <input type="hidden" name="action" value="uni_contact_form" />

                    <div class="form-row form-row-userName">
                        <label><?php _e('Name', 'francoise') ?>*</label>
                    	<input class="formInput" type="text" name="uni_contact_name" value="" data-parsley-required="true" data-parsley-trigger="change focusout submit">
                    </div>
                    <div class="form-row form-row-userEmail">
                        <label><?php _e('E-mail', 'francoise') ?>*</label>
						<input class="formInput" type="text" name="uni_contact_email" value="" data-parsley-required="true" data-parsley-trigger="change focusout submit" data-parsley-type="email">
					</div>
					<div class="form-row form-row-userSubject">
                        <label><?php _e('Subject', 'francoise') ?>*</label>
						<input class="formInput" type="text" name="uni_contact_subject" value="" data-parsley-required="true" data-parsley-trigger="change focusout submit">
					</div>
                    <div class="clear"></div>
					<div class="form-row form-row-userMessage">
                        <label><?php _e('Message', 'francoise') ?>*</label>
						<textarea class="formTextarea" name="uni_contact_msg" id="" cols="30" rows="10" data-parsley-required="true" data-parsley-trigger="change focusout submit"></textarea>
					</div>
					<input id="uniSendContactForm" class="submitContactFormBtn uni_input_submit" type="button" value="<?php _e('Post comment', 'francoise') ?>">
				</form>
			</div>
            <?php } ?>
    <?php } ?>

    <?php
    endwhile; endif;
    ?>

		</div>

        <?php include(locate_template('includes/instagram-section.php')); ?>

	</section>

<?php get_footer(); ?>