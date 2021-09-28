<?php

namespace App;

use stdClass;

class Router
{
    static $config = [
        'namespace' => 'App\controllers\\',
        'controller' => 'Pages',
        'jsconfig' => ['url' => ['home' => 'http://127.0.0.1/pingCounter/']],
    ];

    /**
     * Automatic routing
     */
    function __construct()
    {
        $this->prepare();
        $this->apiRoutage();
        $this->routage();
    }

    /**
     * Prepare routage
     */
    function prepare()
    {
        $this->route = explode('/', $_SERVER['PATH_INFO'] ?? '/');
        array_shift($this->route);
    }

    /**
     * Api Routage
     */
    function apiRoutage()
    {
        if ('api' !== $this->route[0]) {
            header('Content-Type:text/html');
            $file = file_get_contents('App/assets/html/index.html');
            $config = new stdClass;
            if (is_array(self::$config['jsconfig']))
                foreach (self::$config['jsconfig'] as $key => $value)
                    $config->$key = $value;
            $config = json_encode($config, JSON_PRETTY_PRINT);
            echo str_replace('//php-config', 'var config = ' . $config . ';', $file);
            exit;
        } else {
            array_shift($this->route);
        }
    }

    /**
     * Main routage 
     */
    function routage()
    {
        $controller = self::$config['namespace'] . (!empty($this->route[0]) ? $this->route[0] : self::$config['controller']);
        $method = ($route[1] ?? 'default');
        if (class_exists($controller, true)) {
            if (method_exists($controller, $method)) {
                $controller::$method($this->route);
            }
        }
    }
}
