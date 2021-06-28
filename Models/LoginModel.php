<?php
class LoginModel extends CRUD
{
    private $email;
    private $password;

    public function __construct()
    {
        parent::__construct();
    }

    public function iniciaSesion(string $email, string $password)
    {
        $return = "";
        $this->email = $email;
        $this->password = $password;

        $sql = "SELECT * FROM cliente_c WHERE correo_contacto = '{$this->email}'";
        $request = $this->select($sql);
        return $request;
    }
}
