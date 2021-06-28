<?php
class Login extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function login()
    {
        $data['pageId'] = "4";
        $data['pageTag'] = "Login";
        $data['pageTitle'] = "Inicia sesión";
        $data['pageName'] = "Login";
        $data['pageFunctions'] = "/js/funcionesLogin.js";
        $this->views->getView($this, "login", $data);
    }

    public function iniciaSesion()
    {
        if ($_POST) {
            $email = cleanStr($_POST['input-email']);
            $pass = cleanStr($_POST['input-pass']);
    
            $errors = array();
            $emailErrors = array();
            $passErrors = array();
            
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
    
            if (!empty($emailErrors)) {
                $errors['emailErrors'] = $emailErrors;
            }
            if (!empty($passErrors)) {
                $errors['passErrors'] = $passErrors;
            }
    
            if (empty($errors)) {
                $request = $this->model->iniciaSesion($email, $pass);
                if (empty($request)) {
                    $emailErrors['notFound'] = "No existe una cuenta con el correo $email <br> Por favor regístrese para iniciar sesión.";
                    $errors['emailErrors'] = $emailErrors;
                    $arrResponse = array("status" => false, "msg" => "No existe la cuenta.", "errors" => $errors);
                } else if (!password_verify($pass, $request['password'])) {
                    $passErrors['incorrect'] = "La contraseña es incorrecta.";
                    $errors['passErrors'] = $passErrors;
                    $arrResponse = array("status" => false, "msg" => "Error con la contraseña.", "errors" => $errors);
                } else if (!$request['verificado']) {
                    $errors['notVerified'] = "Su cuenta no ha sido verificada.\nPor favor verifique su cuenta accediendo al correo que le enviamos.";
                    $arrResponse = array("status" => false, "msg" => "Cuenta no verificada.", "errors" => $errors);
                } else if ($request['verificado']) {
                    // Iniciar sesión.
                    $_SESSION['username'] = $request['nombre_cliente'];
                    $_SESSION['email'] = $request['correo_contacto'];
                    $_SESSION['verified'] = $request['verificado'];

                    $arrResponse = array("status" => true, "msg" => "¡Inicio de sesión finalizado correctamente!");
                } else
                    $arrResponse = array('status' => false, 'msg' => "Error en la base de datos.");
            } else
                $arrResponse = array("status" => false, "msg" => "Errores al llenar el formato.", "errors" => $errors);
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
