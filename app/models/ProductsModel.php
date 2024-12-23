<?php
    if (!class_exists('DB')) {
        require 'DB.php';
    }

    class ProductsModel {
        private $_db = null;

        // Подключение к базе данных.
        public function __construct() {
            $this->_db = DB::getInstence();
        }

        // Получение продуктов определенной категории из таблицы products.
        public function getProductsCategory($category) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `category` = '$category' ORDER BY `id` DESC");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Получение одного продукта по его id из таблицы products.
        public function getOneProduct($id) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` = '$id'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // Получение продуктов, на которые есть скидка, из таблицы products.
        public function getSaleProducts() {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `sale` != ''");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        // Получение продуктов из корзины из таблицы products.
        public function getProductsCart($items) {
            $result = $this->_db->query("SELECT * FROM `products` WHERE `id` IN ($items)");
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }