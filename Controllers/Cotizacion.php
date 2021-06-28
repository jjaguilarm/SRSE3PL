<?php
require_once('Pais.php');
require_once('../Libraries/nusoap/lib/nusoap.php');

class Cotizacion extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function cotizacion()
    {
        $data['pageId'] = '4';
        $data['pageTag'] = 'Cotizacion';
        $data['pageTitle'] = 'Cotiza tu envío';
        $data['pageName'] = 'Cotizacion';
        $data['pageFunctions'] = '/js/funcionesCotizacion.js';
        $this->views->getView($this, 'cotizacion', $data);
    }

    public function cotiza()
    {
        // if ($_POST) {
        //     $zip1 = cleanStr($_POST['input-zip1']);
        //     $type = "";
        //     $zip2 = "";
        //     $country = "";
        //     $weight = cleanStr($_POST['input-weight']);
        //     $large = cleanStr($_POST['input-large']);
        //     $width = cleanStr($_POST['input-width']);
        //     $height = cleanStr($_POST['input-height']);
            
        //     $errors = array();

        //     // Validaciones
        //     // if (empty($zip1)) {
                
        //     // }
        //     // if ($type == 'local')
        //     //     $zip2 = cleanStr($_POST['input-zip2']);
        //     // else 
        //     //     $country = cleanStr(($_POST['input-country']));
        // }
        dep($_POST);
    }
}
