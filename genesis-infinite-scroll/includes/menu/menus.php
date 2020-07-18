<?php

add_action('admin_menu', 'ikva_genesis_infinite_scroll_admin_menu');

function ikva_genesis_infinite_scroll_admin_menu()
{

    add_options_page(
        ikva_genesis_infinite_scroll_PLUGIN_NAME,
        "Infinite Scroll",
        "manage_options",
        ikva_genesis_infinite_scroll_SETTINGS_SLUG,
        "ikva_genesis_infinite_scroll_menu_callback"
    );

}


function ikva_genesis_infinite_scroll_menu_callback()
{

    // nonce validation
    if (isset($_POST['submit']) && !wp_verify_nonce($_POST['ikva-genesis-infinite-scroll-form'], 'ikva-genesis-infinite-scroll')) {
        echo '<div class="notice-error notice"><p><strong>You are not allowed to access this page 🥴. Please try again</strong></p></div>';
        exit;
    }

    include_once(ikva_genesis_infinite_scroll_PLUGIN_DIR . 'includes/admin/settings.php');
}