<?php

function ikva_infinite_scroll_for_wp_generate_checkbox(string $id, string $title, string $description, bool $linebreak = true)
{ ?>

    <label for="<?php echo $id ?>">
        <input name="<?php echo $id ?>" type="checkbox"
               id="<?php echo $id ?>" <?php echo ikva_infinite_scroll_for_wp_getCheckboxStatus($id) ?> ">
        <?php echo $title ?>
    </label>
    <?php if ($description != "") echo "'<p>'.$description.'</p>'" ?>
    <?php if ($linebreak) echo "<br>" ?>

    <?php
}


function ikva_infinite_scroll_for_wp_getCheckboxStatus(string $key)
{
    global $ikva_infinite_scroll_for_wp_settings;

    if (array_key_exists($key, $ikva_infinite_scroll_for_wp_settings) && $ikva_infinite_scroll_for_wp_settings[$key]) {
        return 'checked="checked"';
    } else {
        return "";
    }
}

function ikva_infinite_scroll_for_wp_getRadioButtonStatus(string $key, string $value, string $default)
{
    global $ikva_infinite_scroll_for_wp_settings;

    if (array_key_exists($key, $ikva_infinite_scroll_for_wp_settings)) {
        if ($ikva_infinite_scroll_for_wp_settings[$key] == $value) {
            return 'checked="checked"';
        } else {
            return "";
        }
    } else {
        if ($value == $default) {
            return 'checked="checked"';
        } else {
            return "";
        }
    }

}

function ikva_infinite_scroll_for_wp_get_option(string $key, string $default)
{
    global $ikva_infinite_scroll_for_wp_settings;

    if (array_key_exists($key, $ikva_infinite_scroll_for_wp_settings)) {
        return esc_html($ikva_infinite_scroll_for_wp_settings[$key]);
    } else {
        return $default;
    }

}

