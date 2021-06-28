<?php
class PaisModel extends CRUD
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPaisesAsc()
    {
        $query = "SELECT * FROM `pais` WHERE 1 ORDER BY `value` ASC";
        return $this->selectAll($query);
    }
}
