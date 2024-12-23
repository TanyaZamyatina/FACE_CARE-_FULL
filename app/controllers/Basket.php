<?php
    class Basket extends Controller {
        public function index() {

            $data = [];
            $cart = $this->model('BasketModel');
            
            if(isset($_POST['item_id']))
                $cart->addToCart($_POST['item_id']);

            if(!$cart->isSetSession())
                $data['empty'] = 'В вашей корзине пока нет товаров';
            else {
                $products = $this->model('ProductsModel');
                $data['products'] = $products->getProductsCart($cart->getSession());
            }

            if(isset($_POST['i_id'])) {
                $cart->delFromCart($_POST['i_id']);
                
                if(!$cart->isSetSession())
                    $data['empty'] = 'В вашей корзине пока нет товаров';

                header("Location: basket/index");
                exit();
            }

            if(isset($_POST['items_id'])) {
                $cart->deleteSession();
                header("Location: basket/index");
                exit();
            }

            $this->view('basket/index', $data);
        }
    }