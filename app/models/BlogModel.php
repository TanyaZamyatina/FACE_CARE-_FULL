<?php
    if (!class_exists('DB')) {
        require 'DB.php';
    }

    class BlogModel {
        private $_db = null;

        // Подключение к базе данных.
        public function __construct() {
            $this->_db = DB::getInstence();
        }

        // Получение всех статей блога из таблицы blog.
        public function getArticle() {
            $result = $this->_db->query("SELECT * FROM `blog` ORDER BY `id` DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // Получение одной статьи по его идентификатору из таблицы blog.
        public function getOneArticle($id) {
            $result = $this->_db->query("SELECT * FROM `blog` WHERE `id` = '$id'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }