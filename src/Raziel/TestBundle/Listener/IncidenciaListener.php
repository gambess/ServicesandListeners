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
    private $sgsd_services = array();

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
        //capturo el objeto en un insercion o actualizacion Incidencia
        $i = $event->getObject();
        if ($this->filterByPrioridades($i))
        {
            if ($this->filterByEstados($i))
            {
                if ($this->filterBySgsdService($i))
                {
                    $this->logger->info('Inserción o Actualización capturada', $this->sms_service->write());
                }
            }
        }
    }

    public function setPrioridades($estados)
    {

        $this->estados = $estados;
    }

    public function setEstados($prioridades)
    {
        $this->prioridades = $prioridades;
    }

    public function filterByPrioridades(Incidencia $incidencia)
    {
        return in_array($incidencia->getPrioridad(), $this->prioridades);
    }

    public function filterByEstados(Incidencia $incidencia)
    {
        return in_array($incidencia->getEstado(), $this->estados);
    }

    protected function filterBySgsdService(Incidencia $incidencia)
    {

        if (in_array($incidencia->getGrupoDestino(), $this->sgsd_services) or in_array($incidencia->getGrupoOrigen(), $this->sgsd_services))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function setSgsdServices($sgsd_services)
    {

        $this->sgsd_services = $sgsd_services;
    }

}
