<?php

function ikva_genesis_infinite_scroll_configure()
{

    global $ikva_genesis_infinite_scroll_settings;

    $viewable_configuration = array(

        array(
            "key" => "ikva_genesis_infinite_scroll_configure_home_page",
            "title" => "Home Page",
            "description" => "",
            "linebreak" => true
        ),

        array(
            "key" => "ikva_genesis_infinite_scroll_configure_blog",
            "title" => "Blog",
            "description" => "",
            "linebreak" => true
        ),

        array(
            "key" => "ikva_genesis_infinite_scroll_configure_category_archives",
            "title" => "Category Archives",
            "description" => "",
            "linebreak" => true
        ),

        array(
            "key" => "ikva_genesis_infinite_scroll_configure_tag_archives",
            "title" => "Tag Archives",
            "description" => "",
            "linebreak" => true
        ),

        array(
            "key" => "ikva_genesis_infinite_scroll_configure_author_archives",
            "title" => "Author Archives",
            "description" => "",
            "linebreak" => true
        ),

        array(
            "key" => "ikva_genesis_infinite_scroll_configure_search_results",
            "title" => "Search Results",
            "description" => "",
            "linebreak" => true
        )

    );

    if (isset($_POST['submit'])) {


        $ikva_genesis_infinite_scroll_settings = array();

        foreach ($viewable_configuration as $checkbox) {
            $ikva_genesis_infinite_scroll_settings[$checkbox["key"]] = isset($_POST[$checkbox["key"]]);
        }

        $ikva_genesis_infinite_scroll_settings["ikva_genesis_infinite_scroll_configure_loading_type"] = $_POST["ikva_genesis_infinite_scroll_configure_loading_type"];
        $ikva_genesis_infinite_scroll_settings["ikva_genesis_infinite_scroll_configure_loading_animation"] = $_POST["ikva_genesis_infinite_scroll_configure_loading_animation"];
        $ikva_genesis_infinite_scroll_settings["ikva_genesis_infinite_scroll_configure_priority"] = $_POST["ikva_genesis_infinite_scroll_configure_priority"];
        $ikva_genesis_infinite_scroll_settings["ikva_genesis_infinite_scroll_configure_color"] = $_POST["ikva_genesis_infinite_scroll_configure_color"];

        ikva_genesis_infinite_scroll_save_settings($ikva_genesis_infinite_scroll_settings);
    }

    ?>

    <form method="post" class="ikva-infinite-scroll-tab configure">

        <?php wp_nonce_field('ikva-genesis-infinite-scroll', 'ikva-genesis-infinite-scroll-form'); ?>

        <table class="form-table" role="presentation">

            <tbody>
            <tr>
                <th scope="row">Enable Infinite Scroll on</th>
                <td>
                    <fieldset>
                        <legend class="screen-reader-text"><span>Enable Infinite Scroll on</span></legend>

                        <?php
                        foreach ($viewable_configuration as $checkbox) {
                            ikva_genesis_infinite_scroll_generate_checkbox(
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
                        <label><input type="radio" name="ikva_genesis_infinite_scroll_configure_loading_type"
                                      value="button" <?php echo ikva_infinite_scroll_getRadioButtonStatus("ikva_genesis_infinite_scroll_configure_loading_type", "button", "automatic"); ?> >
                            On button click</label>
                        <br>
                        <label><input type="radio" name="ikva_genesis_infinite_scroll_configure_loading_type"
                                      value="automatic" <?php echo ikva_infinite_scroll_getRadioButtonStatus("ikva_genesis_infinite_scroll_configure_loading_type", "automatic", "automatic"); ?>>
                            Automatically when user scrolls to last post</label>
                    </fieldset>
                </td>

            </tr>


            <tr id="ikva_genesis_infinite_scroll_configure_loading_animation">
                <th scope="row">Loading Animation Style</th>
                <td>
                    <?php $loading_animation_style_value = ikva_infinite_scroll_get_option("ikva_genesis_infinite_scroll_configure_loading_animation", "filling-circle") ?>
                    <select name="ikva_genesis_infinite_scroll_configure_loading_animation"
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

                        <option value="buffering" <?php if ($loading_animation_style_value == "buffering") {
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


            <tr id="ikva_genesis_infinite_scroll_configure_color">
                <th scope="row">Animation and Button Color</th>
                <td>
                    <label for="ikva_genesis_infinite_scroll_configure_color">
                        <input name="ikva_genesis_infinite_scroll_configure_color" type="color"
                               value="<?php echo ikva_infinite_scroll_get_option("ikva_genesis_infinite_scroll_configure_color", "#333") ?>">
                    </label>
                </td>
            </tr>


            <tr>
                <th scope="row">Priority</th>
                <td>
                    <label for="ikva_genesis_infinite_scroll_configure_priority">
                        <input name="ikva_genesis_infinite_scroll_configure_priority" type="number" step="1" min="1"
                               id="ikva_genesis_infinite_scroll_configure_priority"
                               value="<?php echo ikva_infinite_scroll_get_option("ikva_genesis_infinite_scroll_configure_priority", 10) ?>"
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