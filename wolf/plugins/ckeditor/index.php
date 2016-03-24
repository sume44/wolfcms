<?php defined('IN_CMS') || exit();

Plugin::setInfos(array(
    'id'                    => 'ckeditor',
    'title'                 => __('ckeditor::plugin.title'),
    'description'           => __('ckeditor::plugin.description'),
    'version'               => '2.3.1',
    'license'               => 'GPLv3',
    'author'                => 'andrewmman',
    'website'               => 'http://www.wolfcms.org/forum/topic1957.html',
    'update_url'            => 'http://andrewmman.byethost7.com/wolfplugins.xml',
    'require_wolf_version'  => '0.7.5',
    'type'                  => 'both',
));

if (Plugin::isEnabled('ckeditor')) {
    if (file_exists($start = PLUGINS_ROOT.DS.'ckeditor'.DS.'start.php')) {
        require $start;
    }
}