<?php

class App
{

    /**
     * @var string $controller; controller to be used (default 'home')
     */
    protected $controller = "Home";

    /**
     * @var string $method; controller's method to be used (default 'index')
     */
    protected $method = "index";

    /**
     * @var array $params; method's param list
     */
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();
        
        if (isset($url[0]) && file_exists("../app/controllers/" . ucfirst($url[0]) . "Controller.class.php"))
        {
            $this->controller = ucfirst($url[0]);
            unset($url[0]);
        }

        require_once "../app/controllers/" . $this->controller . "Controller.class.php";

        $element_name = $this->controller . "Controller";
        $this->controller = new $element_name; 

        if (isset($url[1]) && method_exists($this->controller, $url[1]))
        {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /** 
     * parse URL and return an array
     * $url[0] : controller; $url[1] : method; $url[2] : param(s);
     * 
     * Example:
     * 
     * $_GET['url'] = home/salut/sava
     * 
     * Result: Array ( [0] => home [1] => salut [2] => cava )
    */
    public function parseUrl()
    {
        if (isset($_GET['url']))
            return (explode("/", filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)));
    }
}

?>