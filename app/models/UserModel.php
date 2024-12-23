<?php
    require 'DB.php';

    class UserModel {
        private $name;
        private $tel;
        private $email;
        private $password;
        private $re_password;

        private $_db = null;

        // Подключение к базе данных.
        public function __construct() {
            $this->_db = DB::getInstence();
        }

        // Устанавливает значения для свойств класса.
        public function setData($name, $tel, $email, $password, $re_password) {
            $this->name = $name;
            $this->tel = $tel;
            $this->email = $email;
            $this->password = $password;
            $this->re_password = $re_password;
        }

        // Проверяет корректность введенных данных.
        public function validForm() {
            if(strlen($this->name) > 100)
                return "Имя должно содержать не более 100 символов";
            else  if(strlen($this->name) < 2)
                return "Имя должно содержать более 2 символов";
            else  if(strlen($this->tel) != 17)
                return "Не верно введен телефон";
            else if(strlen($this->email) < 2)
                return "Email должен содержать более 2 символов";
            else if($this->isEmailExists($this->email))
                return "Пользователь с таким email уже существует";
            else if(strlen($this->password) < 5)
                return "Пароль должен содержать более 5 символов";
            else if($this->password != $this->re_password)
                return "Пароли не совпадают";
            else
                return "Верно";
        }

        // Получает данные пользователя по email из БД и проверяет существования логина
        public function isEmailExists($email) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetchColumn() > 0; // Возвращает true, если email существует
        }

        // Добавляет пользователя в БД.
        public function addUser() {
            $sql = 'INSERT INTO users(name, tel, email, password) VALUES(:name, :tel, :email, :password)';
            $query = $this->_db->prepare($sql);

            $password = password_hash($this->password, PASSWORD_DEFAULT);
            $query->execute(['name' => $this->name, 'tel' => $this->tel, 'email' => $this->email, 'password' => $password]);

            $this->setAuth($this->email);
        }

        // Устанавливает cookie и переадресовывает на кабинет пользователя.
        public function setAuth($email) {
            setcookie('email', $email, time() + 3600, '/');
            header('Location: /user/dashboard');
        }

        // Получает данные пользователя по email из БД.
        public function getUser() {
            $email = $_COOKIE['email'];
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        // Выход из аккаунта.
        public function logOut() {
            setcookie('email', $this->email, time() - 3600, '/');
            unset($_COOKIE['email']);
            header('Location: /user/auth');
        }

        // Авторизация пользователя.
        public function auth($email, $password) {
            $result = $this->_db->query("SELECT * FROM `users` WHERE `email` = '$email'");
            $user = $result->fetch(PDO::FETCH_ASSOC);

            if($user['email'] == '')
                return 'Пользователя с таким email не существует';
            else if(password_verify($password, $user['password']))
                $this->setAuth($email);
            else
                return 'Пароли не совпадают';
        }    
    }