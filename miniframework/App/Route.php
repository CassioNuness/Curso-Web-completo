<?php

    namespace App;

    class Route
    {
        public function initRoutes()
        {
            $routes['home'] = array(
                'route' => '/',
                'controller' => 'indexController',
                'action' => 'index'
            );
            
            $routes['sobre_nos'] = array(
                'route' => '/sobre-nos',
                'controller' => 'sobreController',
                'action' => 'nos'
            );
            
            return $routes;
        }

        public function getUrl()
        {
            return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        }
    }

?>