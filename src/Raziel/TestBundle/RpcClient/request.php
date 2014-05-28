<?php

function do_call($url, $request)
{

    $header[] = "Content-type: text/xml";
    $header[] = "Content-length: " . strlen($request);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $data = curl_exec($ch);
    if (curl_errno($ch))
    {
        print curl_error($ch);
    }
    else
    {
        curl_close($ch);
        return $data;
    }
}

$host='https://www.mensajerianegocios.movistar.es/SrvConexion';

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

$request = xmlrpc_encode_request('MensajeriaNegocios.enviarSMS', $params, array('encoding'=>'ISO-8859-15'));
$isorequest = html_entity_decode(htmlentities($request, ENT_QUOTES, 'ISO-8859-1'), ENT_QUOTES , 'ISO-8859-15');
iconv("ISO-8859-1", "ISO-8859-15", $request);
echo '<pre>', htmlentities($isorequest), '</pre>';

$response = do_call($host, $isorequest);

echo '<pre>', htmlentities($response), '</pre>';
//print_r($isorequest);
//print_r($response);
echo $response;
