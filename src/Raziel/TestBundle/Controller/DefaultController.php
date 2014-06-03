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
        
    }

    /**
     * @Route("/xmlrpc-server")
     * @Template()
     */
    public function xmlrpcAction()
    {

    }

    /**
     * @Route("/cliente-xmlrpc")
     * @Template()
     */
    public function clientAction()
    {

    }
    /**
     * @Route("/config")
     * @Template()
     */
    function configAction()
    {

    }

}
