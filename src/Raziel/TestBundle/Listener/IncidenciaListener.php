<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IncidenciaListener
 *
 * @author Raziel Valle Miranda <raziel.valle@fractaliasoftware.com>
 */

namespace Raziel\TestBundle\Listener;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Raziel\TestBundle\Entity\Incidencia;

class IncidenciaListener
{
    private $mail_service;
//    private $formatter;
//    private $another_service;

    public function __construct($mailer)
    {
        $this->mail_service = $mailer;
    }

    /**
     * Trigger para capturar las inserciones
     *
     * @param Incidencia $incidencia
     * @param LifecycleEventArgs $event
     * @ORM\PostPersist
     */
//    public function postPersist(Incidencia $incidencia, LifecycleEventArgs $event)
//    {
//        $this->sendMail($incidencia);
//    }
   
    /**
     * Trigger para capturar las actualizaciones
     *
     * @param Incidencia $incidencia
     * @param LifecycleEventArgs $event
     * @ORM\PostPersist
     */
//    public function postUpdate(Incidencia $incidencia, LifecycleEventArgs $event)
//    {
//        $this->sendMail($incidencia);
//    }
    
    /**
     * Trigger para capturar las inserciones y actualizaciones
     *
     * @param Incidencia $incidencia
     * @param LifecycleEventArgs $event
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function postFlush(Incidencia $incidencia, LifecycleEventArgs $event)
    {
        $this->sendMail($incidencia);
    }

    public function createMail($texto)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Sending TICKET STATES')
            ->setFrom('raziel.valle@fractaliasoftware.com')
            ->setTo('raziel.valle@fractaliasoftware.com')
            ->setBody( 'start-message: <br>' . $texto . '<br>' . 'end-message' );

        return $message;
    }

    public function sendMail(Incidencia $incidencia)
    {
        $format = 'Y-m-d H:i:s';
        $fecha = new \DateTime();
        $incidencia->setFechaLectura($fecha->format($format));
        $envio = new \DateTime();
        $incidencia->setFechaEnvio($envio->format($format));
        $texto = 'Estado del Ticket: ' .$incidencia->getEstado() . '<br /> Fecha (Completa) de Envio: ' .$incidencia->getFechaEnvio();
        $this->mail_service->send($this->createMail((string)$texto));
        
    }

}
