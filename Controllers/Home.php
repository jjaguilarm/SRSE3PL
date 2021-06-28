<?php
class Home extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
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
}
