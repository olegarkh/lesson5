<?php

class AdminController
              extends NewsController
{
    public $cont = 'Admin';
    public $inform = 'Добавить новость';
    public $edit = 'Редактировать';
    public $del = 'Удалить новость';

    public function actionNew()
    {
        $view = new View;
        $view->ctrl = $this->cont;
        $view->act = 'Add';

        $view->display('/../admin/editor.php');
    }
    public function actionEdit()
    {
        $id = $_GET['id'];

        $item = NewsModel::findOneByPk($id);
        $view = new View;

        $view->item = $item;
        $view->ctrl = $this->cont;
        $view->act = 'Save';

        $view->display('/../admin/editor.php');
    }
    public function actionSave()
    {
        $news = new NewsModel;

        $news->id = $_GET['id'];
        $news->title = $_POST['title'];
        $news->text = $_POST['text'];

        $news->update($_GET['id']);
        $this->actionEdit();
    }

    public function actionAdd()
    {
        $news = new NewsModel;

        $news->title = $_POST['title'];
        $news->text = $_POST['text'];
        $view = new View;
        $item = $news->insert();

        $view->item = $item;
        $view->cont = $this->cont;
        $view->act = 'Save';

        $view->display('/../admin/editor.php');
    }

    public function actionDel()
    {
       $news = new NewsModel;
       $id = $_GET['id'];
       $news->delete($id);
       $this->actionAll();
    }
}