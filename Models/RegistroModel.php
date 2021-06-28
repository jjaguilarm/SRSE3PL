<?php
class RegistroModel extends CRUD
{
    private $nombre;
    private $email;
    private $password;
    private $token;
    private $verificado;

    public function __construct()
    {
        parent::__construct();
    }

    public function registraCliente(string $nombre, string $email, string $password, string $token, bool $verificado)
    {
        $return = "";
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->token = $token;
        $this->verificado = $verificado;

        $sql = "SELECT * FROM cliente_c WHERE correo_contacto = '{$this->email}'";
        $request = $this->selectAll($sql);

        if (empty($request)) {
            $query = "INSERT INTO cliente_c(nombre_cliente, correo_contacto, password, token, verificado) VALUES(?, ?, ?, ?, ?)";
            $data = array($this->nombre, $this->email, $this->password, $this->token, $this->verificado);
            $insReq = $this->insert($query, $data);
            $return = $insReq;
        } else {
            $return = "exists";
        }
        return $return;
    }
}