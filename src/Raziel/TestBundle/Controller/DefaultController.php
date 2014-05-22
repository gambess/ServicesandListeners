<?php

namespace Raziel\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Seven\RpcBundle\XmlRpc\Client;

class DefaultController extends Controller
{

    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        $login = "B902CCDB-RAUL.MADR";
        $pass = "M1gr4c10nUpt1v4.";
        $remitente = "217812";
        $grupoenvio = "RAZ";
        $method = "MensajeriaNegocios.enviarAGrupoContacto";
        /*
          $params = array(
          $login,
          $pass,
          array(
          array(
          '602814043',
          'SMS de Prueba',
          'gambess:P'
          ),
          array(
          '602814043',
          'SMS de Prueba 2',
          'RazielValleM;'
          )
          ),
          );
         */
        $params = array(
            array(
                '602814043',
                'SMS de Prueba',
                'gambess:P'
            ),
            array(
                '602814043',
                'SMS de Prueba 2',
                'RazielValleM;'
            )
        );

        $client = new Client("https://www.mensajerianegocios.movistar.es/SrvConexion");

//        $client->call('MensajeriaNegocios.enviarAGrupoContacto', array($login, $pass, $grupoenvio, 'Texto de Prueba', $remitente));
       $r = $client->call('MensajeriaNegocios.enviarSMS', $login, $pass, $params);
//        $r = $client->call('MensajeriaNegocios.enviarSMS', $params);

        return array('name' => $this->get('request')->getClientIp(), 'response client' => $r->getResponse());
    }

}
