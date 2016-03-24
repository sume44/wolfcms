<?php defined('IN_CMS') || exit();

Filter::add('ckeditor', 'ckeditor/lib/Ckeditor.filter.php');

Plugin::addController('ckeditor', __('ckeditor::plugin.title'), '', false);

AutoLoader::addFolder(array(
    PLUGINS_ROOT.DS.'ckeditor'.DS.'lib',
    PLUGINS_ROOT.DS.'ckeditor'.DS.'controllers',
));

if (AuthUser::isLoggedIn()) {

    // By default we'll only setup ckeditor for pages and snippets
    Observer::observe('dispatch_route_found', 'WolfCkeditor::coreObserver');
    // but provide an event to allow third-party plugins an easy integration
    Observer::observe('filters_add_scripts', 'WolfCkeditor::addScripts');

    $routes = WolfCkeditor::routes();

    // Routes for ckeditor
    Dispatcher::addRoute(array(
        $routes['ck_config'] => 'plugin/ckeditor/ckeditorConfig',
    ));

    // Routes for the filemanager
    if ((bool) WolfCkeditor::setting('filemanager_enabled', false)) {
        Dispatcher::addRoute(array(
            $routes['fm_index']   => 'wolf_ckeditor_filemanager/index',
            $routes['fm_config']  => 'wolf_ckeditor_filemanager/config',
            $routes['fm_connect'] => 'wolf_ckeditor_filemanager/connect',
        ));
    }
}