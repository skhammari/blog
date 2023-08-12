<?php

    namespace App\Controller;

    use App\Core\View;
    use App\Model\Article;
    use App\Model\User;

    class BlogController
    {
        public function index(): string
        {
            $articles = Article::getAll();

            return View::make('index', [
                'articles' => $articles
            ])->render();
        }

        public function show(): string
        {
            $articleId = $_GET['id'];
            $article = Article::find($articleId);

            return View::make('articles/single', [
                'article' => $article
            ])->render();
        }

        public function create(): string
        {
            return View::make('articles/create')->render();
        }

        public function store()
        {
            $article = new Article();
            $article->create(1, $_POST['title'], $_POST['body']);

            return $this->index();
        }
    }