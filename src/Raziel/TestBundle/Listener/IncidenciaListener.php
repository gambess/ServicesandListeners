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
    public function launchTrigger(Incidencia $incidencia, LifecycleEventArgs $event)
    {
        $inci = $event->getObject();
        if(null === $inci->getFechaInsercion()){
            $inci->setFechaInsercion(new \DateTime(date('Y-m-d H:m:s')));
        }
        $inci->setFechaLectura(new \DateTime(date('Y-m-d H:m:s')));
        $em = $event->getEntityManager();
        $this->sendMail($incidencia);
        $inci->setFechaEnvio(new \DateTime(date('Y-m-d H:m:s')));

        
    }

    public function createMail($texto)
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('Sending TICKET STATES')
            ->setFrom('raziel.valle@fractaliasoftware.com')
            ->setTo('raziel.valle@fractaliasoftware.com')
            ->setBody( 'start-message: ' . $texto . ' ' . 'end-message' );

        return $message;
    }

    public function sendMail(Incidencia $incidencia)
    {
        $format = 'Y-m-d H:i:s';
        $insert = $incidencia->getFechaInsercion();
        $texto = 'Estado del Ticket: ' .$incidencia->getEstado() . '<br /> Fecha (Completa) de Inserción: ' . $insert->format($format);
        $this->mail_service->send($this->createMail((string)$texto));
        
    }

}
