<?php

namespace app\controllers;
use app\core\Controller;
use app\lib\Pagination;

Class NewsController extends Controller
{

    public function indexAction()
    {

        $pagination = new Pagination($this->route,$this->model->postsCount(),1);
        $vars = [
          'pagination'=>$pagination->get(),
          'news'=>$this->model->postsList($this->route)
        ];
        $this->view->render($vars);

    }

    public function showAction()
    {
        $result = $this->model->showPost($this->route['id']);
        $vars = [
            'post'=>$result,
        ];
        $this->view->render($vars);
    }

    public function updateAction()
    {
        $filename= $this->uploadFile($_FILES['image']);
        $result = $this->model->updatePost($this->route['id'], $_POST,$filename);
        header('Location: http://news/all/'.$this->route['id']);

    }



    public function uploadFile($image)
    {
        $extenshion = pathinfo($image['name'], PATHINFO_EXTENSION);
        if($extenshion === ""){
            return null;
        }
        $filename = uniqid() . "." . $extenshion;
        move_uploaded_file($image['tmp_name'], "app/uploads/" . $filename);
        return $filename;
    }

    public function addAction()
    {
        $filename= $this->uploadFile($_FILES['image']);
        $result = $this->model->addPost($_POST, $filename);
        header('Location: http://news/news/index/1');
    }

    public function deleteAction()
    {
        $result = $this->model->deletePost($this->route['id']);

    }



}
