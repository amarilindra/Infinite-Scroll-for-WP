<?php

function ikva_infinite_scroll_for_wp_configure()
{

    global $ikva_infinite_scroll_for_wp_settings;

    $viewable_configuration[] = array(
        "key" => "ikva_infinite_scroll_for_wp_configure_home_page",
        "title" => "Home Page",
        "description" => "",
        "linebreak" => true
    );

    $viewable_configuration[] = array(
        "key" => "ikva_infinite_scroll_for_wp_configure_blog",
        "title" => "Blog",
        "description" => "",
        "linebreak" => true
    );

    $viewable_configuration[] = array(
        "key" => "ikva_infinite_scroll_for_wp_configure_category_archives",
        "title" => "Category Archives",
        "description" => "",
        "linebreak" => true
    );

    $viewable_configuration[] = array(
        "key" => "ikva_infinite_scroll_for_wp_configure_tag_archives",
        "title" => "Tag Archives",
        "description" => "",
        "linebreak" => true
    );

    $viewable_configuration[] = array(
        "key" => "ikva_infinite_scroll_for_wp_configure_author_archives",
        "title" => "Author Archives",
        "description" => "",
        "linebreak" => true
    );

    $viewable_configuration[] = array(
        "key" => "ikva_infinite_scroll_for_wp_configure_search_results",
        "title" => "Search Results",
        "description" => "",
        "linebreak" => true
    );

    $cpt_viewable_configuration = __return_empty_array();
    getCustomPublicPostTypes($cpt_viewable_configuration);
    getCustomPublicTaxonomies($cpt_viewable_configuration);


    if (isset($_POST['submit'])) {

        $ikva_infinite_scroll_for_wp_settings = array();

        foreach ($viewable_configuration as $checkbox) {
            $ikva_infinite_scroll_for_wp_settings[$checkbox["key"]] = sanitize_text_field(isset($_POST[$checkbox["key"]]));
        }

        // CPT and Taxnonomies
        foreach ($cpt_viewable_configuration as $checkbox) {
            $ikva_infinite_scroll_for_wp_settings[$checkbox["key"]] = sanitize_text_field(isset($_POST[$checkbox["key"]]));
        }

        $ikva_infinite_scroll_for_wp_settings["ikva_infinite_scroll_for_wp_configure_loading_type"] = sanitize_text_field($_POST["ikva_infinite_scroll_for_wp_configure_loading_type"]);
        $ikva_infinite_scroll_for_wp_settings["ikva_infinite_scroll_for_wp_configure_loading_animation"] = sanitize_text_field($_POST["ikva_infinite_scroll_for_wp_configure_loading_animation"]);
        $ikva_infinite_scroll_for_wp_settings["ikva_infinite_scroll_for_wp_configure_priority"] = sanitize_text_field($_POST["ikva_infinite_scroll_for_wp_configure_priority"]);
        $ikva_infinite_scroll_for_wp_settings["ikva_infinite_scroll_for_wp_configure_color"] = sanitize_text_field($_POST["ikva_infinite_scroll_for_wp_configure_color"]);
        $ikva_infinite_scroll_for_wp_settings["ikva_infinite_scroll_for_wp_configure_button_text"] = sanitize_text_field($_POST["ikva_infinite_scroll_for_wp_configure_button_text"]);
        $ikva_infinite_scroll_for_wp_settings["ikva_infinite_scroll_for_wp_configure_end_message"] = sanitize_text_field($_POST["ikva_infinite_scroll_for_wp_configure_end_message"]);

        ikva_infinite_scroll_for_wp_save_settings($ikva_infinite_scroll_for_wp_settings);
    }

    ?>

    <form method="post" class="ikva-infinite-scroll-tab configure">

        <?php wp_nonce_field('ikva-infinite-scroll-for-wp', 'ikva-infinite-scroll-for-wp-form'); ?>

        <table class="form-table" role="presentation">

            <tbody>
            <tr>
                <th scope="row">Enable Infinite Scroll on</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Enable Infinite Scroll on</span></legend>
                        <?php
                        foreach ($viewable_configuration as $checkbox) {
                            ikva_infinite_scroll_for_wp_generate_checkbox(
                                $checkbox["key"],
                                $checkbox["title"],
                                $checkbox["description"],
                                $checkbox["linebreak"]
                            );
                        }
                        ?>
                    </fieldset>
                    <fieldset style="margin-top: 1rem">
                        <legend><strong>Custom Post Types and Taxonimies</strong></legend>
                        <p style="margin-bottom: 1rem"><i>CPT and Taxonomies are experimental and it works only if your
                                theme is following the
                                Genesis Framework coding standards in Archives</i></p>
                        <?php
                        foreach ($cpt_viewable_configuration as $checkbox) {
                            ikva_infinite_scroll_for_wp_generate_checkbox(
                                $checkbox["key"],
                                $checkbox["title"],
                                $checkbox["description"],
                                $checkbox["linebreak"]
                            );
                        }
                        ?>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">Load more posts</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Load next page</span></legend>
                        <label><input type="radio" name="ikva_infinite_scroll_for_wp_configure_loading_type"
                                      value="button" <?php echo ikva_infinite_scroll_for_wp_getRadioButtonStatus("ikva_infinite_scroll_for_wp_configure_loading_type", "button", "automatic"); ?> >
                            On button click</label>
                        <br>
                        <label><input type="radio" name="ikva_infinite_scroll_for_wp_configure_loading_type"
                                      value="automatic" <?php echo ikva_infinite_scroll_for_wp_getRadioButtonStatus("ikva_infinite_scroll_for_wp_configure_loading_type", "automatic", "automatic"); ?>>
                            Automatically when user scrolls to last post</label>
                    </fieldset>
                </td>

            </tr>


            <tr id="ikva_infinite_scroll_for_wp_configure_loading_animation">
                <th scope="row">Loading Animation Style</th>
                <td>
                    <?php $loading_animation_style_value = ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_loading_animation", "filling-circle") ?>
                    <select name="ikva_infinite_scroll_for_wp_configure_loading_animation"
                            value="<?php echo $loading_animation_style_value; ?>">

                        <option value="filling-circle" <?php if ($loading_animation_style_value == "filling-circle") {
                            echo 'selected';
                        } ?>>Filling Circle
                        </option>

                        <option value="solid-square" <?php if ($loading_animation_style_value == "solid-square") {
                            echo 'selected';
                        } ?>>Solid Square
                        </option>

                        <option value="chasing-dots" <?php if ($loading_animation_style_value == "chasing-dots") {
                            echo 'selected';
                        } ?>>Chasing Dots
                        </option>

                        <option value="circle-bounce" <?php if ($loading_animation_style_value == "circle-bounce") {
                            echo 'selected';
                        } ?>>Circle Bounce
                        </option>

                        <option value="jumping-waves" <?php if ($loading_animation_style_value == "jumping-waves") {
                            echo 'selected';
                        } ?>>Jumping Waves
                        </option>

                        <option value="ripple-effect" <?php if ($loading_animation_style_value == "ripple-effect") {
                            echo 'selected';
                        } ?>>Ripple Effect
                        </option>

                        <option value="bouncing-bubbles" <?php if ($loading_animation_style_value == "bouncing-bubbles") {
                            echo 'selected';
                        } ?>>Bouncing Bubbles
                        </option>

                        <option value="magic-cubes" <?php if ($loading_animation_style_value == "magic-cubes") {
                            echo 'selected';
                        } ?>>Magic Cubes
                        </option>

                        <option value="buffering" <?php if ($loading_animation_style_value == "ikva_infinite_scroll_animation_buffering") {
                            echo 'selected';
                        } ?>>Buffering
                        </option>

                        <option value="folding-cubes" <?php if ($loading_animation_style_value == "folding-cubes") {
                            echo 'selected';
                        } ?>>Folding Cubes
                        </option>


                    </select>
                    <div id="loading_style_animation_holder"></div>
                <td>
            </tr>


            <tr id="ikva_infinite_scroll_for_wp_configure_color">
                <th scope="row">Animation and Button Color</th>
                <td>
                    <label for="ikva_infinite_scroll_for_wp_configure_color">
                        <input name="ikva_infinite_scroll_for_wp_configure_color" type="color"
                               value="<?php echo ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_color", "#333") ?>">
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">Button Text</th>
                <td>
                    <label for="ikva_infinite_scroll_for_wp_configure_button_text">
                        <input name="ikva_infinite_scroll_for_wp_configure_button_text" type="text" maxlength="50"
                               id="ikva_infinite_scroll_for_wp_configure_button_text"
                               value="<?php echo ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_button_text", "Load More") ?>"
                        >
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">End Page Message</th>
                <td>
                    <label for="ikva_infinite_scroll_for_wp_configure_end_message">
                        <input name="ikva_infinite_scroll_for_wp_configure_end_message" type="text" maxlength="200"
                               id="ikva_infinite_scroll_for_wp_configure_end_message"
                               value="<?php echo ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_end_message", "That's all folks. No other posts to show") ?>"
                        >
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">Priority</th>
                <td>
                    <label for="ikva_infinite_scroll_for_wp_configure_priority">
                        <input name="ikva_infinite_scroll_for_wp_configure_priority" type="number" step="1" min="1"
                               id="ikva_infinite_scroll_for_wp_configure_priority"
                               value="<?php echo ikva_infinite_scroll_for_wp_get_option("ikva_infinite_scroll_for_wp_configure_priority", 10) ?>"
                               class="small-text">
                    </label> <i>Try increasing or decreasing the priority if you notice any alignment issues during
                        infinite scroll.</i>
                </td>
            </tr>

            </tbody>
        </table>

        <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary"
                                 value="Update Configuration"></p>

    </form>

    <?php
}

function getCustomPublicPostTypes(&$cpt_viewable_configuration)
{
    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects', 'and');
    foreach ($post_types as $post_type) {
        $cpt_viewable_configuration[] = array(
            "key" => "ikva_infinite_scroll_for_wp_configure_" . $post_type->name,
            "title" => $post_type->labels->singular_name . ' <small>(' . $post_type->name . ')</small>',
            "description" => "",
            "linebreak" => true
        );
    }
}

function getCustomPublicTaxonomies(&$cpt_viewable_configuration)
{
    $taxonomies = get_taxonomies(array('public' => true, '_builtin' => false), 'objects', 'and');
    foreach ($taxonomies as $taxonomy) {
        $cpt_viewable_configuration[] = array(
            "key" => "ikva_infinite_scroll_for_wp_configure_" . $taxonomy->name,
            "title" => $taxonomy->labels->singular_name . ' <small>(' . $taxonomy->name . ')</small>',
            "description" => "",
            "linebreak" => true
        );
    }
}