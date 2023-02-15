<?php

function ikva_infinite_scroll_for_wp_help()
{

    $animationHelper = new IkvaInfiniteScrollAnimationHelper();

    ?>

    <div class="ikva-infinite-scroll-tab help"></div>
    <div class="ikva_infinite_scroll_for_wp_help">
        <h3>Is my theme supported?</h3>
        <p><?php echo ikva_infinite_scroll_for_wp_is_genesis_framework(); ?></p>
    </div>

    <div class="ikva_infinite_scroll_for_wp_help">
        <h3>Should I enable infinite scroll everywhere?</h3>
        <p>Maybe Yes or No. It depends on your preferences and theme design.<br>If you are using a custom-developed page
            instead of regular posts layout as your front page/home page, you need to disable infinite scroll on
            it.<br><br>For example, check the home page of the <a href="https://www.geekdashboard.com/" target="_blank">Geek
                Dashboard</a>. Here we are using a custom-coded front page and infinite scroll is not possible since it
            is a combination of different sections. However, if you are using the theme's default latest posts as home
            page, you can enable infinite scroll on it.</p>
    </div>

    <div class="ikva_infinite_scroll_for_wp_help">
        <h3>Loading posts "Automatically on scroll" or "On Button Click". Which one to use and why?</h3>
        <p>Both options have it's own pros and cons. If you have important information in site footer or sidebar(on
            mobiles), you should use "On Button Click" to load more posts. So the user will have a chance to view your
            sidebar and footer. If you wish to save a user click and no critical information is available in the sidebar
            or
            the footer, you can choose to load posts automatically when user scrolls to the end of the list.</p>
    </div>

    <div class="ikva_infinite_scroll_for_wp_help">
        <h3>What is plugin priority?</h3>
        <p>Under the hood, the plugin use <code>genesis_before_loop</code> and <code>genesis_after_loop</code> actions
            to show the loading button and animations. If any other installed plugin or your theme is using the same
            action(s) with default priority 10, they might conflict with each other.<br>To prevent this, we need to load
            our plugin actions either quickly or delay it. If you notice broken UI elements after enabling infinite
            scroll, consider increasing or decreasing the priority value.</p>
    </div>


    <div class="ikva_infinite_scroll_for_wp_help">
        <h3>All animations styles in action</h3>
        <div class="ikva_infinite_scroll_for_wp_all_animations">
            <ul>
                <?php
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_solidSquare());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_chasingDots());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_circleBounce());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_jumpingWaves());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_rippleEffect());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_bouncingBubbles());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_magicCubes());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_buffering());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_foldingCubes());
                ikva_infinite_scroll_animation_preview_help($animationHelper->ikva_infinite_scroll_animation_fillingCircle());
                ?>
            </ul>
        </div>
    </div>

    <div class="ikva_infinite_scroll_for_wp_help">
        <h3>I have a feature suggestion / I want to report a bug</h3>
        <p>To report bugs or to suggest new features, please visit the <a
                    href="https://ikvaesolutions.com/go/infinite-scroll-for-wp-github" target="_blank">GitHub repo</a>
            or <a href="https://ikvaesolutions.com/go/infinite-scroll-for-wp" target="_blank">WordPress plugin
                page</a>. Alternatively, you can get in touch with us at <a href="mailto:contact@ikvaesolutions.com">contact@ikvaesolutions.com</a>
            or <a href="mailto:contact@geekdashboard.com">contact@geekdashboard.com</a></p>
    </div>
    <div class="ikva_infinite_scroll_for_wp_help">
        <h3>How does this plugin work?</h3>
        <p>This plugin is using <a href="<?php echo ikva_infinite_scroll_for_wp_ASSETS . '/js/infinite-scroll.pkgd.min.js'?>"
                                   target="_blank">infinite-scroll.pkgd.min.js</a> to load more posts
            and special thanks to Tobiasahlin's <a href="https://tobiasahlin.com/spinkit/" target="_blank">Spinkit</a>
            for loading animations with pure CSS</p>
    </div>

    <style>
        .ikva_infinite_scroll_for_wp_help {
            background: #ffffff;
            padding: 10px 20px;
            margin: 15px 15px 15px 0;
            max-width: 970px;
            -webkit-transition: all .3s;
            -moz-transition: all .3s;
            transition: all .3s;
        }

        .ikva_infinite_scroll_for_wp_help:hover {
            box-shadow: 0 0 15px 5px #eaeaea;
            transform: scale(1.02);
            cursor: help;
        }

        .ikva_infinite_scroll_for_wp_all_animations li {
            display: inline-grid;
            width: 25%;
            text-align: center;
            margin-top: 50px;
            color: #000000;
        }

        .ikva_infinite_scroll_for_wp_all_animations li > div {
            margin-top: 25px;
        }

    </style>

    <?php
}


function ikva_infinite_scroll_for_wp_is_genesis_framework()
{


    if (is_child_theme()) {
        $parent_theme_template = wp_get_theme()->parent()->get_template();
    } else {
        $parent_theme_template = wp_get_theme()->get_template();
    }

    if ($parent_theme_template === "genesis") {
        return "<p style='color:#4CAF50;'><strong>Yes</strong>, your theme \"" . wp_get_theme() . "\" is running on the Genesis Framework and is supported</p>";
    } else {
        return "<p style='color:#f44336;'><strong>No</strong>, your theme \"" . wp_get_theme() . "\" is  not using the Genesis Framework. This plugin is not compatible with your theme.</p>";
    }
}


function ikva_infinite_scroll_animation_preview_help(array $animation)
{
    echo "<li>" . $animation["name"] . "<br>" . "<style>" . str_replace("[user-selected-color]", ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_color", "#333"), $animation["css"]) . "</style>" . $animation["html"] . "</li>";
}