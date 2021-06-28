<?php
class VerificaRegistro extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function verificaRegistro()
    {
        $data["pageId"] = "3";
        $data["pageTag"] = "VerificaRegistro";
        $data["pageTitle"] = "Verifica tu registro";
        $data["pageName"] = "VerificaRegistro";
        if (!empty($_GET['verificado']))
            $data['pageMsg'] = "Su cuenta ha sido verificada. <br> Puede cerrar esta página e iniciar sesión.";
        else
            $data['pageMsg'] = "Le hemos enviado un correo de verificación. <br> Por favor verifique su registro.";
        $this->views->getView($this, "verificaRegistro", $data);
    }

    public function verifica($token)
    {
        if ($this->model->verificaCliente($token)) {
            header('Location: ' . baseUrl() . '/verificaRegistro?verificado=1');
        } else
            echo "La cuenta es inválida o ya ha sido verificada.";
    }
}
