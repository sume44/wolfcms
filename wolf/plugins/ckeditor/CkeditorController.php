<?php defined('IN_CMS') || exit();


class CkeditorController extends PluginController {

    public function __construct()
    {
        if (defined('CMS_BACKEND')) {
            if ( ! AuthUser::isLoggedIn()) {
                redirect(get_url('login'));
            }
            $this->setUpLayout();
        }
    }

    protected function setUpLayout()
    {
        $this->setLayout('backend');

        $this->assignToLayout('sidebar', new View(PLUGINS_ROOT.DS.'ckeditor/views/admin/sidebar'));
    }

    public function ckeditorConfig()
    {
        $settings = WolfCkeditor::ckeditor();

        $response = new View(PLUGINS_ROOT.DS.'ckeditor/views/ckeditor/config', compact('settings'));

        header("Content-type: application/javascript; charset=utf8");

        echo $response->render();
        exit;
    }

    public function index()
    {
        $this->documentation();
    }

    public function documentation()
    {
        $lang = strtolower(I18n::getLocale());
        // Check for localized documentation or fallback to the default english and display notice
        if ( ! file_exists(PLUGINS_ROOT.DS.'ckeditor'.DS.'views/admin/docs/'.$lang.'.php')) {
            $lang = 'en';
        }
    
        return $this->display('admin/docs/'.$lang);
    }

    public function settings()
    {
        if (get_request_method() == 'POST')
            return $this->postSettings();

        $settings = Plugin::getAllSettings('ckeditor');

        $this->display('admin/settings', compact('settings'));
    }

    public function postSettings()
    {
        $errors = false;
        $data = $_POST['settings'];
        $settings = array();

        $folder = trim(str_replace('..', '', $data['filemanager_folder']), '/');
        $folder = preg_replace('/\s+/','', str_replace('//', '/', $folder));

        if (empty($folder)) {
            $errors[] = __('ckeditor::settings.validation.root_folder');
        } else if ( ! is_dir($dir = CMS_ROOT.DS.$folder)) {
            $errors[] = __('ckeditor::settings.validation.invalid_folder', array(':folder' => '<code>'.$dir.'</code>'));
        }

        $settings['filemanager_folder'] = $folder;

        $bools = array('filemanager_enabled', 'filemanager_images_only', 'filemanager_relative_images');
        foreach ($bools as $bool) {
            $settings[$bool] = (isset($data[$bool]) && (bool)$data[$bool]) ? '1' : '0';
        }

        if ($errors !== false) {
            Flash::setNow('error', implode('<br/>', $errors));
        } else {
            if (Plugin::setAllSettings($settings,'ckeditor')) {
                Flash::setNow('success', __('ckeditor::settings.save_success'));
            } else {
                $errors[] = __('ckeditor::settings.save_error');
            }
        }

        return $this->display('admin/settings', compact('token', 'settings'));
    }

    public function display($view, $vars=array(), $exit=true)
    {
        $path = '';

        if (empty($this->layout)) $path = PLUGINS_ROOT.DS;

        $path .= 'ckeditor'.DS.'views';

        return parent::display($path.DS.$view, $vars, $exit);
    }

}