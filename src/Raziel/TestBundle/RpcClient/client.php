<?php

include('IXR_Library.php');

$url_conexion = 'https://www.mensajerianegocios.movistar.es/SrvConexion';
$login = 'B902CCDB-RAUL.MADR';
$password = 'M1gr4c10nUpt1v4.';
$client = new IXR_Client($url_conexion);
//$client = new IXR_Client('https://www.mensajerianegocios.movistar.es/SrvConexion');
//Ejecuta el metodo rpc
//$client->query('MensajeriaNegocios.enviarAGrupoContacto', $login, $password, $grupoenvio, 'SMS de PRUEBA', $remite);
//$client->query('MensajeriaNegocios.enviarSMS', $login, $password, array('602814043', 'SMS de PRUEBA', 'gambess'));
//echo '<pre>';
//print_r($client);
//echo '</pre>';
$client->query('MensajeriaNegocios.enviarSMS', $login, $password, array(array('602814043', 'SMS de PRUEBA 1', 'Raziel'), array('602814043', 'SMS de PRUEBA 2', 'RazielValle')));
echo '<pre>', htmlentities($client), '</pre>';


//Mensaje a grupo
//$client->query ('MensajeriaNegocios.enviarAGrupoContacto', $login, $password, 'RAZ', 'Mensaje a grupo', $remite);

echo '<pre>';
print_r($client->getResponse());
echo '</pre>';

