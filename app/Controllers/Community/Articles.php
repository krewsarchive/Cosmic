<?php
namespace App\Controllers\Community;

class Articles extends \App\Controllers\Application
{
    public function __construct()
    {
        parent::__construct();
        $this->articlesModel = model('ArticlesModel');
        $this->userModel = model('UserModel');
    }

    public function item($id)
    {
        $article = $this->articlesModel->find($id);
      
        if(is_null($article)) {
            return redirect()->to('/');
        }
      
        $article->author = $this->userModel->getUserById($article->id, 'username,look');
        $getArticles = $this->articlesModel->orderBy('id', 'desc')->findAll(getenv('meteor.limit.news'));

        return $this->render('community/article', ['allArticles' => $getArticles, 'item' => $article]);
    }
  
    public function view()
    {
        $this->item($this->articlesModel->first()->id);
    }
}
