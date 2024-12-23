<?php
    class Categories extends Controller {

        public function cream() {
            $products = $this->model('ProductsModel');
            $data = ['products' => $products->getProductsCategory('cream'), 'title' => 'Крема'];
            $this->view('categories/index', $data);
        }

        public function massager() {
            $products = $this->model('ProductsModel');
            $data = ['products' => $products->getProductsCategory('massager'), 'title' => 'Массажеры'];
            $this->view('categories/index', $data);
        }

        public function eyelids() {
            $products = $this->model('ProductsModel');
            $data = ['products' => $products->getProductsCategory('eyelids'), 'title' => 'Продукция для век'];
            $this->view('categories/index', $data);
        }

        public function washing() {
            $products = $this->model('ProductsModel');
            $data = ['products' => $products->getProductsCategory('washing'), 'title' => 'Средства для умывания'];
            $this->view('categories/index', $data);
        }

        public function serum() {
            $products = $this->model('ProductsModel');
            $data = ['products' => $products->getProductsCategory('serum'), 'title' => 'Сыворотки'];
            $this->view('categories/index', $data);
        }

        public function tonic() {
            $products = $this->model('ProductsModel');
            $data = ['products' => $products->getProductsCategory('tonic'), 'title' => 'Тоники'];
            $this->view('categories/index', $data);
        }

    }