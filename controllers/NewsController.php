<?php


class NewsController
{
    public $cont = 'News';

    public function actionAll()
    {
        $article = new NewsModel();

        $items = $article->findAll();

        $view = new View;

        $view->items = $items;
        $view->ctrl = $this->cont;

        $view->act = 'One';
        $view->inf = $this->inform;
        $view->edit = $this->edit;

        $view->display('all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];

        $article = new NewsModel();
        $item = $article->findOneByPk($id);
        $view = new View($item);

        $view->item = $item;
        $view->ctrl = $this->cont;
        $view->del = $this->del;

        $view->display('one.php');
    }

}
