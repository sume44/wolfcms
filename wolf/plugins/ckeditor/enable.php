<?php defined('IN_CMS') || exit();

$old = Plugin::getAllSettings('ckeditor');

$settings = array(
    'filemanager_enabled' => '1',
    'filemanager_folder'  => 'public/images',
    'filemanager_images_only' => '0',
    'filemanager_relative_images' => '1',
);

if (isset($old['filemanager_enabled'])) {
    $settings['filemanager_enabled'] = $old['filemanager_enabled'];
}
if (isset($old['filemanager_base'])) {
    $settings['filemanager_folder'] = trim($old['filemanager_base'], '/');
}
if (isset($old['filemanager_upload_images_only'])) {
    $settings['filemanager_images_only'] = (bool)$old['filemanager_upload_images_only'];
}

Plugin::deleteAllSettings('ckeditor');

Plugin::setAllSettings($settings, 'ckeditor');