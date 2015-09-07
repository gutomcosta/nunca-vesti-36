<?php if ( ot_get_option( 'uni_share_fb_enable' ) == 'on' ) { ?>
    <a href="<?php echo uni_share_facebook() ?>"><i class="fa fa-facebook"></i></a>
<?php } ?>
<?php if ( ot_get_option( 'uni_share_tw_enable' ) == 'on' ) { ?>
    <a href="<?php echo uni_share_twitter() ?>"><i class="fa fa-twitter"></i></a>
<?php } ?>
<?php if ( ot_get_option( 'uni_share_pi_enable' ) == 'on' ) { ?>
    <a href="<?php echo uni_share_pinterest() ?>"><i class="fa fa-pinterest"></i></a>
<?php } ?>
<?php if ( ot_get_option( 'uni_share_gp_enable' ) == 'on' ) { ?>
    <a href="<?php echo uni_share_gplus() ?>"><i class="fa fa-google-plus"></i></a>
<?php } ?>