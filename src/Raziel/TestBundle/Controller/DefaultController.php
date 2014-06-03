<?php

namespace Raziel\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Seven\RpcBundle\XmlRpc\Client;
use Seven\RpcBundle\XmlRpc\Server;
use Raziel\TestBundle\RpcClient\RpcClient;

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

        $params = $this->container->getParameter('raziel.envio_sms.api');
        $methodName = "MensajeriaNegocios_enviarAGrupoContacto";
        $destinos = $this->container->getParameter('raziel.envio_sms.grupo_destino');
        $destino = array_shift($destinos);
        
        $paramsToSend = array(
            $params['apiuser'],
            $params['apipass'],
            $destino['destinatario'],
            'Mensaje de Texto a traves de symfony',
            $params['remitente']
            
        );
//        print_r($paramsToSend);die;
        $cliente = new RpcClient($params['url']);
        $response = $cliente->makeCall($methodName, $paramsToSend);
        return new Response($response);
    }
    /**
     * @Route("/config")
     * @Template()
     */
    function configAction()
    {
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.api'),true).'</pre>';
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.servicio'), true).'</pre>';
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.grupo_destino'), true).'</pre>';
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.numero_destino'), true).'</pre>';
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.prioridad'), true).'</pre>';
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.estado'), true).'</pre>';
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.nombres_cortos'), true).'</pre>';
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.traduccion_tipo_caso'), true).'</pre>';
        echo '<pre>'.print_r($this->container->getParameter('raziel.envio_sms.tsol_guardia'), true).'</pre>';
        
        $destinos["MensajeriaNegocios_enviarAGrupoContacto"] = $this->container->getParameter('raziel.envio_sms.grupo_destino');
        $destinos["MensajeriaNegocios_enviarSMS"] = $this->container->getParameter('raziel.envio_sms.numero_destino');
        echo "<pre>";
        print_r($destinos); echo "</pre>";

        
//        foreach ($conf['api'] as $key => $value)
//        {
//            echo 'key: '.$key . 'value: ' .$value;
//        }
        
        return new Response('1');
    }

}
