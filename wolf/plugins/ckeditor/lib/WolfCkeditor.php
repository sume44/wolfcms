<?php

class WolfCkeditor {

    private static $filemanager;

    private static $settings;

    private static $plugins;

    private static $routes = array(
        'ck_config'  => '/wolf/plugins/ckeditor/config',
        'fm_index'   => '/wolf_ckeditor/filemanager/index.php',
        'fm_config'  => '/wolf_ckeditor/filemanager/config.php',
        'fm_connect' => '/wolf_ckeditor/filemanager/connect.php',
        'fm_images'  => '/wolf_ckeditor/filemanager/index.php?type=Images',
        'fm_flash'   => '/wolf_ckeditor/filemanager/index.php?type=Flash',
    );

    public static function routes()
    {
        return static::$routes;
    }

    public static function route($name, $path = '')
    {
        $route = '';

        if (isset(static::$routes[$name])) {
            $route .= static::$routes[$name];
        }

        if ( ! empty($path)) {
            $path = '/'.ltrim($path, '/');
        }

        return rtrim($route, '/').$path;
    }

    public static function routeUrl($name, $path = '')
    {
        $base = rtrim(URL_PUBLIC, '/').(USE_MOD_REWRITE ? '': '/?');

        return $base.static::route($name, $path);
    }

    public static function ckeditor()
    {
        $urls = self::getBaseUrls();

        $site = $urls['site'];
        $user = self::getUserLocale();

        $routes = array(
            'filemanager' => static::routeUrl('fm_index'),
            'filemanager_images' => static::routeUrl('fm_images'),
            'filemanager_flash'  => static::routeUrl('fm_flash'),
        );

        $filemanager = array(
            'enabled'     => static::setting('filemanager_enabled', false),
            'images_only' => static::setting('filemanager_images_only', false),
        );

        $settings = compact('site', 'routes', 'user', 'filemanager');

        return $settings;
    }

    public static function filemanager()
    {
        $config = static::getFilemanagerSettings();

        $folder = static::setting('filemanager_folder', '');

        $folder = ( ! empty($folder))
            ? trim($folder, '/')
            : 'public';

        $folderPath = trim(str_replace('//', '/', $folder), '/').'/';

        $urls = self::getBaseUrls();
        $user = self::getUserLocale();

        $relPath = '/'.$folderPath;

        if ( ! static::setting('filemanager_relative_images', true)) {
            $relPath = $urls['site'].$relPath;
        }

        $options = array(
            'autoload'  => true,
            'root'      => PLUGINS_ROOT.DS.'ckeditor/resources/filemanager/',
            'relPath'   => $relPath,
            'culture'   => $user['lang'],
            'searchBox' => false,
            'logger'    => null,
            'plugins'   => null,
        );

        $options['fileRoot']   = CMS_ROOT.DS.$folderPath;
        $options['serverRoot'] = false;
        $options['fileConnector'] = static::routeUrl('fm_connect');

        if ($folderPath == '/') {
            $data['exclude']['unallowed_files'][] = 'config.php';
            $data['exclude']['unallowed_dirs'][] = 'wolf';            
        }

        $config['upload']['imagesOnly'] = static::setting('filemanager_images_only', true);

        $config['options'] = array_merge($config['options'], $options);

        return $config;
    }

    public static function setting($name, $default = '')
    {
        $settings = static::getPluginSettings();

        return (isset($settings[$name]))
            ? $settings[$name]
            : $default;
    }

    public static function coreObserver()
    {
        $controllers = '(page|snippet)';
        $actions = '(add|edit)';
        $pattern = '/^'.ADMIN_DIR.'\/'.$controllers.'\/'.$actions.'/';

        if (preg_match($pattern, CURRENT_URI)) {
            static::addScripts();
        }
    }

    public static function addScripts()
    {
        $path = (USE_MOD_REWRITE) ? '' : '../../?/wolf/plugins/';

        Plugin::addJavascript('ckeditor', 'resources/ckeditor/ckeditor.js');
        Plugin::addJavascript('ckeditor', 'resources/wolfckeditor.js');
        Plugin::$javascripts[] = $path.'ckeditor/config';
        Plugin::addJavascript('ckeditor', 'resources/users/ckeditor.config.js');
    }

    public static function getBaseUrls()
    {
        $site  = rtrim(URL_PUBLIC, '/');
        $route = $site.(USE_MOD_REWRITE ? '': '/?').'/wolf_ckeditor';

        $urls  = compact('site','route');

        return $urls;
    }

    public static function getUserLocale()
    {
        $lang = strtolower(i18n::getLocale());
        $dir  = (in_array($lang, array('ar', 'fa', 'he', 'ku', 'ug'))) ? 'rtl' : 'ltr';
        $user = compact('lang','dir');

        return $user;
    }

    private static function getPluginSettings()
    {
        if (empty(static::$settings)) {
            $settings = Plugin::getAllSettings('ckeditor');
            static::$settings = $settings;
        }

        return static::$settings;
    }

    private static function getFilemanagerSettings()
    {
        if (empty(static::$filemanager)) {
            $json = PLUGINS_ROOT.DS.'ckeditor/resources/users/filemanager.config.json';
            $config = self::loadJson($json);

            static::$filemanager = $config;
        }

        return static::$filemanager;
    }

    private static function loadJson($file)
    {
        $data = array();

        if (file_exists($file)) {
            $stream = file_get_contents($file);
            $data = json_decode($stream, true);
        }

        return $data;
    }

}