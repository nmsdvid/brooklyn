<?php
/**
 * Settings Page
 * this page contains all the output for the settings page
 */

include '../_cms/index.php';

Cms::pageProtect();

$data = $cms->getSettingsData();

?>

<form id="panel" class="js-settings-form">
    <ul class="list">
        <?php
        foreach ($data as $jsonData) {
            ?>
            <li>
                <span class="content-title">Site Settings</span>
                <label>Site Title:</label> <input type="text" class="content-input" name="site-title" value="<?php echo $jsonData->settings->site_title; ?>"/>
                <label>Site Meta Description:</label> <input type="text" class="content-input" name="meta-desc" value="<?php echo $jsonData->settings->meta_description; ?>"/>
                <label>Site Meta Keywords:</label> <input type="text" class="content-input" name="meta-key" value="<?php echo $jsonData->settings->meta_keywords; ?>"/>
            </li>

            <li>
                <span class="content-title">User Settings</span>
                <label>Username:</label> <input type="text" class="content-input" name="settings-username" value="<?php echo $jsonData->settings->username; ?>"/>
                <label>Password:</label> <input type="text" class="content-input" name="settings-password" value="<?php echo $jsonData->settings->password; ?>"/>
            </li>
            <input type="hidden" name="settings-cookie" value="<?php echo $jsonData->settings->cookie_token; ?>"
    <?php }
        ?>
    </ul>
    <input type="submit" class="save-progress" value="Save"/>
</form>