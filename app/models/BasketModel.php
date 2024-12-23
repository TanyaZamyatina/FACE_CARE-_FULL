<?php
    session_start();
    class BasketModel {
        private $session_name = 'cart'; // Имя сессии, используемое для хранения корзины

        // Проверяет, установлена ли сессия для корзины.
        public function isSetSession() {
            return isset($_SESSION[$this->session_name]);
        }

        // Удаляет сессию корзины.
        public function deleteSession() {
            unset($_SESSION[$this->session_name]);
        }

        // Возвращает содержимое сессии корзины.
        public function getSession() {
            return $_SESSION[$this->session_name];
        }

        // Добавляет товар в корзину по его ID.
        public function addToCart($itemID) {
            if(!$this->isSetSession())
                $_SESSION[$this->session_name] = $itemID; // Если сессии нет, то создаем ее с itemID
            else {
                $items = explode(",", $_SESSION[$this->session_name]); // Разделяем товары на массив

                $itemExist = false;
                foreach ($items as $el) {
                    if($el == $itemID)
                        $itemExist = true;  // Проверяем, существует ли уже товар в корзине 
                }

                if(!$itemExist)
                    $_SESSION[$this->session_name] = $_SESSION[$this->session_name].','.$itemID; // Если не существует, добавляем его
            }
        }

        // Удаляет товар из корзины по его ID.
        public function delFromCart($itemID) {
            if($this->isSetSession()) {
                $items = explode(",", $_SESSION[$this->session_name]); // Разделяем товары на массив   

                // Проверяем, существует ли товар в корзине
                if (($key = array_search($itemID, $items)) !== false) { // Функция array_search ищет значение $itemID в массиве $items
                    unset($items[$key]); // Удаляем товар из массива
                }

                // Если массив пустой, удаляем сессию
                if (empty($items)) {
                    $this->deleteSession(); 
                } else {
                    $_SESSION[$this->session_name] = implode(',', $items); // Обновляем сессию с новыми данными
                }
            }
        }

        // Подсчитывает количество товаров в корзине
        public function countItems() {
            if(!$this->isSetSession())
                return 0; // Если корзина пустая, возвращаем 0
            else {
                $items = explode(",", $_SESSION[$this->session_name]); // Разделяем товары на массив
                return count($items); // Возвращаем количество товаров
            }
        }
    }