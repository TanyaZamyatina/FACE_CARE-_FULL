<?php
    class Home extends Controller {

        public function index() {

            $article = $this->model('BlogModel');
            $sale = $this->model('ProductsModel');
        
            $data = [
                'article' => $article->getArticle(),
                'sale' => $sale->getSaleProducts()
            ];
        
            $this->view('home/index', $data);
        }
    }