<?php
    class User extends Controller {

        public function reg() {

            $data = [];
            if(isset($_POST['name'])) {
                $user = $this->model('UserModel');
                $user->setData($_POST['name'], $_POST['tel'], $_POST['email'], $_POST['password'], $_POST['re_password']);

                $isValid = $user->validForm();
                if($isValid == "Верно")
                    $user->addUser();
                else
                    $data['message'] = $isValid;
            }

            $this->view('user/reg', $data);
        }

        public function dashboard() {

            $user = $this->model('UserModel');

            if (isset($_POST['exit_btn'])) {
                $user->logOut();
                exit();
            }

            $data['user'] = $user->getUser();

            $this->view('user/dashboard', $data);
        }

        public function auth() {

            $data = [];
            if(isset($_POST['email'])) {
                $user = $this->model('UserModel');
                $data['message'] = $user->auth($_POST['email'], $_POST['password']);
            }
            
            $this->view('user/auth', $data);
        }
    }