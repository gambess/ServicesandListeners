<?php

namespace Raziel\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Seven\RpcBundle\XmlRpc\Client;
use Seven\RpcBundle\XmlRpc\Server;

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

    /**
     * @Route("/xmlrpc-server")
     * @Template()
     */
    public function xmlrpcAction()
    {
        // Create XML-RPC Server
        $server = new Server();

        // Add handlers
        $server->addHandler('sms', 'Raziel\TestBundle\Util\MensajeriaNegocios');

        // Handler request and return response
        return $server->handle($this->getRequest());
    }

    /**
     * @Route("/cliente-xmlrpc")
     * @Template()
     */
    public function clientAction()
    {
        $client = new Client("http://localhost/syFwk/web/app_dev.php/xmlrpc-server");
//        $params = array('B902CCDB-RAUL.MADR', 'Nivel1', array('602814043', 'Texto de Prueba 1', 'Raziel'));
//        echo $client->call('sms.info', array('Raziel')); //Llamada que funciona

//        echo $client->call('sms.enviarSMS', 'B902CCDB-RAUL.MADR', 'Nivel1','602814043', 'Texto de Prueba 1', 'Raziel');
        echo $client->call('sms.enviarSMS', array('B902CCDB-RAUL.MADR', 'Nivel1'));
//        echo $client->call('sms.info', array('Raziel'));
//        echo $client->call('calc.add', array(1, 2)); // echo -1
//        echo $client->call('calc.sub', array(2, 3)); // echo -1
    }

}
