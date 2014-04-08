<div class='wrap'>

    <h2>Factlink settings</h2>

    <form method='post' action='options.php'>

        <?php

        // configures hidden fields
        settings_fields($this->option_group);
        ?>
        <?php

        // prints settings
        do_settings_sections($this->option_group);
        ?>

        <table class="form-table">

            <tr>
                <th scope="row">Enable discussions on posts:</th>
                <td>
                    <fieldset>

                        <label>
                            <input type="radio" name="<?php echo $this->settings->enabled_for_posts->name(); ?>"
                                   value="2" <?php if ($this->settings->enabled_for_posts->get() == "2") {
                                echo "checked";
                            } ?>>
                            All posts
                        </label>
                        <br/>

                        <label>
                            <input type="radio" name="<?php echo $this->settings->enabled_for_posts->name(); ?>"
                                   value="1" <?php if ($this->settings->enabled_for_posts->get() == "1") {
                                echo "checked";
                            } ?>>
                            Selected posts
                        </label>
                        <br/>

                        <label>
                            <input type="radio" name="<?php echo $this->settings->enabled_for_posts->name(); ?>"
                                   value="0" <?php if ($this->settings->enabled_for_posts->get() == "0") {
                                echo "checked";
                            } ?>>
                            No posts
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">Enable discussions on pages:</th>
                <td>
                    <fieldset>
                        <label>
                            <input type="radio" name="<?php echo $this->settings->enabled_for_pages->name(); ?>"
                                   value="2" <?php if ($this->settings->enabled_for_pages->get() == "2") {
                                echo "checked";
                            } ?>>
                            All pages
                        </label>
                        <br/>

                        <label>
                            <input type="radio" name="<?php echo $this->settings->enabled_for_pages->name(); ?>"
                                   value="1" <?php if ($this->settings->enabled_for_pages->get() == "1") {
                                echo "checked";
                            } ?>>
                            Selected pages
                        </label>
                        <br/>

                        <label>
                            <input type="radio" name="<?php echo $this->settings->enabled_for_pages->name(); ?>"
                                   value="0" <?php if ($this->settings->enabled_for_pages->get() == "0") {
                                echo "checked";
                            } ?>>
                            No pages
                        </label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">Comments</th>
                <td>
                    <fieldset>
                        <input type="hidden" name="<?php echo $this->settings->disable_global_comments->name(); ?>"
                               value="0">
                        <input type="checkbox"
                               name="<?php echo $this->settings->disable_global_comments->name(); ?>" <?php if ($this->settings->disable_global_comments->get() == 1) {
                            echo 'checked';
                        } ?> id="<?php echo $this->settings->disable_global_comments->name(); ?>" value="1">
                        <label for="<?php echo $this->settings->disable_global_comments->name(); ?>">Disable the default Wordpress comments.</label>
                    </fieldset>
                    <p class="description">Note: Disables the Wordpress ability to add new comments, but still shows the existing ones.</p>
                </td>
            </tr>

        </table>

        <?php submit_button(); ?>

    </form>

</div>
