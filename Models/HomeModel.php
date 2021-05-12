<?php
class HomeModel extends CRUD
{
    public function __construct()
    {
        parent::__construct();
    }
    /*
    public function setUser(string $nombre, string $edad)
    {
        $query = "insert into cliente_c(nombre_cliente, contacto_cliente) values(?, ?)";
        $arrData = array($nombre, $edad);
        $request = $this->insert($query, $arrData);
        return $request;
    }
    */
}