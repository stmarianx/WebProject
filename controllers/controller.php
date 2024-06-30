<?php

namespace controllers;
require_once '../controllers/UserController.php';
require_once '../models/UserModel.php';
require_once '../views/UserView.php';

abstract class Controller
{
    protected $model;
    protected $view;

    public function __construct()
    {
        $numeModel = str_replace("Controller", "Model", get_class($this));
        $this->model = new $numeModel;
        $numeView = str_replace("Controller", "View", get_class($this));
        $this->view = new $numeView;
    }
}