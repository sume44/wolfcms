<style type="text/css" media="screen">
    #ckeditor_settings .tabs { margin-top:20px }
    #ckeditor_settings .page { padding:0 5px }
    #ckeditor_settings fieldset { margin: 5px 0; padding:10px; }
    #ckeditor_settings li { margin:3px 0; padding:4px 0 4px 4px; }
    #ckeditor_settings h3, #ckeditor_settings label { margin:3px 4px 6px; font-size: 14px }
    #ckeditor_settings label { cursor: pointer }
    #ckeditor_settings p.help { margin:3px 4px 0; padding:4px 0; font-size:12px; line-height:1.5; color:#666 }
</style>

<h1><?php echo __('ckeditor::ui.settings.title'); ?></h1>

<form id="ckeditor_settings" action="<?php echo get_url('plugin/ckeditor/settings'); ?>" method="post">

    <ul>
        <li>
            <label for="filemanager_enabled">
                <?php echo __('ckeditor::ui.settings.fm.enable.label'); ?>
            </label>
            <select class="select" name="settings[filemanager_enabled]" id="filemanager_enabled">
                <option value="1"<?php if($settings['filemanager_enabled'] == '1') echo ' selected="selected"'; ?>>
                    <?php echo __('Yes'); ?>
                </option>
                <option value="0"<?php if($settings['filemanager_enabled'] == '0') echo ' selected="selected"'; ?>>
                    <?php echo __('No'); ?>
                </option>
            </select>
        </li>

        <li>
            <label for="filemanager_folder">
                <?php echo __('ckeditor::ui.settings.fm.folder.label'); ?>
            </label>
            <code><?php echo URL_PUBLIC; ?></code>
            <input required type="text" id="filemanager_folder" name="settings[filemanager_folder]" value="<?php echo $settings['filemanager_folder']; ?>" />
            <code>/</code>
            <p class="help"><?php echo __('ckeditor::ui.settings.fm.folder.help'); ?></p>
        </li>

        <li>
            <label for="filemanager_images_only">
                <?php echo __('ckeditor::ui.settings.fm.images_only.label'); ?>
            </label>
            <select class="select" name="settings[filemanager_images_only]" id="filemanager_images_only">
                <option value="1"<?php if($settings['filemanager_images_only'] == '1') echo ' selected="selected"'; ?>>
                    <?php echo __('Yes'); ?>
                </option>
                <option value="0"<?php if($settings['filemanager_images_only'] == '0') echo ' selected="selected"'; ?>>
                    <?php echo __('No'); ?>
                </option>
            </select>
            <p class="help"><?php echo __('ckeditor::ui.settings.fm.images_only.help'); ?></p>
        </li>

        <li>
            <label for="filemanager_relative_images">
                <?php echo __('ckeditor::ui.settings.fm.rel_images.label'); ?>
            </label>
            <select class="select" name="settings[filemanager_relative_images]" id="filemanager_relative_images">
                <option value="1"<?php if($settings['filemanager_relative_images'] == '1') echo ' selected="selected"'; ?>>
                    <?php echo __('Yes'); ?>
                </option>
                <option value="0"<?php if($settings['filemanager_relative_images'] == '0') echo ' selected="selected"'; ?>>
                    <?php echo __('No'); ?>
                </option>
            </select>
            <p class="help">
                <?php echo __('ckeditor::ui.settings.fm.rel_images.help'); ?>
                <br />
                <strong>"/public/images/foo.jpg"</strong>
                vs.
                <code><strong>"<?php echo URL_PUBLIC; ?>public/images/foo.jpg"</strong></code>
            </p>
        </li>

    </ul>

    <p class="buttons">
        <input class="button" name="commit" type="submit" accesskey="s" value="<?php echo __('Save'); ?>" />
    </p>
</form>