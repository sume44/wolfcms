<?php defined('IN_CMS') || exit();

return array(
    'ckeditor::plugin.title'       => 'CKEditor',
    'ckeditor::plugin.description' => 'CKEditor wysiwyg filter for WolfCMS',

    'ckeditor::uninstall.success' => 'CKEditor - plugin uninstalled successfully',
    'ckeditor::uninstall.error'   => 'CKEditor - unable to delete plugin settings',
    'ckeditor::disable.info'      => 'Some CKEditor settings are stored in database.<br/>Click uninstall if you wish to delete them.',

    'ckeditor::views.sidebar.settings' => 'Settings',
    'ckeditor::views.sidebar.docs'     => 'Documentation',

    'ckeditor::ui.settings.title'           => 'CKEditor Settings',
    'ckeditor::ui.settings.fm.enable.label' => 'Enable filemanager',
    'ckeditor::ui.settings.fm.folder.label' => 'Default folder',
    'ckeditor::ui.settings.fm.folder.help'  => 'Specify a relative path from your wolf installation. Remember to check folder permissions.',

    'ckeditor::ui.settings.fm.images_only.label' => 'Restrict user uploads to images only?',
    'ckeditor::ui.settings.fm.images_only.help'  => 'Specify whether your users are allowed to upload files other than images.',

    'ckeditor::ui.settings.fm.rel_images.label' => 'Use relative URLs for the images src attribute?',
    'ckeditor::ui.settings.fm.rel_images.help'  => 'Specify whether you prefer image paths with the relative path or the full URL.',

    'ckeditor::settings.validation.root_folder'    => 'Specifying the web root as the default folder is not allowed',
    'ckeditor::settings.validation.invalid_folder' => 'Folder :folder does not exists!',

    'ckeditor::settings.save_success' => 'Settings were updated successfully',
    'ckeditor::settings.save_error'   => 'There was a problem saving the settings',

    'Yes'  => 'Yes',
    'No'   => 'No',
    'Save' => 'Save',
);