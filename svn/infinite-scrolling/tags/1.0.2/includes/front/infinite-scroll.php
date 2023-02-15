<?php

add_action('wp_enqueue_scripts', 'ikva_infinite_scroll_for_wp_front_scripts');
function ikva_infinite_scroll_for_wp_front_scripts()
{

    $ikva_infinite_scroll_for_wp_home = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_home_page", 0);
    $ikva_infinite_scroll_for_wp_blog = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_blog", 0);
    $ikva_infinite_scroll_for_wp_category = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_category_archives", 0);
    $ikva_infinite_scroll_for_wp_tag = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_tag_archives", 0);
    $ikva_infinite_scroll_for_wp_author = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_author_archives", 0);
    $ikva_infinite_scroll_for_wp_search = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_search_results", 0);

    if (
        ((is_front_page() || is_home()) && $ikva_infinite_scroll_for_wp_home) ||
        (ikva_infinite_scroll_is_blog() && $ikva_infinite_scroll_for_wp_blog) ||
        (is_category() && $ikva_infinite_scroll_for_wp_category) ||
        (is_tag() && $ikva_infinite_scroll_for_wp_tag) ||
        (is_author() && $ikva_infinite_scroll_for_wp_author) ||
        (is_search() && $ikva_infinite_scroll_for_wp_search)
    ) {
        ikva_infinite_scroll_for_wp_front();
    }

}

function ikva_infinite_scroll_for_wp_front()
{
    wp_enqueue_script('infinite-scroll', ikva_infinite_scroll_for_wp_ASSETS . '/js/infinite-scroll.pkgd.min.js', array('jquery'), null, true);
    add_action('genesis_after_loop', 'ikva_infinite_scroll_for_wp_closing_tag', ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_priority", 10));
    add_action('genesis_before_loop', 'ikva_infinite_scroll_for_wp_opening_tag', ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_priority", 10));
    add_action('wp_footer', 'ikva_infinite_scroll_for_wp_footer', 99);
}

function ikva_infinite_scroll_for_wp_opening_tag()
{
    echo '<div class="ikva-infinite-posts">';
}


function ikva_infinite_scroll_for_wp_closing_tag()
{
    echo '</div><div class="ikva-infinite-scroll-page-load-status"><div class="ikva-infinite-scroll-loader infinite-scroll-request" style="display:none"></div><p class="infinite-scroll-last ikva-page-load-status-end" style="display:none">No more posts to show</p></div><div class="ikva-load-more-button-holder infinite-scroll-request" style="margin-bottom: 50px;"></div>';
}


function ikva_infinite_scroll_for_wp_footer()
{

    $loadingType = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_loading_type", "automatic");
    $animationColor = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_color", "#333");

    $animationDetails = ikva_infinite_scroll_for_wp_getLoadingAnimationDetails();

    $animationHTML = $animationDetails["html"];
    $animationCSS = str_replace("[user-selected-color]", $animationColor, $animationDetails["css"]);
    $loadMoreButtonCSS = "";

    if ($loadingType === "automatic") {
        ikva_infinite_scroll_for_wp_type_automatic($animationHTML);
    } else {
        $loadMoreButtonHTML = "<button class=\"ikva-view-more-button\">Load More</button>";
        $loadMoreButtonCSS = ".ikva-load-more-button-holder{text-align:center;margin-top:50px}.ikva-view-more-button{background:[user-selected-color];color:#fff;padding:10px 25px;border-radius:5px;text-transform:uppercase;font-family:inherit;font-weight:700}.ikva-view-more-button:hover{opacity:.9;cursor:pointer}.ikva-view-more-button:disabled,.ikva-view-more-button[disabled=disabled]{opacity:.5;cursor:not-allowed;display:none;}";
        $loadMoreButtonCSS = str_replace("[user-selected-color]", $animationColor, $loadMoreButtonCSS);
        ikva_infinite_scroll_for_wp_type_button($animationHTML, $loadMoreButtonHTML);
    }

    ?>

    <style type="text/css">

        .ikva-infinite-scroll-page-load-status {
            margin-top: 50px;
            margin-bottom: 50px;
            text-align: center;
        }

        .ikva-page-load-status-end {
            color: #212121;
            font-size: 1.2em;
            margin-top: 3em;
        }

        <?php echo $animationCSS .''. $loadMoreButtonCSS ?>

    </style>

    <?php
}


function ikva_infinite_scroll_for_wp_getLoadingAnimationDetails()
{
    $animation_style = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_loading_animation", "filling-circle");

    $animationHelper = new IkvaInfiniteScrollAnimationHelper();
    return $animationHelper->ikva_infinite_scroll_animation_helper_getCode($animation_style);

}

function ikva_infinite_scroll_for_wp_type_button($animationHTML, $loadMoreButtonHTML)
{ ?>

    <script>
        jQuery(document).ready(function ($) {

            jQuery(".ikva-load-more-button-holder").append('<?php echo $loadMoreButtonHTML; ?>');
            jQuery(".ikva-infinite-scroll-loader").append('<?php echo $animationHTML; ?>');

            jQuery('.ikva-infinite-posts').infiniteScroll({
                path: '.pagination-next a',
                append: '.entry',
                history: 'push',
                hideNav: '.pagination',
                historyTitle: true,
                status: '.ikva-infinite-scroll-page-load-status',
                debug: false,
                button: '.ikva-view-more-button',
                scrollThreshold: false,
            });

        });
    </script>

    <?php
}

function ikva_infinite_scroll_for_wp_type_automatic($animationHTML)
{ ?>

    <script>

        jQuery(document).ready(function ($) {

            jQuery(".ikva-infinite-scroll-loader").append('<?php echo $animationHTML; ?>');

            jQuery('.ikva-infinite-posts').infiniteScroll({
                path: '.pagination-next a',
                append: '.entry',
                history: 'push',
                hideNav: '.pagination',
                historyTitle: true,
                status: '.ikva-infinite-scroll-page-load-status',
                debug: false,
                scrollThreshold: 100,
            });

        });
    </script>

    <?php
}

function ikva_infinite_scroll_is_blog(){
        if ( is_front_page() && is_home() ) {
            return false;
        } elseif ( is_front_page() ) {
            return false;
        } elseif ( is_home() ) {
            return get_option( 'page_for_posts' ); // Returns blog page ID
        } else {
            return false;
        }
    }