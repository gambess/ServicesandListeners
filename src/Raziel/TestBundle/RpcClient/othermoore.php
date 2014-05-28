<?php

/**
 * CLiente Simple XML-RPC
 */
class RpcClient
{
    private $_methods;
    private $_context;
    private $_url;

    function __construct($url)
    {
        $this->_url = $url;
        $this->registerMethod("MensajeriaNegocios_enviarSMS");
        $this->registerMethod("MensajeriaNegocios_enviarAGrupoContacto");
        $this->registerMethod("MensajeriaNegocios_agregarGrupoContactos");
        $this->registerMethod("MensajeriaNegocios_agregarContactoaGrupoContactos");
        $this->registerMethod("MensajeriaNegocios_obtenerNumeroContactosdeGrupoContactos");
    }

    function __call($methodName, $params)
    {
        if (array_key_exists($methodName, $this->_methods))
        {
            $m = str_replace('_', '.', $methodName);
            $r = xmlrpc_encode_request($m, $params, array('encoding' => 'ISO-8859-15'));
            echo '<pre>', htmlentities($r), '</pre>';
            $this->_context = stream_context_create(array(
                'http' => array(
                    'method' => 'POST',
                    'header' => "Content-Type: text/xml\r\n" .
                                "Content-length: ".strlen($r),
                )));
            $c = $this->_context;
            stream_context_set_option($c, 'http', 'content', $r);
            $f = file_get_contents($this->_url, false, $c);
            echo '<pre>', htmlentities($f), '</pre>';
            $resp = xmlrpc_decode($f);
            return $resp;
        }
        else
        {
            call_user_method_array($methodName, $this, $params);
        }
    }

    private function registerMethod($method)
    {
        $this->_methods[$method] = true;
    }

}

$login = 'B902CCDB-RAUL.MADR';
$password = 'M1gr4c10nUpt1v4.';
$host='https://www.mensajerianegocios.movistar.es/SrvConexion';
$client = new RpcClient($host);
$respuesta = $client->__call("MensajeriaNegocios_enviarSMS", array ( $login, $password, array(array('602814043', 'SMS de PRUEBA 1', 'Raziel'), array('602814043', 'SMS de PRUEBA 2', 'RazielValle'))));
print_r($respuesta);
