<?php if (!defined('IN_CMS')) exit();


class WolfCkeditorFilemanagerController extends CkeditorBaseController {

    public function __construct()
    {
        parent::__construct();

        $this->check();
    }

    private function check()
    {
        if ( ! (bool) WolfCkeditor::setting('filemanager_enabled')) {
            return $this->notFoundResponse();
        }
    }

    public function index()
    {
        $settings = array(
            'configUrl'  => WolfCkeditor::routeUrl('fm_config'),
        );

        $this->headers['Content-type'] = 'text/html; charset=utf8';

        $this->display('filemanager/client', compact('settings'));
    }

    public function config()
    {
        $options = WolfCkeditor::filemanager();

        header("Content-type: application/json; charset=utf8");

        echo json_encode($options); exit;
    }

    public function connect($params = null)
    {
        $options = WolfCkeditor::filemanager();

        $connector = new WolfFilemanagerConnector(new Filemanager($options));

        return $connector->execute();
    }

}
