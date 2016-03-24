<?php if (!defined('IN_CMS')) exit();


class CkeditorBaseController extends Controller {

    protected $headers = array(
        'Content-type' => 'text/html; charset=utf8',
    );

    public function __construct()
    {
        if ( ! AuthUser::isLoggedIn()) { 
            return $this->notFoundResponse();
        }
    }

    // render method will use our views path
    public function render($view, $vars=array())
    {
        $path = PLUGINS_ROOT.DS.'ckeditor'.DS.'views';

        if ( ! empty($this->layout)) {
            // We assign our Views as content already rendered
            $this->assignToLayout('content_for_layout', new View($path.DS.$view, $vars));
            // and render the backend layout as usual
            return new View('../layouts/'.$this->layout, $this->layout_vars);
        }

        return new View($path.DS.$view, $vars);
    }

    private function notFoundResponse()
    {
        header("HTTP/1.0 404 Not Found");
        header("Status: 404 Not Found");
        exit();
    }

    public function display($view, $vars=array(), $exit=true)
    {
        if (headers_sent()) {
            foreach ($this->headers as $field => $definition) {
                header("{$field}: {$definition}", true);
            }
        }

        echo $this->render($view, $vars);
        if ($exit) exit;
    }

    public function execute($action, $params)
    {
        if (substr($action, 0, 1) == '_' || ! method_exists($this, $action)) {
            return $this->notFoundResponse();
        }
        call_user_func_array(array($this, $action), $params);
    }

    public function __get($var) { return; }

    public function __call($function, $args) { return; }
}
