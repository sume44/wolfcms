<?php defined('IN_CMS') || exit();

// Delete settings from db
if (Plugin::deleteAllSettings('ckeditor'))
    Flash::set('success', __('ckeditor::uninstall.success'));
else
    Flash::set('error', __('ckeditor::uninstall.error'));