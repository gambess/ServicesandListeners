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
    private $logger;
    private $sms_service;
    private $estados = array();
    private $prioridades = array();

    /**
     * Creates a incidenciaListener.
     *
     * @param $logger
     */
    public function __construct($logger, $sms_service)
    {
        $this->logger = $logger;
        $this->sms_service = $sms_service;
    }

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
        $this->logger->info('Inserción o Actualización capturada');
    }

    public function setPrioridades($estados)
    {
      
            $this->estados = $estados;
    }

    public function setEstados($prioridades)
    {
        $this->prioridades = $prioridades;
    }

}
