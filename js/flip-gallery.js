$.ajax({
        type: "POST",
        url: "./admin/includes/helper.php",
        data: 'action=gallery',
        cache: false,
        dataType: "JSON",
        beforeSend: function() {
//            $('span.tourCnt, span.shramdaanCnt, span.ideasCnt').html('<img src="./assets/images/sp-loading.gif" />');
        },
        success: function(data) {
            var fg_my_content = data;
        }
    });

var fg_mode_settings = {
    edit_mode: 1,
}

var fg_visual_settings = {
    
    position_property: 'margin:auto; position:relative;',

    gallery_navigation_bar_margin_top: 10, // (pixels)

    gallery_navigation_bar_height: 30, // (pixels)

    thumbnail_columns: 3,
    thumbnail_rows: 2,
    thumbnail_width: 280, // (pixels)

    thumbnail_height: 230, // (pixels)

    thumbnail_space_top: 5, // (pixels)

    thumbnail_space_left: 5, // (pixels)

    thumbnail_space_right: 5, // (pixels)

    thumbnail_space_bottom: 5, // (pixels)

    lightbox_background_opacity: 0.8,
    lightbox_border_width: 10, // (pixels)

    lightbox_border_color: '#fff'
}

var fg_speed_settings = {
    thumbnail_flip_speed: 800,

    initial_time_gap_between_thumbnails: 50,
    
    normal_time_gap_between_thumbnails: 50
}

var fg_text_settings = {

    gallery_title_text_style: 'font-size: 18px; color: #000; font-weight: bold;',

    return_to_main_gallery_text: '&lsaquo;&lsaquo; Back To Main Gallery',
    return_to_main_gallery_text_style: 'font-size: 14px; color: #333; font-weight: bold; text-decoration: none;',
    next_gallery_text: 'Next &rsaquo;&rsaquo;',
    back_gallery_text: '&lsaquo;&lsaquo; Back',
    next_and_back_text_style: 'font-size: 14px; color: #333; font-weight: bold; text-decoration: none;',
    page_number_page: 'Page',
    page_number_of: 'of',
    page_number_text_style: 'font-size: 13px; color: #999;',

    lightbox_text_style: 'font-size: 14px; line-height: 1.4; color: #000; text-align: center;',
    lightbox_text_background_style: 'background-color: #fff; opacity:0.8;',

    next_image_text: 'Next &rsaquo;&rsaquo;',
    back_image_text: '&lsaquo;&lsaquo; Back',
    next_and_back_image_text_style: 'font-weight: bold; color: #000;',
    image_number_page: 'Image',
    image_number_of: 'of',
    image_number_text_style: 'color: #999;',

    loading_text_color: '#333',
    loading_text_opacity: '0.3'
}