<?php

add_action('admin_menu', 'ikva_infinite_scroll_for_wp_admin_menu');

function ikva_infinite_scroll_for_wp_admin_menu()
{

    add_options_page(
        ikva_infinite_scroll_for_wp_PLUGIN_NAME,
        "Infinite Scroll",
        "manage_options",
        ikva_infinite_scroll_for_wp_SETTINGS_SLUG,
        "ikva_infinite_scroll_for_wp_menu_callback"
    );

}


function ikva_infinite_scroll_for_wp_menu_callback()
{

    // nonce validation
    if (isset($_POST['submit']) && !wp_verify_nonce($_POST['ikva-infinite-scroll-for-wp-form'], 'ikva-infinite-scroll-for-wp')) {
        echo '<div class="notice-error notice"><p><strong>You are not allowed to access this page 🥴. Please try again</strong></p></div>';
        exit;
    }

    include_once(ikva_infinite_scroll_for_wp_PLUGIN_DIR . 'includes/admin/settings.php');
}