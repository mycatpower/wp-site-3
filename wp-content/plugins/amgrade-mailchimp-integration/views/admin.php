<div class="wrap">
    <h2><?php echo get_admin_page_title() ?></h2>

    <form action="options.php" method="POST">
        <?php  settings_fields("am_mc_integration"); ?>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="mc_api_key">Mailchimp API Key</label>
                    </th>
                    <td>
                        <input type="text" name="mc_api_key" value="<?php echo esc_attr( get_option('mc_api_key') ) ?>">
                    </td>
                </tr>
            </tbody>
        </table>
        <?php submit_button(); ?>
    </form>
</div>