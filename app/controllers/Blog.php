<?php
    class Blog extends Controller {
        public function index() {

            $article = $this->model('BlogModel');

            if(isset($_POST['id']))
                $data = $article->getOneArticle($_POST['id']);

            $this->view('blog/index', $data);
        }
    }