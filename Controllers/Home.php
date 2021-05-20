<?php
class Home extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function home()
    {
        $data["pageId"] = "1";
        $data["pageTag"] = "Home";
        $data["pageTitle"] = "Página principal";
        $data["pageName"] = "Home";
        $data["pageContent"] = "Lorem ipsum";
        $this->views->getView($this, "home", $data);
    }
    /*
    public function insertar()
    {
        $data = $this->model->setUser("Alberto", "25");
        print_r($data);
    }
    */
}
