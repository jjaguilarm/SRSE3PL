<?php
class Registro extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registro()
    {
        $data['pageId'] = "2";
        $data['pageTag'] = "Registro";
        $data['pageTitle'] = "Pantalla de registro";
        $data['pageName'] = "Registro";
        $data['pageFunctions'] = "/js/funcionesRegistro.js";
        $this->views->getView($this, "registro", $data);
    }

    public function registraCliente()
    {
        if ($_POST) {
            $name = cleanStr($_POST['input-name']);
            $email = cleanStr($_POST['input-email']);
            $pass = cleanStr($_POST['input-pass']);
    
            $errors = array();
            $nameErrors = array();
            $emailErrors = array();
            $passErrors = array();
            
            // Validaciones
            if (empty($name)) {
                $nameErrors['empty'] = "Ingrese su nombre.";
            }
            if (strlen($name) < 3) {
                $nameErrors['short'] = "El nombre debe tener 3 o más letras.";
            }
            if (!preg_match('/^[A-záéíóúñÁÈÍÓÚÑ\s]+$/i', $name)) {
                $nameErrors['invalid'] = "El nombre sólo puede tener letras y espacios en blanco.";
            }
            if (empty($email)) {
                $emailErrors['empty'] = "Ingrese su correo electrónico.";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErrors['invalid'] = "Ingrese un correo electrónico válido.";
            }
            if (empty($pass)) {
                $passErrors['empty'] = "Ingrese su contrasaeña.";
            }
            if (strlen($pass) < 6) {
                $passErrors['short'] = "La contraseña debe tener 6 o más caracteres.";
            }
            if (!preg_match('/^[A-záéíóúñÁÈÍÓÚÑ0-9!"#$%&\'()*+,-.\/:;<=>?@[\\]^_`{|}~]+$/i', $pass)) {
                $passErrors['invalid'] = "La contraseña sólo puede tener caracteres alfanuméricos, espacios en blanco, y los siguientes caracteres especiales: !\"#$%&'()*+,-./:;<=>?@[\\]^_`{|}~";
            }
            if (!isset($_POST['captcha']) || !$_POST['captcha'] == "checked")
                $errors['captchaError'] = "Debe aceptar los términos y condiciones.";
    
            if (!empty($nameErrors)) {
                $errors['nameErrors'] = $nameErrors;
            }
            if (!empty($emailErrors)) {
                $errors['emailErrors'] = $emailErrors;
            }
            if (!empty($passErrors)) {
                $errors['passErrors'] = $passErrors;
            }
    
            if (empty($errors)) {
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $token = bin2hex(random_bytes(32));
                $verified = false;
                $request = $this->model->registraCliente($name, $email, $pass, $token, $verified);
                if ($request === "exists") {
                    $emailErrors['exists'] = "Ya existe un cliente con el correo $email";
                    $errors['emailErrors'] = $emailErrors;
                    $arrResponse = array("status" => false, "msg" => "Error con el correo electrónico.", "errors" => $errors);
                } else if ($request > 0) {
                    // Enviar correo de verificación.
                    $to = $email;
                    $subject = "Verificación de cuenta.";
                    $message = "<p>Gracias por registrarse en ARSET. Por favor dé click en el enlace siguiente para verificar su cuenta.</p>" .
                               "<br>" . "<a href='" . baseUrl() . "/verificaRegistro/verifica/$token'>Verificar cuenta.</a>";
                    $headers = "From: ARSET <envios.arset@gmail.com>" . "\r\n";
                    $headers = "Reply-To: noreply@gmail.com>" . "\r\n";
                    $headers .= "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
                    mail($to, $subject, $message, $headers);

                    $arrResponse = array("status" => true, "msg" => "¡Registro finalizado correctamente!");
                } else {
                    $arrResponse = array("status" => false, "msg" => "Registro no finalizado.");
                }
            } else {
                $arrResponse = array("status" => false, "msg" => "Errores al llenar el formato.", "errors" => $errors);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
