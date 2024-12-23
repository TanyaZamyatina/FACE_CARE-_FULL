<?php
    class App {

        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function __construct() {
            $url = $this->parseUrl();

            // Если URL пустой, используем контроллер Home
            if (empty($url[0])) {
                $this->controller = 'Home';
            } 
            // Проверка существования контроллера
            else if (file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            } 
            // Если контроллер не найден, используем контроллер ErrorController
            else {
                $this->controller = 'ErrorController';
            }

            // Подключаем контроллер
            require_once 'app/controllers/' . $this->controller . '.php';

            // Создаем объект контроллера
            $this->controller = new $this->controller;

            // Проверка существования метода
            if(isset($url[1])) {
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // Создаем массив параметров
            $this->params = $url ? array_values($url) : [];

            // Вызов метода с параметрами
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseUrl() {
            if(isset($_GET['url'])) {
                return explode('/', filter_var(
                    rtrim($_GET['url'], '/'),
                    FILTER_SANITIZE_STRING
                ));
            }
        }
    }