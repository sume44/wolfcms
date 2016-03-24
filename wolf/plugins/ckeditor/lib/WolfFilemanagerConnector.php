<?php if (!defined('IN_CMS')) exit();


class WolfFilemanagerConnector {

    protected $filemanager;

    public function __construct(Filemanager $filemanager)
    {
        $this->filemanager = $filemanager;
    }

    public function execute()
    {
        $fm = $this->filemanager;

        if ( ! isset($_GET)) {
            return $fm->error($fm->lang('INVALID_ACTION'));
        }

        if (isset($_GET['mode']) && ! empty($_GET['mode'])) {
            return $this->processRequest($_GET['mode']);
        } else if (isset($_POST['mode']) && ! empty($_POST['mode'])) {
            return $this->processRequest($_POST['mode'], 'post');
        }

        return $fm->error($fm->lang('INVALID_ACTION'));
    }

    protected function processRequest($mode, $method = 'GET')
    {
        $request_method = strtoupper($method);
        $fm = $this->filemanager;
        $response = '';

        switch ($mode) {
            default:
                return $fm->error($fm->lang('MODE_ERROR'));
                break;

            case 'add':
                if ($fm->postvar('currentpath'))
                    $fm->add();
                break;

            case 'getinfo':
                if ($fm->getvar('path'))
                    $response = $fm->getinfo();
                break;

            case 'getfolder':
                if ($fm->getvar('path'))
                    $response = $fm->getfolder();
                break;

            case 'rename':
                if ($fm->getvar('old') && $fm->getvar('new'))
                    $response = $fm->rename();
                break;

            case 'delete':
                if ($fm->getvar('path'))
                    $response = $fm->delete();
                break;

            case 'addfolder':
                if ($fm->getvar('path') && $fm->getvar('name'))
                    $response = $fm->addfolder();
                break;

            case 'download':
                if ($fm->getvar('path'))
                    $fm->download();
                break;

            case 'preview':
                if ($fm->getvar('path')) {
                    if(isset($_GET['thumbnail'])) {
                        $thumbnail = true;
                    } else {
                        $thumbnail = false;
                    }
                    $fm->preview($thumbnail);
                }
                break;
        
            case 'maxuploadfilesize':
                return $fm->getMaxUploadFileSize();
                break;
        }

        return $this->sendResponse($response);
    }

    protected function sendResponse($response)
    {
        if ( ! headers_sent())
            header("Content-Type: application/json; charset=utf-8");

        echo json_encode($response);
        die();
    } 

}