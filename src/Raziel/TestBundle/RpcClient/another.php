<?php

$login = 'B902CCDB-RAUL.MADR';
$password = 'M1gr4c10nUpt1v4.';
$params = array(
    $login,
    $password,
    array(
        array(
            '602814043', 'SMS de PRUEBA 1', 'Raziel'
        ),
        array(
            '602814043', 'SMS de PRUEBA 2', 'RazielValle'
        )
    )
);
$request = xmlrpc_encode_request("MensajeriaNegocios.enviarSMS", $params, array('encoding'=>'ISO-8859-15'));
$context = stream_context_create(array('http' => array(
    'method' => "POST",
    'header' => "Content-Type: text/xml",
    'content' => $request
)));

//print_r($request);
echo '<pre>', htmlentities($request), '</pre>';

$file = file_get_contents("https://www.mensajerianegocios.movistar.es/SrvConexion", false, $context);

echo '<pre>', htmlentities($file), '</pre>';

$response = xmlrpc_decode($file);

if ($response && xmlrpc_is_fault($response)) {
    trigger_error("xmlrpc: $response[faultString] ($response[faultCode])");
} else {
    print_r($response);
}
