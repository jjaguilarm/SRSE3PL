<?php
class VerificaRegistroModel extends CRUD
{
    private $token;

    public function __construct()
    {
        parent::__construct();
    }

    public function verificaCliente($token)
    {
        $this->token = $token;

        $query = "SELECT * FROM cliente_c WHERE token = '{$this->token}'";
        $request = $this->selectAll($query);

        if (!empty($request)) {
            if (!$request['verificado']) {
                $query = "UPDATE cliente_c SET verificado = ? WHERE token = ?";
                $data = array(1, $this->token);
                $request = $this->update($query, $data);
                return $request;
            }
            return true;
        }
        return false;
    }
}