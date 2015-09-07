jQuery( document ).ready( function( $ ) {
    'use strict';

    var $page_template = $('#page_template'),
        $about_metabox = $('#about_meta_box'),
        $contact_metabox = $('#contact_meta_box'),
        $templates_metabox = $('#templates_meta_box'),
        $templates_metabox_lite = $('#templates_meta_box_lite');

    $about_metabox.hide();
    $contact_metabox.hide();
    $templates_metabox.hide();
    $templates_metabox_lite.hide();

    $page_template.on("change", function() {
        if ( $(this).val() == 'templ-about.php' ) {
            $about_metabox.show();
            $contact_metabox.hide();
            $templates_metabox.hide();
            $templates_metabox_lite.hide();
        } else if ( $(this).val() == 'templ-contact.php' ) {
            $contact_metabox.show();
            $about_metabox.hide();
            $templates_metabox.hide();
            $templates_metabox_lite.hide();
        } else if ( $(this).val() == 'templ-home-slider-no-sidebar.php' || $(this).val() == 'templ-home-slider.php'
            || $(this).val() == 'templ-home-list.php' ) {
            $contact_metabox.hide();
            $about_metabox.hide();
            $templates_metabox.show();
            $templates_metabox_lite.hide();
        } else if ( $(this).val() == 'templ-home-masonry.php' || $(this).val() == 'templ-home-grid.php' ) {
            $contact_metabox.hide();
            $about_metabox.hide();
            $templates_metabox.hide();
            $templates_metabox_lite.show();
        } else {
            $about_metabox.hide();
            $contact_metabox.hide();
            $templates_metabox.hide();
            $templates_metabox_lite.hide();
        }
    }).change();

});