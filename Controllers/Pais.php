<?php
class Pais extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPaisesAsc() 
    {
        return $this->model->getPaisesAsc();
    }
}
